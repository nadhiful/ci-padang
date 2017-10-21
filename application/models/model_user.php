<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_order');
	
		
	}
//=====================================AUNTENTIFICATION========================================//
	public function cek_user(){

		$username = set_value('username');
		$password = set_value('password');

		$hasil = $this->db->where('username', $username)
						  ->where('password',$password)
						  ->limit(1)
						  ->get('user');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
		
	}
//=====================================PROCESS CHECKOUT=============================================//
	public function process(){
		foreach ($this->cart->contents() as $items) {
			$id 	= $items['id'];
			$hasil	= $this->db->where('id', $id)
							   ->get('produk');
			foreach ($hasil->result() as $key)
			{
				$old = $key->stok;	
			}
			$new	= $items['qty'];
			if ($new > $old) {
				return FALSE;
			}else{

			$letter		=  array(
			'tanggal' 		=> date('Y-m-d H:i:s'),
			'due_tanggal'	=> date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d')+7,date('Y'))),
			'id_user'		=> $this->logged_in(),
			'status'		=> 'belum lunas' 
			);
			$this->db->insert('invoice', $letter);
			$id_invoice		= $this->db->insert_id();

				$data 	= array(
				'id_invoice'	=>	$id_invoice,
				'id_produk'		=>	$items['id'],
				'nama_barang'	=>	$items['name'],
				'jumlah'		=>	$items['qty'],
				'harga'			=> 	$items['price']
				);
			$this->db->insert('pesanan', $data);
			$this->updatestock();
			$data=array(
						'isi' 		=>'output/invoice',
						'title'		=>'Data Invoice | Detail',
						'invoice'	=> $this->model_order->get_invoice_by_id2($id_invoice),
						'order'		=> $this->model_order->get_order_by_id2($id_invoice),
						'user'		=> $this->current_logged()
				);
			$this->load->view('layout/wrapper3', $data);

			}
		}
		return TRUE;
	
	}

	
		public function updatestock(){
		foreach ($this->cart->contents() as $items) :
			$id 	= $items['id'];
			$hasil 	= $this->db->where('id', $id)
							   ->get('produk');
			foreach ($hasil->result() as $row) 
			{
				$old	= $row->stok;
			}
			$new		= $items['qty'];
			$current	= $old-$new;
			$data 		= array(
					'stok' 	=>$current
					);
			$this->db->where('id', $id)
					 ->update('produk',$data);
		endforeach;
	}

//====================================CEK USER ID==================================================//
	public function logged_in()
	{
		$hasil = $this->db->select('id')
						  ->where('username',$this->session->userdata('username'))
						  ->limit('1')
						  ->get('user');
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->row()->id;
		
		}else{

			return 0;
		}	
	}

	public function current_logged()
	{
		$hasil = $this->db->select('user.id as id_user,user.username as nama')
						  ->where('username',$this->session->userdata('username'))
						  ->limit('1')
						  ->get('user');
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->result();
		
		}else{

			return FALSE;
		}	
	}
//========================================CONFIRMED INVOICE==========================================//
	public function get_invoice_by_id($id)
	{
		$hasil 	= $this->db->where('id', $id)
					       ->where('id_user',$this->logged_in())
						   ->limit(1)
						   ->get('invoice');
		if ($hasil->num_rows() > 0) {
		
			return $hasil->result();
		}else{
		
			return array();
		}
	}

	public function get_order_by_id($id)
	{
		$hasil 	= $this->db->where('id_invoice', $id)
						   ->get('pesanan');
		if ($hasil->num_rows() > 0) {
			
			return $hasil->result();
		
		}else{
			
			return array();
		}
	}
//===============================SHOW UNCONFIRMED INVOICE=============================================//
	public function get_history($user){
	$hasil =	$this->db->select('i.*,SUM(o.jumlah * o.harga)AS total')
						 ->from('invoice i, user u, pesanan o')
						 ->where('u.username',$user)
						 ->where('u.id = i.id_user')
						 ->where('o.id_invoice = i.id')
						 ->like('i.status','belum lunas')
						 ->group_by('o.id_invoice')
						 ->get();
	if ($hasil->num_rows() > 0) {
		return $hasil->result();
	} else {
		return FALSE;
	}
	
	}

	public function get_history_confirmed($user){
	$hasil =	$this->db->select('i.*,SUM(o.jumlah * o.harga)AS total')
						 ->from('invoice i, user u, pesanan o')
						 ->where('u.username',$user)
						 ->where('u.id = i.id_user')
						 ->where('o.id_invoice = i.id')
						 ->like('i.status','confirmed')
						 ->group_by('o.id_invoice')
						 ->get();
	if ($hasil->num_rows() > 0) {
		return $hasil->result();
	} else {
		return FALSE;
	}
	
	}
//====================================CONFIRM PAYMENT=================================================//
	public function confirmed_payment($invoice_id,$amount){
		$ret = true;
		$hasil = $this->db->where('id', $invoice_id)
						  ->limit(1)
						  ->get('invoice');
		if ($hasil->num_rows() == 0) {
			$ret = $ret && false;
		}else{
			$total = $this->db->select('SUM(jumlah * harga)as total')
							  ->where('id_invoice',$invoice_id)
							  ->get('pesanan');
		if ($total->row()->total != $amount) {
				$ret = $ret && false;
			}else{
				$this->db->where('id', $invoice_id)
						 ->update('invoice',array('status' =>'confirmed'));
			}	
		}return $ret;

	}
//===============================Check User Exist=====================================================//
	public function save_register()
	{
		$object = array(
							'nama' 		=> set_value('nama'),
							'username'	=> set_value('username'),
							'password'	=> set_value('password')
					   );
		$user = $object['username'];
		$hasil = $this->db->get('user');
		foreach ($hasil->result() as $key) {
			$exist = $key->username;
		}
		if ($user == $exist) {
			return FALSE;
		} else {
			$object = array(
							'nama' 		=> set_value('nama'),
							'username'	=> set_value('username'),
							'password'	=> set_value('password'),
							'groups'	=> 2
					   );
			$this->db->insert('user', $object);
		}
		return TRUE;
		
	}
}

/* End of file  */
/* Location: ./application/models/ */