<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_barang extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		
	}
//===============================================================================
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
//Selcct Produk==================================================================
	public function select_all(){

		$hasil = $this->db->get('produk');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
	}
	public function select_id($id){
		$hasil 	= $this->db->where('id', $id)
				 		   ->limit(1)
				 		   ->get('produk');
			if ($hasil->num_rows() > 0) {
				return $hasil->row();
			} else {
				return array();
			}
	}

	public function select_id_name($id){
		$hasil = $this->db->select('nama')
						  ->where('id',$id)
						  ->limit('1')
						  ->get('produk');
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->row()->nama;
		
		}else{

			return 0;
		}	
	}

//Add Product=================================================================
	public function add_barang(){
		$gambar	= $this->upload->data();
		$data = array(
        				'nama' 				=> set_value('nama'),
          				'harga'				=> set_value('harga'),
            			'stok'				=> set_value('stok'),
            			'id_kategori'		=> set_value('kategori'),
            			'gambar'			=> $gambar['file_name']
            		);
		$this->db->insert('produk', $data);
		$id_log = $this->db->insert_id();
		$object = array(
						'id_produk' 	=> $id_log,
						'id_kategori'	=> set_value('kategori'),
						'id_activity'	=> 1,
						'id_user'		=> $this->logged_in(),
						'nama'			=> set_value('nama'),
						'stok'			=> set_value('stok'),
						'tanggal_added'	=> date('Y-m-d')
					);
		$this->db->insert('log_produk', $object);
		redirect('Admin_Act');
	}

	public function update_barang($id){
		$gambar	= $this->upload->data();
        $data = array(
          				'nama' 				=> set_value('nama'),
          				'harga'				=> set_value('harga'),
            			'stok'				=> set_value('stok'),
            			'id_kategori'		=> set_value('kategori'),
            			'gambar'			=> $gambar['file_name']
            			);
        $this->db->where('id', $id)
				 ->update('produk',$data);
        $object = array(
						'id_produk' 	=> $id,
						'id_kategori'	=> set_value('kategori'),
						'id_activity'	=> 2,
						'id_user'		=> $this->logged_in(),
						'nama'			=> set_value('nama'),
						'stok'			=> set_value('stok'),
						'tanggal_added'	=> date('Y-m-d')
					);
		$this->db->insert('log_produk', $object);
		redirect('Admin_Act');
	}

	public function hapus_barang($id){
		$object = array(

						'id_produk' 	=> $id,
						'id_activity'	=> 3,
						'id_user'		=> $this->logged_in(),
						'nama'			=> $this->select_id_name($id),
						'stok'			=> 0,
						'tanggal_added'	=> date('Y-m-d')
					);
		$this->db->where('id', $id)
				 ->delete('produk');
		$this->db->insert('log_produk', $object);
	}
//================================Function Select Data=========================================///
	
	public function show_list_category(){
		$hasil = $this->db->get('kategori_produk');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
	}

	public function select_id_kategori_name($id){
		$hasil 	= $this->db->where('id', $id)
				 		   ->limit(1)
				 		   ->get('kategori_produk');
			if ($hasil->num_rows() > 0) {
				return $hasil->row();
			} else {
				return array();
			}
	}

	public function select_category_name($id){
		$hasil = $this->db->select('nama')
						  ->where('id',$id)
						  ->limit('1')
						  ->get('kategori_produk');
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->row()->nama;
		
		}else{

			return 0;
		}	
	}

	public function select_all_by_id_category($id){

		$hasil = $this->db->select('*')
						  ->from('produk')
						  ->where('id_kategori',$id)
						  ->get();
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->result();
		
		}else{

			return array();
		}		
	}

//========================================================================================///
	//Add Produk List Category
	public function add_list_category(){
		$data = array(
							'nama' => set_value('nama')
					  );
		$this->db->insert('kategori_produk', $data);
		$id_log = $this->db->insert_id();
		$object = array(
						'id_produk' 	=> 0,
						'id_kategori'	=> $id_log,
						'id_activity'	=> 4,
						'id_user'		=> $this->logged_in(),
						'nama'			=> set_value('nama'),
						'stok'			=> 0,
						'tanggal_added'	=> date('Y-m-d')
						);
		$this->db->insert('log_produk', $object);
		redirect('Admin_Act/list_kategori');
	}

	public function update_list_category($id){
		$data = array(
							'nama' => set_value('nama')
					  );
		$this->db->where('id', $id)
				 ->update('kategori_produk',$data);
		$object = array(
						'id_produk' 	=> 0,
						'id_kategori'	=> $id,
						'id_activity'	=> 5,
						'id_user'		=> $this->logged_in(),
						'nama'			=> set_value('nama'),
						'stok'			=> 0,
						'tanggal_added'	=> date('Y-m-d')
						);
		$this->db->insert('log_produk', $object);
		redirect('Admin_Act/list_kategori');
	}

	public function hapus_list_category($id){
		$object = array(
						'id_produk' 	=> 0,
						'id_kategori'	=> $id,
						'id_activity'	=> 6,
						'id_user'		=> $this->logged_in(),
						'nama'			=> $this->select_category_name($id),
						'stok'			=> 0,
						'tanggal_added'	=> date('Y-m-d')
					);
		$this->db->where('id', $id)
				 ->delete('kategori_produk');
		$this->db->insert('log_produk', $object);
	}
//=====================================Add Raw Material======================================///

	public function select_all_raw(){
	$hasil = $this->db->select('bahan_baku.id as id_bahan,bahan_baku.nama as nama_bahan,bahan_baku.harga,bahan_baku.jumlah,kategori.nama as kategori,satuan.nama as satuan')
		 				  ->from('bahan_baku')
		 				  ->join('kategori','bahan_baku.kategori=kategori.id','inner')
		 				  ->join('satuan','bahan_baku.satuan=satuan.id','inner')
		 				  ->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}	

	}

	public function select_raw_by_id($id){
	$hasil 	= $this->db->select('bahan_baku.id,bahan_baku.nama,bahan_baku.harga,bahan_baku.jumlah,kategori.nama as kategori,satuan.nama as satuan,kategori.id as id_kategori,satuan.id as id_satuan')
					   ->from('bahan_baku')
					   ->join('kategori','bahan_baku.kategori=kategori.id','inner')
					   ->join('satuan','bahan_baku.satuan=satuan.id','inner')
					   ->where('bahan_baku.id',$id)
					   ->get();
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			 return array();
		}	

	}

	public function select_kategori_raw(){
		$hasil = $this->db->get('kategori');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function select_satuan_raw(){
		$hasil = $this->db->get('satuan');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function select_id_raw_name($id){
		$hasil = $this->db->select('nama')
						  ->where('id',$id)
						  ->limit('1')
						  ->get('bahan_baku');
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->row()->nama;
		
		}else{

			return 0;
		}	
	}

	public function select_raw_by_id2($id)
	{
		$hasil = $this->db->select('*')
						  ->where('id',$id)
						  ->limit('1')
						  ->from('bahan_baku')
						  ->get();
		if($hasil->num_rows() > 0 )
		{
		
			return $hasil->result();
		
		}else{

			return array();
		}	
	}

	public function add_raw(){
		$data = array(
        				'nama' 			=> set_value('nama'),
          				'harga'			=> set_value('harga'),
            			'jumlah'		=> set_value('jumlah'),
            			'kategori'		=> set_value('kategori'),
            			'satuan'		=> set_value('satuan')
            		);
		$this->db->insert('bahan_baku', $data);
		$id_log = $this->db->insert_id();
		$object = array(
						'id_bahan_baku' 			=> $id_log,
						'id_activity'				=> 7,
						'id_user'					=> $this->logged_in(),
						'nama'						=> set_value('nama'),
						'jumlah'					=> set_value('jumlah'),
						'tanggal_added'				=> date('Y-m-d')
					);
		$this->db->insert('log_bahan_baku', $object);
		redirect('Admin_Act/view_raw');	
	}

	public function update_raw($id){
		$data = array(
						'nama'			=> set_value('nama'),
          				'harga'			=> set_value('harga'),
            			'jumlah'		=> set_value('jumlah'),
            			);
        $this->db->where('id', $id)
				 ->update('bahan_baku',$data);
        $object = array(
						'id_bahan_baku' 	=> $id,
						'id_activity'		=> 8,
						'id_user'			=> $this->logged_in(),
						'nama'				=> set_value('nama'),
						'jumlah'			=> set_value('jumlah'),
						'harga'				=> set_value('harga'),
						'tanggal_added'		=> date('Y-m-d')
					);
		$this->db->insert('log_bahan_baku', $object);
		redirect('Admin_Act/view_raw');
	}

	public function delete_raw($id){
		$object = array(
						'id_bahan_baku' 	=> $id,
						'id_activity'		=> 9,
						'id_user'			=> $this->logged_in(),
						'nama'				=> $this->select_id_raw_name($id),
						'jumlah'			=> 0,
						'tanggal_added'		=> date('Y-m-d')
					);
		$this->db->where('id', $id)
				 ->delete('bahan_baku');
		$this->db->insert('log_bahan_baku', $object);
		redirect('Admin_Act/view_raw');
	}
//======================================Admin Handle Use Raw Data=====================================//
	
	public function select_use_raw(){
		$hasil = $this->db->select('use_raw.id as id,use_raw.id_bahan_baku as id_bahan,use_raw.jumlah,bahan_baku.nama as nama,use_raw.tanggal_added')
						  ->from('use_raw')
						  ->join('bahan_baku','use_raw.id_bahan_baku = bahan_baku.id','inner')
						  ->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function process_use(){
		$raw = array(
						'id_bahan_baku'	=> set_value('id_bahan'),
						'jumlah'		=> set_value('jumlah'),
						'tanggal_added'	=> date('Y-m-d H:i:s')
					);
		$new = $raw['jumlah'];
		$id  = $raw['id_bahan_baku'];
 		$hasil = $this->db->where('id', $id)
 						  ->get('bahan_baku');
 		foreach ($hasil->result() as $key) {
 				$old = $key->jumlah;
 		}
 		if ( $new > $old) {
 						  return FALSE;
 						  } else {
 						  $data = array(
											'id_bahan_baku'	=> set_value('id_bahan'),
											'jumlah'		=> set_value('jumlah'),
											'tanggal_added'	=> date('Y-m-d H:i:s')
										);
 						  $this->db->insert('use_raw', $data);
 						  $id_raw 	= $this->db->insert_id();
 						  $object = array(
 						  					'id_bahan_baku' 	=> $id_raw,
 						  					'id_activity'		=> 10,
 						  					'id_user'			=> $this->logged_in(),
 						  					'nama'				=> set_value('nama'),
 						  					'jumlah'			=> set_value('jumlah'),
 						  					'harga'				=> 0,
 						  					'tanggal_added'		=> date('Y-m-d H:i:s')
 						  				 );
 						 	$this->db->insert('log_bahan_baku', $object);
 						 	$this->updatestock();
 						  }
 						  return TRUE;
 						  				  

	}

	public function updatestock(){
		$raw = array(
						'id_bahan_baku'	=> set_value('id_bahan'),
						'jumlah'		=> set_value('jumlah'),
						'tanggal_added'	=> date('Y-m-d H:i:s')
					);
		$new = $raw['jumlah'];
		$id  = $raw['id_bahan_baku'];
 		$hasil = $this->db->where('id', $id)
 						  ->get('bahan_baku');
 		foreach ($hasil->result() as $key) {
 				$old = $key->jumlah;
 		}
 		$current	= $old-$new;
 		$data 		= array(
 								'jumlah' => $current
 							);
 		$this->db->where('id', $id)
				 ->update('bahan_baku',$data);
		

	}
//=============================================================================================///	
	public function select_pesanan()
	{
		$hasil = $this->db->select('pesanan.id_invoice,
									pesanan.nama_barang as barang,
									pesanan.jumlah,
									invoice.id,
									invoice.id_user,
									user.id,
									user.username as pelanggan')
						  ->from('pesanan')
						  ->join('invoice','pesanan.id_invoice = invoice.id','inner')
						  ->join('user','user.id = invoice.id_user','inner')
						  ->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}

	}
}

/* End of file  */
/* Location: ./application/models/ */