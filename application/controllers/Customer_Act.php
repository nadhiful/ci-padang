<?php if ( ! defined('BASEPATH')) exit('No direc t script access allowed');

class Customer_Act extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		if($this->session->userdata('groups')!='2'){
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error !</strong><br>Anda tidak berhak mengakses halaman ini</div>');
		redirect('En/i');
		}
		 
	}
//=================================Index Act of User===============================================///
	public function index()
	{
		$this->load->model('model_barang');
		$data = array(
						'isi' 		=> 'frontend/home',
						'title'		=> 'Halaman Depan',
						'barang'	=> $this->model_barang->select_all()
					 );
		$this->load->view('layout2/wrapper', $data);
	}

//=================================User Handle Process Order========================================///
	public function process_order()
	{
		$is_process		= $this->model_user->process();
		if($is_process)
		{
			$this->cart->destroy();
			$this->session->set_flashdata(
			'success','<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Terimakasih !</strong>Sudah membeli produk kami</div>');
			 
		}
		else
		{
			$this->cart->destroy();
			$this->session->set_flashdata(
			'error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Terimakasih!</strong> Maaf stok habis</div>');
			redirect('en');
		}
	}
//==========================User handle See History of Buying and Payment Confirmation===========================
	public function show_history(){
		
		$user = $this->session->userdata('username');
		$data = array(
						'history' => $this->model_user->get_history($user),
						'isi'	  => 'frontend/history',
						'title'	  => 'Riwayat Pembelian'
					 );
		$this->load->view('layout2/wrapper2', $data);

	}

	public function show_history_confirmed(){
		
		$user = $this->session->userdata('username');
		$data = array(
						'history' => $this->model_user->get_history_confirmed($user),
						'isi'	  => 'frontend/history_confirmed',
						'title'	  => 'Riwayat Pembelian'
					 );
		$this->load->view('layout2/wrapper2', $data);

	}

	public function show_payment($invoice_id = 0){
		
		$this->form_validation->set_rules('invoice_id', 'Invoice', 'trim|required|integer');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) 
		{
				 if ($this->input->post('invoice_id')){
				 	$data = array(
				 	 				'title' 		=> 'Form Pembayaran',
				 	 				'isi'			=> 'frontend/add_payment',
				 	 				'invoice_id' 	=> set_value('invoice_id')
				 	 			);
					
				 }else {
				 	$data = array(
				 					'title' 		=> 'Form Pembayaran',
				 					'isi'			=> 'frontend/add_payment',
				 					'invoice_id'	=> $invoice_id
				 				);
				 }
				 $this->load->view('layout2/wrapper2', $data);
		}else{

				$isValid = $this->model_user->confirmed_payment(set_value('invoice_id'),set_value('amount'));
				if ($isValid) {
					$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade in" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			            <strong>Terimakasih!</strong> Terimakasih</div>');
					redirect('Customer_Act/show_history');
					
				} else {
					$this->session->set_flashdata('gagal', '<div class="alert alert-danger alert-dismissible fade in" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			            <strong>Terimakasih!</strong> Terimakasih</div>');
					redirect('Customer_Act/show_history');				
				}
						
			 }
	}
// ================================Proses User Handle Cart===================================================//
	public function add_cart($id)
	{
			$this->load->model('model_barang');
			$barang = $this->model_barang->select_id($id);
			$data = array(
				'id'      => $barang->id,
				'qty'     => 1,
				'price'   => $barang->harga,
				'name'    => $barang->nama,
				'image'	  => $barang->gambar
			);			
			$this->cart->insert($data);
			redirect(base_url());

	}

	public function show_cart(){
		$data = array(
						'isi' 		=> 'frontend/cart',
						'title'		=> 'Halaman Cart',
						'barang'	=> $this->cart->contents()
					 );
		$this->load->view('layout2/wrapper2', $data);

	}

	public function update_cart()
	{
		if ($this->input->post('tambah'))
		{
			unset($_POST['tambah']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$data 		= array(
				'title'		=> 'Halaman Cart',
				'isi'		=> 'frontend/cart',
			    'rowid' 	=> $content['rowid'],
			    'qty'   	=> $content['qty']+1
			    );

				$this->cart->update($data);
				
			}
			$this->load->view('layout2/wrapper2',$data);

		}elseif ($this->input->post('kurang')) 
		{

			unset($_POST['kurang']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$data 		= array(
				'title'		=> 'Halaman Cart',
				'isi'		=> 'frontend/cart',
			    'rowid' 	=> $content['rowid'],
			    'qty'   	=> $content['qty']-1
			    );

				$this->cart->update($data);
				
			}
			$this->load->view('layout2/wrapper2',$data);
		}
		
	}

	public function clear_cart(){
		$this->cart->destroy();
		redirect(base_url());
	}
//=========================================Show Invoice Confirmed==========================================//
	public function show_invoice($id){
		$data = array(
						'isi' 			=> 'output/invoice_confirmed',
						'invoice'		=> $this->model_user->get_invoice_by_id($id),
						'order'			=> $this->model_user->get_order_by_id($id),
						'title'			=> 'Invoice Confirmed'
					);
		$this->load->view('layout/wrapper3', $data);

	}

	

}

/* End of file  */
/* Location: ./application/controllers/ */		  
