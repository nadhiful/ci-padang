<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('welcome/i','refresh');
		}

		$this->load->model('model_user');
	}

	public function index()
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
			 redirect('welcome');
		}
		else
		{
			$this->cart->destroy();
			$this->session->set_flashdata(
			'error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Terimakasih!</strong> Maaf stok habis</div>');
			redirect('welcome');
		}
	}
		
	

}

/* End of file  */
/* Location: ./application/controllers/ */