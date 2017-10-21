<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Act extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->model('model_order');
		$this->load->model('model_user');
		$this->load->library('form_validation');
		if($this->session->userdata('groups')!=1){
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error !</strong><br>Anda tidak berhak mengakses halaman ini</div>');
		redirect('En/i');
		
		}
		
	}
//==================================Admin Handle Product Activity===========================================//
	public function index()
	{
		$this->load->model('model_admin');
		$data = array(
					  'isi' 		=> 'output/dashboard',
					  'raw'		 	=>  $this->model_admin->count_raw(),
					  'title'		=>  'Halaman List Barang',
					  'label'		=>  'Dashboard'
					  );
		$this->load->view('layout/wrapper',$data);	
	}

	public function view_product()
	{
		$data = array(
					  'isi' 		=> 'products/view_all',
					  'barang'	 	=>  $this->model_barang->select_all(),
					  'title'		=>  'Halaman List Barang',
					  'label'		=>  'List Produk Jadi'
					  );
		$this->load->view('layout/wrapper',$data);	
	}
	public function view_add()
	{
			$data = array(
							'isi' 		=> 'products/view_add',
							'title' 	=> 'Admin Page',
							'list'		=> $this->model_barang->show_list_category(),
							'label'		=> 'Tambah Produk Baru'
							);	
			$this->load->view('layout/wrapper', $data);
	}

	public function view_edit($id){
			$data = array(
							'isi' 		=> 'products/view_edit',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_id($id),
							'label' 	=> 'Edit Data Produk'
							);
			$this->load->view('layout/wrapper', $data);
	}

	public function detail_product($id){
			$data = array(
							'isi' 		=> 'products/detail',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_id($id),
							'label'		=> 'Detail Informasi Produk'
							);
			$this->load->view('layout/wrapper', $data);		
	}

	public function view_add_kategori(){
			$data = array(
							'isi' 		=> 'products/add_list_category',
							'title' 	=> 'Admin Page',
							'label' 	=> 'Tambah Data Kategori'
						);
			$this->load->view('layout/wrapper', $data);
	}

	public function view_edit_kategori($id){
			$data = array(
							'isi' 		=> 'products/view_edit_category',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_id_kategori_name($id),
							'label'		=> 'Edit Data Kategori'
							);
			$this->load->view('layout/wrapper', $data);
	}

	public function list_kategori(){
		$data = array(
						'isi' 		=> 'products/list_kategori',
						'title' 	=> 'List Category',
						'list'		=> $this->model_barang->show_list_category(),
						'label'		=> 'List Kategori Produk'
					);
		$this->load->view('layout/wrapper', $data);
	}


	public function view_raw(){
		$data = array(
							'isi' 		=> 'products/view_raw',
							'title' 	=> 'Admin Page',
							'barang'	=> $this->model_barang->select_all_raw(),
							'label'		=> 'List Bahan Baku'
					);
		$this->load->view('layout/wrapper', $data);	
	}

	public function add_raw(){
			$data = array(
							'isi' 		=> 'products/add_raw',
							'title' 	=> 'Admin Page',
							'kategori'	=> $this->model_barang->select_kategori_raw(),
							'satuan'	=> $this->model_barang->select_satuan_raw(),
							'label'		=> 'Pembelian Bahan Baku'
						  );
			$this->load->view('layout/wrapper', $data);
	}

	public function edit_raw($id){
		
			$data = array(
							'isi' 		=> 'products/edit_raw',
							'title' 	=> 'Admin Page',
							'barang'	=> $this->model_barang->select_raw_by_id($id),
							'label'		=> 'Edit Data Bahan Baku'
						  );

			$this->load->view('layout/wrapper', $data);
	}

	public function view_use(){
			$data = array(
							'isi' 		=> 'products/view_use',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_use_raw(),
							'label'		=> 'List Bahan Baku yang Dipakai'
							);
			$this->load->view('layout/wrapper', $data);	
	}

	public function add_use(){
			$data = array(
							'isi' 		=> 'products/add_use',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_all_raw(),
							'label'		=> 'Tambah Data Bahan yang Dipakai'
						);
			$this->load->view('layout/wrapper', $data);	
	}
	
	public function view_user_admin(){
		$this->load->model('model_admin');
		$data = array(
						'isi' 		=> 'products/view_user_admin',
						'title' 	=> 'Data User Admin',
						'list'		=> $this->model_admin->show_user_admin(),
						'label'		=> 'List Operator'
					);
		$this->load->view('layout/wrapper', $data);

	}

	public function add_user_admin(){

		$data = array(
						'isi' 		=> 'products/add_user_admin',
						'title' 	=> 'Data User Admin',
						'label'		=> 'Tambah Operator'
					);
		$this->load->view('layout/wrapper', $data);

	}

	public function edit_user_admin($id){
		$this->load->model('model_admin');
		$data = array(
						'isi' 		=> 'products/edit_user_admin',
						'title' 	=> 'Data User Admin',
						'result'	=> $this->model_admin->select_user_admin($id),
						'label'		=> 'Edit Data Operator'
					);
		$this->load->view('layout/wrapper', $data);

	}

	public function delete_user_admin($id){
		$this->load->model('model_admin');
		$this->model_admin->delete_user_admin($id);
		
	}
//====================================User Admin===================================================//
	public function save_user_admin(){
		$this->load->model('model_admin');
			$this->form_validation->set_rules('username', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

                        
            if ($this->form_validation->run() == FALSE) {

           		$data = array(
						'isi' 		=> 'products/add_user_admin',
						'title' 	=> 'Data User Admin',
						'label'		=> 'Tambah Operator'
					);
				$this->load->view('layout/wrapper', $data);

			}else{
				$this->model_admin->add_user_admin();
			}

	}

	public function update_user_admin($id){
		$this->load->model('model_admin');
			$this->form_validation->set_rules('username', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

                        
            if ($this->form_validation->run() == FALSE) {

           		$data = array(
						'isi' 		=> 'products/edit_user_admin',
						'title' 	=> 'Data User Admin',
						'result'	=> $this->model_admin->select_user_admin($id),
						'label'		=> 'Edit Data Operator'
					);
				$this->load->view('layout/wrapper', $data);

			}else{
				$this->model_admin->update_user_admin($id);
			}

	}
 	
 	public function show_user_customer()
 	{
 		$this->load->model('model_admin');
 		$data = array(
						'isi' 		=> 'output/list_customer',
						'title' 	=> 'Data User Customer',
						'result'	=> $this->model_admin->select_user_customer_all(),
						'label'		=> 'List Data Customer'
					);
		$this->load->view('layout/wrapper', $data);
 	}

 	public function show_pesanan()
 	{
 		$data = array(
						'isi' 		=> 'products/list_pesanan',
						'title' 	=> 'Data Pesanan',
						'result'	=> $this->model_barang->select_pesanan(),
						'label'		=> 'List Data Pesanan'
					);
		$this->load->view('layout/wrapper', $data);
 	}

//====================================Raw Material=================================================//
	
	public function save_raw(){
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required|integer');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|integer');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

                        
            if ($this->form_validation->run() == FALSE) {

           		$data=array(
           						'isi' 	=>	'products/add_raw',
								'title'	=>	'Data Raw | Add'
							);
				$this->load->view('layout/wrapper',$data);
			}else{
				$this->model_barang->add_raw();
			}

	}

	public function update_raw($id){
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required|integer');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|integer');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

                        
            if ($this->form_validation->run() == FALSE) {

           		$data=array(
           						'isi' 		=>	'products/edit_raw',
								'title'		=>	'Data Raw | Edit',
								'label'		=>  'Edit Data Bahan Baku',
								'barang'	=>   $this->model_barang->select_raw_by_id2($id)
							);
				$this->load->view('layout/wrapper',$data);
			}else{
				$this->model_barang->update_raw($id);
			}

	}

	public function delete_raw($id){
		$this->model_barang->delete_raw($id);
		
	}
//=================================Admin Handle Process Buy Raw Material========================================///
	public function process_use()
	{
		$is_process		= $this->model_barang->process_use();
		if($is_process)
		{
			$this->cart->destroy();
			$this->session->set_flashdata(
			'success','<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Terimakasih !</strong></div>');
			 redirect('Admin_Act/view_use');
		}
		else
		{
			$this->cart->destroy();
			$this->session->set_flashdata(
			'error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong>Stok Habis</div>');
			redirect('Admin_Act/view_use');
		}
	}

//==================================Admin Handle Product Activity===========================================//

	public function save_add(){

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required|min_length[4]|max_length[5]');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required|min_length[1]|max_length[3]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

                        
            if ($this->form_validation->run() == FALSE) {

           		$data=array(
           						'isi' 	=>	'products/view_add',
								'title'	=>	'Data Product | Add'
							);
				$this->load->view('layout/wrapper',$data);

            	} else {
            
		            $config['upload_path'] 		= './uploads/';
		            $config['allowed_types'] 	= 'jpg|png|jpeg';
		            $config['max_size']  		= '300';
		            $config['max_width']  		= '2000';
		            $config['max_height']  		= '2000';
		            $config['file_name'] 		= 'file_'.date('dmYHis');
            
		            
		            $this->load->library('upload', $config);
		            
            		if ( ! $this->upload->do_upload()){
            			$data=array(
           								'isi' 	=>	'products/view_add',
										'title'	=>	'Data Product | Add',
										'error' =>   $this->upload->display_errors()
									);
						$this->load->view('layout/wrapper',$data);
			            	 $error = array('error' => $this->upload->display_errors());
			            	 echo $error['error'];
			            }
			            else{
			            	$this->model_barang->add_barang();          				
			            }	
            	}	
	}

	public function save_edit($id){

				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('harga', 'Harga', 'trim|required|min_length[4]|max_length[6]');
				$this->form_validation->set_rules('stok', 'Stok', 'trim|required|min_length[1]|max_length[3]');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            		</button>','</div>');

				if ($this->form_validation->run() == FALSE) {

				$data = array(
								'isi' 		=> 'products/view_edit',
								'title' 	=> 'Data Edit',
								'result'	=> $this->model_barang->select_id($id)
							 );
				$this->load->view('layout/wrapper', $data);
				
				} else {
					
					$config['upload_path'] 		= './uploads/';
		            $config['allowed_types'] 	= 'jpg|png|jpeg';
		            $config['max_size']  		= '300';
		            $config['max_width']  		= '2000';
		            $config['max_height']  		= '2000';
		            $config['file_name'] 		= 'file_'.date('dmYHis');
		            $this->load->library('upload', $config);

		            if ( ! $this->upload->do_upload()){
            			$data=array(
           								'isi' 	=>	'products/view_edit',
										'title'	=>	'Data Product | Edit',
										'error' =>   $this->upload->display_errors()
									);
						$this->load->view('layout/wrapper',$data);
			            	 $error = array('error' => $this->upload->display_errors());
			            	 echo $error['error'];
			            }
			            else{
			            	$this->model_barang->update_barang($id);
			            }	
            	}			
				
		}
	
	public function hapus($id){
		$this->model_barang->hapus_barang($id);
		redirect('Admin_Act');
	}
//===================================Admin Handle All data about category_product=============================//
	
	public function add_list_category(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            		</button>','</div>');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'isi' 		=> 'products/add_list_category',
							'title'		=> 'List Kategori' );
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->model_barang->add_list_category();
		}

	}
		
		public function update_list_category($id){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            		</button>','</div>');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'isi' 		=> 'products/view_edit_category',
							'title'		=> 'List Kategori',
						 );
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->model_barang->update_list_category($id);
		}

	}

	public function hapus_kategori($id){
		$this->model_barang->hapus_list_category($id);
		redirect('Admin_Act/list_kategori');
	}
//=========================================Admin Handle All data about Invoice================================//
	public function show_invoice()
	{
		$data=array('isi' 		=>'products/invoice',
					'title'		=>'Data Invoice',
					'letter'	=> $this->model_order->all_invoice(),
					'label'		=> 'List Invoice'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function detail_invoice($invoice_id)
		{
			$data=array(
						'isi' 		=>'products/detail_invoice',
						'title'		=>'Data Invoice | Detail',
						'invoice'	=> $this->model_order->get_invoice_by_id($invoice_id),
						'order'		=> $this->model_order->get_order_by_id($invoice_id),
						'label'		=> 'Detail Invoice'
				);
			$this->load->view('layout/wrapper', $data);
		}
		
}

/* End of file  */
/* Location: ./application/controllers/ */