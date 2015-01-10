<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function UserLogin($username,$password){
		$data = array(
			'username' =>$username ,
			'password'=>$password
			);
		$query = $this->db->get_where('users', $data);
		if (count($query->result () ) > 0) {
			$id = $query->row()->id;
			return $id;
		}else{
			return false;
		}
	}
	public function getUserData($id){
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$result = array(
			'name' => $query->row()->name,
			'surname' => $query->row()->surname, 
			'role' => $query->row()->role 
			);
		return $result;
	}

	//function that inserts a new row in the news table. 
	public function add_new_news(){

	}

	//function that inserts new row int the translation table, invoked right after new news row will be added. 
	public function add_new_translation(){

	}

	public function getSliderImages(){	
		$result = $this->db->get('homepage_images');
		return $result;
	}
	public function getImagePath($id){
		$this->db->where('id', $id);
		$query = $this->db->get('homepage_images');

		return $query->row()->image_url;
	}

	public function deleteImage($id){
		$this->db->where('id', $id);
		if ($this->db->delete('homepage_images')) {
			return true;
		}else{
			return false;
		}
	}

}
