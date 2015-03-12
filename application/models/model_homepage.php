<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_homepage extends CI_Model {

	
	//functions that retrieves all the homepage images from the database, intended to be shown in the 
	//homepage slider. 
	public function getSliderImages(){	
		$this->db->order_by('id', 'desc');	
		$result = $this->db->get('homepage_images');
		return $result;
	}


	//functions that retrieves all the information for a news with the id given as argument and
	//the language given as argument. 
	public function get_news_homepage($url, $lang){

		$this->db->select('n.id, n.news_image_url,n.created_at, tc.title, tc.content');
		$this->db->from('news n');
		$this->db->join('translation_content tc', 'n.id = tc.news_id');
		$this->db->where('n.news_url', $url);
		if($lang == 'english'){
			$this->db->where('tc.lang = 0');
		}
		else if($lang == 'macedonian'){
			$this->db->where('tc.lang = 1');
		}

		$query = $this->db->get();

		
		if($query->result()){
			foreach($query->result() as $row){
				$result = (array)$row;
			}

			return $result;
		}		
		else return false;

	}

	//function that gets all the news from the database intendet to be displayed on the main page. 
	//It has a lang argument that tells us which language is used on the page. Depending on that value we select
	//the right translation for the news.
	public function get_all_news_homepage($lang,$offset){
		
		$this->db->select('n.id, n.news_thumb_url,n.news_url, tc.title');
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

	public function news_count()
	{
		$result = $this->db->get('news');
		return $result->num_rows();
	}

	public function getWord($lang){
		$this->db->select('word');
		if ($lang == 'english') {
			$this->db->where('lang','0');
		} else if($lang == 'macedonian') {
			$this->db->where('lang','1');
		}
		$query = $this->db->get('words');
		$resultNum = count($query->result());
		$random = rand(0,$resultNum-1);
		$data = $query->result_array();
		return ($data[$random]['word']);
	}	

	public function getAllWords($lang){
		$this->db->where('lang', $lang);
		$this->db->order_by('word', 'asc');
		$result = $this->db->get('words');
		return $result;
	}

	public function deleteWords($ids){
		foreach ($ids as $id) {
			$this->db->delete('words',array('id' =>$id));
		}

	}

	public function insertWords($words,$lang){
		$arrayWord = array();
		$arrayID = array();
		foreach ($words as $word) {
			$this->db->insert('words',array('word' =>$word ,'lang'=>$lang ));
			array_push($arrayWord,$word);
			array_push($arrayID,$this->db->insert_id());
			
		}
		$array = array_combine($arrayID, $arrayWord);
		return $array;
	}


	public function get_latest_news($lang){

		$this->db->select('n.id, n.news_thumb_url, n.news_url, tc.title');
		$this->db->from('news n');		
		$this->db->join('translation_content tc', 'n.id = tc.news_id');
		if($lang == 'english'){
			$this->db->where('tc.lang = 0');
		}
		else if($lang == 'macedonian'){
			$this->db->where('tc.lang = 1');
		}

		$this->db->order_by('n.created_at', 'desc');
		$this->db->limit(4);
		$query = $this->db->get();

		$result = array();

		if($query){
			foreach($query->result() as $row){
				array_push($result, (array)$row);
			}

			return $result;
		}
		else return false;

	}


}

