<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function UserLogin($username,$password){
		$data = array(
			'username' =>$username ,
			'password'=>$password
			);
		$query = $this->db->get_where('users', $data);
		if (count($query->result () ) > 0) {
			$result = array(
				'id' =>$query->row()->id , 
				'name' =>$query->row()->name , 
				'surname' => $query->row()->surname, 
				'role' => $query->row()->role 
				);
			return $result;
		}else{
			return false;
		}
	}
}
