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

	//functions that adds new slider image url to the database in the table homepage_images.
	//the argument is an array of all the images that were added.
	public function add_slider_images($image){

		$this->db->insert('homepage_images', $image);

		if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
		}
		else return false;

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
