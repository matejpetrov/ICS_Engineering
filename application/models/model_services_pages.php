<?php 
//model intended to get and update all the information that will be displayed on the services pages. 
//In the database this is the services_translation table.


if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_services_pages extends CI_Model {

	//function that will access to the database and retrieve all the content (English and Macedonian) from the services_translation table.
	public function get_all_services_content(){

		$this->db->select("*");
		$this->db->from("services_translation");

		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}

		return $result;

	}	



	public function update_services_content($services_english, $services_macedonian){

		$english = array('services' => $services_english);
		$macedonian = array('services' => $services_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	}

	public function update_engineering_content($engineering_english, $engineering_macedonian){

		$english = array('engineering' => $engineering_english);
		$macedonian = array('engineering' => $engineering_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}

	public function update_system_integration_content($system_integration_english, $system_integration_macedonian){

		$english = array('system_integration' => $system_integration_english);
		$macedonian = array('system_integration' => $system_integration_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}

	public function update_consulting_content($consulting_english, $consulting_macedonian){

		$english = array('consulting' => $consulting_english);
		$macedonian = array('consulting' => $consulting_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}


	public function update_telecommunication_content($telecommunication_english, $telecommunication_macedonian){
		$english = array('telecommunication' => $telecommunication_english);
		$macedonian = array('telecommunication' => $telecommunication_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_power_supply_content($power_supply_english, $power_supply_macedonian){
		$english = array('power-supply' => $power_supply_english);
		$macedonian = array('power-supply' => $power_supply_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_audio_video_content($audio_video_english, $audio_video_macedonian){

		$english = array('audio-video' => $audio_video_english);
		$macedonian = array('audio-video' => $audio_video_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}


	public function update_defence_security_content($defence_security_english, $defence_security_macedonian){

		$english = array('defence-security' => $defence_security_english);
		$macedonian = array('defence-security' => $defence_security_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('services_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('services_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;

	}



	//function that retreives value of the specific column in the specific language, both given as argument. 
	//It either returns the result or false if something went wrong. 
	public function get_services_page_content($column, $lang){

		$this->db->select($column);
		$this->db->from('services_translation');
		
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

/* End of file model_services_pages.php */
/* Location: ./application/models/model_services_pages.php */