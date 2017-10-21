<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_order extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}
	public function all_invoice(){

		$hasil = $this->db->get('invoice');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
		
	}

	public function get_invoice_by_id($invoice_id)
	{
		$hasil 	= $this->db->where('id', $invoice_id)
						   ->limit(1)
						   ->get('invoice');
		if ($hasil->num_rows() > 0) {
		
			return $hasil->result();
		}else{
		
			return FALSE;
		}
	}

	public function get_order_by_id($invoice_id)
	{
		$hasil 	= $this->db->where('id_invoice', $invoice_id)
						   ->get('pesanan');
		if ($hasil->num_rows() > 0) {
			
			return $hasil->result();
		
		}else{
			
			return FALSE;
		}
	}

public function get_invoice_by_id2($id_invoice)
	{
		$hasil 	= $this->db->where('id', $id_invoice)
						   ->limit(1)
						   ->get('invoice');
		if ($hasil->num_rows() > 0) {
		
			return $hasil->result();
		}else{
		
			return FALSE;
		}
	}

	public function get_order_by_id2($id_invoice)
	{
		$hasil 	= $this->db->where('id_invoice', $id_invoice)
						   ->get('pesanan');
		if ($hasil->num_rows() > 0) {
			
			return $hasil->result();
		
		}else{
			
			return FALSE;
		}
	}



}

/* End of file  */
/* Location: ./application/models/ */