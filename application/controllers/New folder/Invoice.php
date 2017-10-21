<?php if ( ! defined('BASEPATH')) exit('No direc t script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_order');
		if($this->session->userdata('groups')!='2'){
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error !</strong><br>Anda tidak berhak mengakses halaman ini</div>');
		redirect('login');
		}
		 
	}

	public function index()
	{
		$data=array('isi' 		=>'products/invoice',
					'title'		=>'Data Invoice',
					'letter'	=> $this->model_order->all_invoice()
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function detail($invoice_id)
	{
		$data=array(
					'isi' 		=>'products/detail_invoice',
					'title'		=>'Data Invoice | Detail',
					'invoice'	=> $this->model_order->get_invoice_by_id($invoice_id),
					'order'		=> $this->model_order->get_order_by_id($invoice_id)
			);
		$this->load->view('layout/wrapper', $data);
	}

	public function history(){
		$this->load->model('model_user');
		$user = $this->session->userdata('username');
		$data = array(
						'history' => $this->model_user->get_history($user),
						'isi'	  => 'frontend/history',
						'title'	  => 'Riwayat Pembelian'
					 );
		$this->load->view('layout2/wrapper2', $data);

	}

	public function show_payment($invoice_id = 0){
		$this->load->model('model_user');
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
					echo "success";
					
				} else {
					echo "error";				
				}
				
						
			 }
	}

	public function cetak()
	{
		$this->load->model('model_order');
		$data = array('note' 	=> $this->model_order->all_invoice(),
					  'title'	=> 'Cetak Invoice'
					 );
		// $this->load->view('backend/print', $data);

	}
	
}

/* End of file  */
/* Location: ./application/controllers/ */		  
