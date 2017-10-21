<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function show_user_admin(){

		$hasil = $this->db->select('*')
						  ->from('user')
						  ->where('groups','1')
						  ->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}

	}

	public function select_user_admin($id){
		$hasil = $this->db->select('*')
						  ->from('user')
						  ->where('id',$id)
						  ->limit(1)
						  ->get();
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			 return array();
		}		
	}

	public function add_user_admin(){
		
		$data = array(
						'username' 	=> set_value('username'),
						'password' 	=> set_value('password'),
						'groups'	=> 1
					);
		$this->db->insert('user', $data);
	}

	public function update_user_admin($id){

		$data = array(
						'username' 	=> set_value('username'),
						'password' 	=> set_value('password'),
						'groups'	=> 1
					);
		$this->db->where('id', $id)
				 ->update('user',$data);
		
	}

	public function delete_user_admin($id){
		$this->db->where('id', $id)
				 ->delete('user');
        	
	}
//=======================================For Dashboard==================================================//
	public function count_raw(){

		$hasil = $this->db->select('*,COUNT(*)as raw')
						  ->from('bahan_baku')
						  ->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
		

	}
//=======================================================================================================//

	public function select_user_customer_all()
	{
		$hasil = $this->db->select('id,nama,username')
						  ->from('user')
						  ->where('groups','2')
						  ->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
		
	}
}

/* End of file  */
/* Location: ./application/models/ */