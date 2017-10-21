<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->library('form_validation');
		if($this->session->userdata('groups')!=1){
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error !</strong><br>Anda tidak berhak mengakses halaman ini</div>');
		redirect('welcome/i');
		
		}
		
	}

	public function index()
	{
		$data = array('isi' 		=> 'products/view_all',
					  'barang'	 	=>  $this->model_barang->select_all(),
					  'title'		=>  'Halaman List Barang'
					  );
		$this->load->view('layout/wrapper',$data);	
	}

	public function view_add()
	{
			$data = array(
							'isi' 		=> 'products/view_add',
							'title' 	=> 'Admin Page'
							);
			$this->load->view('layout/wrapper', $data);
	}

	public function view_edit($id){
			$data = array(
							'isi' 		=> 'products/view_edit',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_id($id),
							);
			$this->load->view('layout/wrapper', $data);

	}

	public function detail($id){
			$data = array(
							'isi' 		=> 'products/detail',
							'title' 	=> 'Admin Page',
							'result'	=> $this->model_barang->select_id($id)
							);
			$this->load->view('layout/wrapper', $data);		
	}

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
			            	$gambar	= $this->upload->data();
			            	$data = array(
            						'nama' 			=> set_value('nama'),
            						'harga'			=> set_value('harga'),
            						'stok'			=> set_value('stok'),
            						'gambar'		=> $gambar['file_name']
            							);
            				$this->model_barang->add_barang($data);
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
			            	$gambar	= $this->upload->data();
			            	$data = array(
            						'nama' 			=> set_value('nama'),
            						'harga'			=> set_value('harga'),
            						'stok'			=> set_value('stok'),
            						'gambar'		=> $gambar['file_name']
            							);
            				$this->model_barang->update_barang($id,$data);
			            }	
            	}			
				
		}
	
	public function hapus($id){
		$this->model_barang->hapus_barang($id);
		redirect('Products','refresh');
	}

	

}

/* End of file  */
/* Location: ./application/controllers/ */