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

	//checks if username exists
	public function checkUsername($username)
	{
		$this->db->where('username',$username);
		$query=$this->db->get('users');
		if (count($query->result()) == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	//checks if user email exists
	public function checkEmail($email)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('authentication');
		if (count($query->result()) == 0) {
			return true;
		} else {
			return false;
		}
		
	}

	public function createUser($name, $surname, $email, $username, $password, $auth_link, $role){
		$user_data = array(
			'name' => $name ,
			'surname' => $surname ,
			'username' => $username ,
			'password' => $password ,
			'role' => $role
			);
		$this->db->insert('users', $user_data);
		$user_id = $this->db->insert_id();
		$auth_data = array(
			'user_id' =>$user_id,
			'email' => $email,
			'auth_link' => $auth_link 
			);
		$this->db->insert('authentication', $auth_data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}

	public function checkLink($auth_link){
		$this->db->where('auth_link',$auth_link);
		$query = $this->db->get('authentication');
		if (count($query->result()) > 0) {
			if ($query->row()->authenticated == 0) {
				return $query->row()->user_id;
			} else {
				return false;
			}
		}
	}

	public function getAllUsers(){
		$this->db->select('u.id,u.username,u.name,u.surname,u.protected,u.role,a.email,a.authenticated');
		$this->db->from('users u');
		$this->db->join('authentication a', 'u.id = a.user_id', 'left');

		$query = $this->db->get();

		return $query;
	}

	public function deleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function getUserRole($id){
		$this->db->select('role');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row()->role;
	}

	public function changeRole($id){
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$this->db->where('id', $id);
		if ($query->row()->role == 2) {
			$this->db->update('users', array('role' => '3'));
			return 3;
		} else {
			$this->db->update('users', array('role' => '2'));
			return 2;
		}
		
	}

	public function complete($id,$password){
		$this->db->where('id', $id);
		$this->db->update('users', array('password'=>$password));
		$this->db->where('user_id', $id);
		$this->db->update('authentication', array('authenticated'=> '1'));
		if ($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}

	}

	//function that inserts a new row in the news table. 
	public function add_new_news($news){

		if($this->db->insert('news', $news)){
			return $this->db->insert_id();
		}
		else return false;

	}

	//function that inserts new row int the translation table, invoked right after new news row will be added. 
	public function add_new_translation($translations){

		$this->db->insert_batch('translation_content', $translations);

		if($this->db->affected_rows() > 0){
			return true;
		}
		else return false;

	}


	//function that will get the news with the id given as argument, as well as all the translations. 
	public function get_news($id){

		$this->db->select('n.created_at, n.news_image_url, tc.title, tc.content, tc.lang');
		$this->db->from('news n');
		$this->db->join('translation_content tc', 'n.id = tc.news_id');
		$this->db->where('n.id', $id);

		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}

		return $result;

	}

	//function that will get all the news that are entered in the database. It will retrieve the id,
	//the news_image_url and the created_at from the news table and the title from the translations.
	public function get_all_news(){

		$this->db->select('n.id, n.created_at, n.news_image_url, tc.title, tc.lang');
		$this->db->from('news n');
		$this->db->join('translation_content tc', 'n.id = tc.news_id');

		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}

		return $result;
	}


	//functions that updates the news in the database with the new values. 
	public function edit_news($id, $translation_english, $translation_macedonian){

		$this->db->where('news_id', $id);
		$this->db->where('lang', 0);

		if($this->db->update('translation_content', $translation_english)){

			$this->db->where('news_id', $id);
			$this->db->where('lang', 1);

			if($this->db->update('translation_content', $translation_macedonian)){
				return true;
			}
			else return false;			
		}
		else return false;

	}

	//function that changes the url of the main image of the news with the ID given as argument
	public function edit_news_image($id, $news){

		$this->db->where('id', $id);

		if($this->db->update('news', $news)){
			return true;
		}
		else return false;

	}


	public function delete_news($id){

		$this->db->where('id', $id);
		if ($this->db->delete('news')) {
			return true;
		}else{
			return false;
		}

	}

	//the argument is an array of all the images that were added.
	//The idea is to add all the images using a transaction in which we call insert query for each
	//image. We create an associative array of the ids and urls of all the images where the key is the URL and 
	//the value is the image. 
	public function add_slider_images($images){

		$ids = array();

		$this->db->trans_start();

		foreach($images as $image){
			$this->db->insert('homepage_images', $image);

			if($this->db->affected_rows() > 0){
				$ids[$image['image_url']] = $this->db->insert_id();
			}
		}

		$this->db->trans_complete();



		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return $ids;

	}

	//functions that retrieves all the homepage images from the database, intended to be shown in the 
	//homepage slider. 
	public function getSliderImages(){
		$this->db->order_by('id', 'desc');	
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
