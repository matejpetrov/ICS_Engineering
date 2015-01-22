<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_homepage extends CI_Model {

	
	//functions that retrieves all the homepage images from the database, intended to be shown in the 
	//homepage slider. 
	public function getSliderImages(){	
		$result = $this->db->get('homepage_images');
		return $result;
	}


	//functions that retrieves all the information for a news with the id given as argument and
	//the language given as argument. 
	public function get_news_homepage($id, $lang){

		$this->db->select('n.id, n.news_image_url, tc.title, tc.content');
		$this->db->from('news n');
		$this->db->join('translation_content tc', 'n.id = tc.news_id');
		$this->db->where('n.id', $id);
		if($lang == 'english'){
			$this->db->where('tc.lang = 0');
		}
		else if($lang == 'macedonian'){
			$this->db->where('tc.lang = 1');
		}

		$query = $this->db->get();

		foreach($query->result() as $row){
			$result = (array)$row;
		}

		return $result;

	}

	//function that gets all the news from the database intendet to be displayed on the main page. 
	//It has a lang argument that tells us which language is used on the page. Depending on that value we select
	//the right translation for the news.
	public function get_all_news_homepage($lang,$offset){
		
		$this->db->select('n.id, n.news_image_url, tc.title');
		$this->db->from('news n');		
		$this->db->join('translation_content tc', 'n.id = tc.news_id');
		if($lang == 'english'){
			$this->db->where('tc.lang = 0');
		}
		else if($lang == 'macedonian'){
			$this->db->where('tc.lang = 1');
		}

		$this->db->order_by('n.created_at', 'desc');
		$this->db->limit(6, $offset);
		$query = $this->db->get();

		$result = array();

		foreach($query->result() as $row){
			array_push($result, (array)$row);
		}

		return $result;

	}		

}