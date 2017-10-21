<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->model('model_user');
		$this->load->model('model_order');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data = array(
						'isi' 		=> 'frontend/home',
						'title'		=> 'Halaman Depan',
						'barang'	=> $this->model_barang->select_all()
					 );
		$this->load->view('layout2/wrapper', $data);
	}

	public function i(){

		$data = array(
						'title'		=> 'Halaman Login',
					 );
		$this->load->view('frontend/login',$data);

	}

	public function login(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[8]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/login');
			} else {
				
				$valid = $this->model_user->cek_user();
				if ($valid == FALSE)
				{
					$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade in" role="alert">
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            		</button>
            		<strong>Salah !</strong><br>Salah username atau password</div>');
				redirect('login');
				} else {
					$array = array(
						'username' 		=> $valid->username,
						'groups'	   	=> $valid->groups
					);
					//echo "string";
					$this->session->set_userdata($array);
					switch ($valid->groups) {
						case 1:
							redirect('Products','refresh');
							break;
						case 2:
							redirect(base_url());
							break;
						default:
							# code...
							break;
					}
				}
				
			}


	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome/i','refresh');
	}

	public function add($id)
	{
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

	public function cart(){
		$data = array(
						'isi' 		=> 'frontend/cart',
						'title'		=> 'Halaman Cart',
						'barang'	=> $this->cart->contents()
					 );
		$this->load->view('layout2/wrapper2', $data);

	}

	public function update()
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

	public function clear(){
		$this->cart->destroy();
		redirect(base_url());
	}

	
	

}
