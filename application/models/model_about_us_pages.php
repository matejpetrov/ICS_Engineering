<?php 

//model intended to get and update all the information that will be displayed on the about us pages. In the database this is the about_us_translation table.



if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_about_us_pages extends CI_Model {


	//function that will access to the database and retrieve all the content (English and Macedonian) from the about_us_translation table.
	public function get_all_about_us_content(){

		$this->db->select("*");
		$this->db->from("about_us_translation");

		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}

		return $result;

	}	


	//function that updates the about_us content (english and macedonian) in the about_us_translation table. I will use a transaction because i am updating two rows because of the two 
	//languages.
	public function update_about_us_content($about_us_english, $about_us_macedonian){

		$english = array('about_us' => $about_us_english);
		$macedonian = array('about_us' => $about_us_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;		

	}

	public function update_mission_content($mission_english, $mission_macedonian){

		$english = array('mission' => $mission_english);
		$macedonian = array('mission' => $mission_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;		

	}


	public function update_vision_content($vision_english, $vision_macedonian){

		$english = array('vision' => $vision_english);
		$macedonian = array('vision' => $vision_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}

	public function update_structure_content($structure_english, $structure_macedonian){

		$english = array('structure' => $structure_english);
		$macedonian = array('structure' => $structure_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}


	public function update_partners_content($partners_english, $partners_macedonian){

		$english = array('partners' => $partners_english);
		$macedonian = array('partners' => $partners_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}

	public function update_corporate_info_content($corporate_info_english, $corporate_info_macedonian){

		$english = array('corporate_info' => $corporate_info_english);
		$macedonian = array('corporate_info' => $corporate_info_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('about_us_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('about_us_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;


	}



	public function get_about_us_page_content($column, $lang){

		$this->db->select($column);
		$this->db->from('about_us_translation');
		
		$lang_db = -1;
		if($lang == 'english'){
			$lang_db = 0;
		}
		else $lang_db = 1;

		$this->db->where('lang', $lang_db);

		$query = $this->db->get();		


		if (count($query->result () ) > 0) {
			$result = (array)$query->row();
			return $result;
		}else{
			return false;
		}


		/*foreach ($query->result() as $row){
		    $result = (array)$row;
		}

		if($result){
			return $result;
		}
		else return false;*/
	
	}


}

/* End of file model_about_us_pages.php */
/* Location: ./application/models/model_about_us_pages.php */



 ?>