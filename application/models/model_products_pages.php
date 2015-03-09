<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products_pages extends CI_Model {

	public function get_all_products_content(){

		$this->db->select("*");
		$this->db->from("products_translation");

		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}
		
		return $result;

	}


	#===============================================================
	#TELECOMMUNICATION START
	public function update_fixed_access_content($fixed_access_english, $fixed_access_macedonian){
		$english = array('fixed_access' => $fixed_access_english);
		$macedonian = array('fixed_access' => $fixed_access_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_transport_content($transport_english, $transport_macedonian){
		$english = array('transport' => $transport_english);
		$macedonian = array('transport' => $transport_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_solutions_content($solutions_english, $solutions_macedonian){
		$english = array('solutions' => $solutions_english);
		$macedonian = array('solutions' => $solutions_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	
	#TELECOMMUNICATION END
	#===============================================================
	

	#===============================================================
	#POWER SUPPLY START


	public function update_dc_power_systems_content($dc_power_systems_english, $dc_power_systems_macedonian){
		$english = array('dc_power_systems' => $dc_power_systems_english);
		$macedonian = array('dc_power_systems' => $dc_power_systems_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_ups_content($ups_english, $ups_macedonian){
		$english = array('ups' => $ups_english);
		$macedonian = array('ups' => $ups_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_monitoring_content($monitoring_english, $monitoring_macedonian){
		$english = array('monitoring' => $monitoring_english);
		$macedonian = array('monitoring' => $monitoring_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_data_center_content($data_center_english, $data_center_macedonian){
		$english = array('data_center' => $data_center_english);
		$macedonian = array('data_center' => $data_center_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}


	#POWER SUPPLY END
	#===============================================================


	#===============================================================
	#AUDIO/VIDEO START

	public function update_audio_conference_content($audio_conference_english, $audio_conference_macedonian){
		$english = array('audio_conference' => $audio_conference_english);
		$macedonian = array('audio_conference' => $audio_conference_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	public function update_court_recording_systems_content($court_recording_systems_english, $court_recording_systems_macedonian){
		$english = array('court_recording_systems' => $court_recording_systems_english);
		$macedonian = array('court_recording_systems' => $court_recording_systems_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	#AUDIO/VIDEO END
	#===============================================================


	#===============================================================
	#SECURE COMMUNICATION START

	public function update_secure_communications_content($secure_communication_english, $secure_communication_macedonian){
		$english = array('secure_communication' => $secure_communication_english);
		$macedonian = array('secure_communication' => $secure_communication_macedonian);

		$this->db->trans_start();

		$this->db->where('lang', 0);
		$this->db->update('products_translation', $english);

		$this->db->where('lang', 1);
		$this->db->update('products_translation', $macedonian);

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else return true;
	
	}

	#SECURE COMMUNICATION END
	#===============================================================
	
		

	//function that retreives value of the specific column in the specific language, both given as argument. 
	//It either returns the result or false if something went wrong. 
	public function get_products_page_content($column, $lang){

		$this->db->select($column);
		$this->db->from('products_translation');
		
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

/* End of file model_products_pages.php */
/* Location: ./application/models/model_products_pages.php */