<?php

class Static_pages_controller extends CI_Controller{
	
	public function __construct() {
		parent::__construct();		

		$this->load->model('model_homepage','model_homepage',TRUE);
	}
	
	//ja prikazuva homePage. Za ovaa strana mi trebaat menus_lang i additional address.
	public function index(){
		
		$data = $this->get_menus_language_values();

		$data["additional_address"] = $this->lang->line("additional_address");		

		$data_home_page["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_home_page["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);
		
		
		$data_home_page["images"] = $this->model_homepage->getSliderImages();

		$all_news = $this->get_all_news_homepage();

		$data_home_page['all_news'] = $all_news;

		$this->load->view("homePage", $data_home_page);
	}

	//creates the news homepage slider

	public function get_all_news_homepage(){

		$session_lang = $this->session->userdata('site_lang');

		if($session_lang != ''){
			$lang = $session_lang;
		}		
		else $lang = 'english';

		$offset = $this->input->post('offset');
		if ($offset == false) {
			$all_news = $this->model_homepage->get_all_news_homepage($lang, 0);
		}else{
			$all_news = $this->model_homepage->get_all_news_homepage($lang,$offset);
		}

		$all_news_views = array();

		foreach($all_news as $news){

			$data_temp['id'] = $news['id'];
			$data_temp['news_url'] = $news['news_url'];
			$data_temp['news_image_url'] = $news['news_image_url'];
			$title = $news['title'];
			if (mb_strlen($title) > 45) {
				preg_match('/^.{1,45}(\p{L}|\p{N})\b/u', $title, $temp);
				$short_title = $temp[0].'...';
				$data_temp['title'] = $short_title;
			} else {
				$data_temp['title'] = $title;
				
			}
			

			$view_temp = $this->load->view('admin_views/view_news_homepage_template', $data_temp, TRUE);

			array_push($all_news_views, $view_temp);


		}
		$outputArray = array();
		if (empty($offset)) {
			return $all_news_views;
		}else{ 
			$outputArray['data'] = $all_news_views;
			if (count($all_news_views) == 6) {
				$outputArray['allLoaded'] = false;
			} else {
				$outputArray['allLoaded'] = true;
			}
			
			echo json_encode($outputArray);
		}

	}
	
	//function that retrieves the data for a news with the id given as argument. It should then load the 
	//view_news_preview view, that displays the retrieved news.
	public function show_news_homepage($url){			

		$session_lang = $this->session->userdata('site_lang');

		if($session_lang != ''){
			$lang = $session_lang;
		}		
		else $lang = 'english';

		$news = $this->model_homepage->get_news_homepage($url, $lang);

		$menus_language = $this->get_menus_language_values();		
		$contact_language = $this->get_contact_language_values();

		$data = array_merge($menus_language, $contact_language);
		
		$data["additional_address"] = $this->lang->line("additional_address");		
		
		$data_news["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_news["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);

		$data_news['news_image_url'] = $news['news_image_url'];
		$data_news['title'] = $news['title'];
		$data_news['content'] = $news['content'];

		$this->load->view('view_news_preview', $data_news, FALSE);

	}
	
	public function contact(){
		
		$menus_language = $this->get_menus_language_values();		
		$contact_language = $this->get_contact_language_values();

		$data = array_merge($menus_language, $contact_language);
		
		$data["additional_address"] = $this->lang->line("additional_address");		
		
		$data_contact["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_contact["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);
		
		$this->load->view("contact", $data_contact);
	}


	public function news_example(){

		$data = $this->get_menus_language_values();
		
		$data["additional_address"] = $this->lang->line("additional_address");

		$data_news["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_news["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);

		$this->load->view('news_example', $data_news);
	}

	public function about_us($page){

		$data = $this->get_menus_language_values();
		$data["additional_address"] = $this->lang->line("additional_address");

		$this->load->model('model_about_us_pages', 'model_about_us_pages', TRUE);
		$lang = $this->session->userdata('site_lang');

		$data_temp = array();

		if($page == 0){
			$data_temp["about_us_title"] = $this->lang->line("about_us_title");
			/*$data_temp["about_us_first_page"] = $this->lang->line("about_us_first_page");*/	

			$data_temp["nav_about_us"] = $this->lang->line("nav_about_us");
			$data_temp["nav_telecommunication"] = $this->lang->line("nav_telecommunication");
			$data_temp["nav_power_supply"] = $this->lang->line("nav_power_supply");
			$data_temp["nav_audio_video"] = $this->lang->line("nav_audio_video");
			$data_temp["nav_defence_security"] = $this->lang->line("nav_defence_security");				

			$column = 'about_us';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_first_page"] = $result['about_us'];

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_main", $data_temp, TRUE);

		}
		else if($page == 1){
			$data_temp["about_us_mission_title"] = $this->lang->line("about_us_mission_title");

			$column = 'mission';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_mission_page"] = $result[$column];			

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_mission", $data_temp, TRUE);

		}

		else if($page == 2){
			$data_temp["about_us_partners_title"] = $this->lang->line("about_us_partners_title");
			
			$column = 'partners';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_partners_page"] = $result[$column];

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_partners", $data_temp, TRUE);

		}else if($page == 3){
			$data_temp["about_us_corporate_title"] = $this->lang->line("about_us_corporate_title");
			
			$column = 'corporate_info';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_corporate_page"] = $result[$column];

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_corporate", $data_temp, TRUE);

		}
		


		$data_about_us["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_about_us["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);	

		$this->load->view('about_us_views/view_about_us_template', $data_about_us);
	}


	public function services($page){

		$data = $this->get_menus_language_values();
		$data["additional_address"] = $this->lang->line("additional_address");
		
		$data_temp = array();

		if($page == 0){
			$data_temp["services_title"] = $this->lang->line("services_title");			
			$data_temp["services_first_page"] = $this->lang->line("services_first_page");

			$data_services["services_page"] = $this->load->view("services_views/view_services_main", $data_temp, TRUE);

		}
		else if($page == 1){

			$data_temp["services_engineering_title"] = $this->lang->line("services_engineering_title");
			$data_temp["services_engineering_subtitle"] = $this->lang->line("services_engineering_subtitle");

			$services_engineering_text = $this->lang->line("services_engineering_content");
			$services_engineering_array = explode("^", $services_engineering_text);

			$data_temp["services_engineering_content"] = $services_engineering_array;

			$data_services["services_page"] = $this->load->view("services_views/view_services_engineering", $data_temp, TRUE);

		}

		else if($page == 2){

			$data_temp["services_system_integration_first_paragraph"] = $this->lang->line("services_system_integration_first_paragraph");
			$data_temp["services_system_integration_second_paragraph"] = $this->lang->line("services_system_integration_second_paragraph");
			$data_temp["services_system_integration_title"] = $this->lang->line("services_system_integration_title");
			

			$services_system_integration_list_text = $this->lang->line("services_system_integration_list");
			$services_system_integration_list_array = explode("^", $services_system_integration_list_text);

			$data_temp["services_system_integration_list"] = $services_system_integration_list_array;

			$data_services["services_page"] = $this->load->view("services_views/view_services_system_integration", $data_temp, TRUE);

		}

		else if($page == 3){

			$data_temp["services_consulting_title"] = $this->lang->line("services_consulting_title");
			$data_temp["services_consulting_subtitle"] = $this->lang->line("services_consulting_subtitle");

			$data_services["services_page"] = $this->load->view('services_views/view_services_consulting', $data_temp, TRUE);

		}

		
		

		$data_services["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_services["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);	

		$this->load->view('services_views/view_services_template', $data_services);		
	}

	public function webMail(){
		$data = $this->get_menus_language_values();

		$data["additional_address"] = $this->lang->line("additional_address");

		$data_wMail["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_wMail["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);

		$this->load->view('webMail', $data_wMail);	
	}


	//=========================================================================================
	// language functions

	private function get_menus_language_values(){

		$data = array();

		$data["menus_home"]	= $this->lang->line("menus_home");
		
		$data["menus_about_us"] = $this->lang->line("menus_about_us");
		$data["menus_mission"] = $this->lang->line("menus_mission");
		$data["menus_vision"] = $this->lang->line("menus_vision");
		$data["menus_structure"] = $this->lang->line("menus_structure");
		$data["menus_partners"] = $this->lang->line("menus_partners");
		
		$data["menus_corporate_info"] = explode(" ", $this->lang->line("menus_corporate_info"));		
		
		$data["menus_services"]	= $this->lang->line("menus_services");
		$data["menus_engineering"] = $this->lang->line("menus_engineering");
		$data["menus_system_integration"] = explode(" ", $this->lang->line("menus_system_integration"));
		$data["menus_consulting"] = $this->lang->line("menus_consulting");
		
		$data["menus_news"]	= $this->lang->line("menus_news");
		$data["menus_web_mail"]	= $this->lang->line("menus_web_mail");
		$data["menus_contact"]	= $this->lang->line("menus_contact");
		
		return $data;
	}

	
	private function get_contact_language_values(){

		$data = array();

		$data["contact_page_title"]	= $this->lang->line("contact_page_title");
		$data["contact_name_surname"]	= $this->lang->line("contact_name_surname");
		$data["contact_name_surname_placeholder"]	= $this->lang->line("contact_name_surname_placeholder");
		$data["contact_mail"]	= $this->lang->line("contact_mail");
		$data["contact_mail_placeholder"]	= $this->lang->line("contact_mail_placeholder");
		$data["contact_title"]	= $this->lang->line("contact_title");
		$data["contact_title_placeholder"]	= $this->lang->line("contact_title_placeholder");
		$data["contact_message"]	= $this->lang->line("contact_message");
		$data["contact_message_placeholder"]	= $this->lang->line("contact_message_placeholder");
		$data["contact_checkbox"]	= $this->lang->line("contact_checkbox");
		$data["contact_btn_send"]	= $this->lang->line("contact_btn_send");
		$data["contact_success_message"] = $this->lang->line("contact_success_message");


		return $data;
	}

	//=========================================================================================
	//AJAX

	public function ajax_about_us_page_navigation(){

		$page = $_POST["page_id"];
		$this->load->model('model_about_us_pages', 'model_about_us_pages', TRUE);
		$lang = $this->session->userdata('site_lang');

		if($page == 0){
			$data_temp["about_us_title"] = $this->lang->line("about_us_title");

			$data_temp["nav_about_us"] = $this->lang->line("nav_about_us");
			$data_temp["nav_telecommunication"] = $this->lang->line("nav_telecommunication");
			$data_temp["nav_power_supply"] = $this->lang->line("nav_power_supply");
			$data_temp["nav_audio_video"] = $this->lang->line("nav_audio_video");
			$data_temp["nav_defence_security"] = $this->lang->line("nav_defence_security");				

			$column = 'about_us';
			$top_nav = $this->input->post('top_nav');

			if (!empty($top_nav)) {
				$column = $top_nav;
				$nav_lang = preg_replace('/-/', '_', $top_nav);
				$data_temp["about_us_title"] = $this->lang->line("nav_".$nav_lang);
			}
			

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_first_page"] = $result[$column];

			$data_about_us = $this->load->view("about_us_views/view_about_us_main", $data_temp, TRUE);

		}
		else if($page == 1){
			$data_temp["about_us_mission_title"] = $this->lang->line("about_us_mission_title");

			$column = 'mission';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_mission_page"] = $result[$column];			

			$data_about_us = $this->load->view("about_us_views/view_about_us_mission", $data_temp, TRUE);

		}

		else if($page == 2){
			$data_temp["about_us_partners_title"] = $this->lang->line("about_us_partners_title");
			
			$column = 'partners';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_partners_page"] = $result[$column];

			$data_about_us = $this->load->view("about_us_views/view_about_us_partners", $data_temp, TRUE);

		}else if($page == 3){
			$data_temp["about_us_corporate_title"] = $this->lang->line("about_us_corporate_title");
			
			$column = 'corporate_info';

			$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);

			$data_temp["about_us_corporate_page"] = $result[$column];

			$data_about_us = $this->load->view("about_us_views/view_about_us_corporate", $data_temp, TRUE);

		}


		echo $data_about_us;

	}

	private function about_us_top_nav($column, $lang){
		$result = $this->model_about_us_pages->get_about_us_page_content($column, $lang);
	}

	public function getWord(){
		$lang = $this->session->userdata('site_lang');
		$word = $this->model_homepage->getWord($lang);
		echo $word;
	}

	public function ajax_services_page_navigation(){

		$page = $_POST["page_id"];

		if($page == 0){
			$data_temp["services_title"] = $this->lang->line("services_title");
			$data_temp["services_first_page"] = $this->lang->line("services_first_page");

			$data = $this->load->view("services_views/view_services_main", $data_temp, TRUE);
		}
		else if($page == 1){

			$data_temp["services_engineering_title"] = $this->lang->line("services_engineering_title");
			$data_temp["services_engineering_subtitle"] = $this->lang->line("services_engineering_subtitle");

			$services_engineering_text = $this->lang->line("services_engineering_content");
			$services_engineering_array = explode("^", $services_engineering_text);

			$data_temp["services_engineering_content"] = $services_engineering_array;

			$data = $this->load->view("services_views/view_services_engineering", $data_temp, TRUE);
		}
		else if($page == 2){
			$data_temp["services_system_integration_first_paragraph"] = $this->lang->line("services_system_integration_first_paragraph");
			$data_temp["services_system_integration_second_paragraph"] = $this->lang->line("services_system_integration_second_paragraph");
			$data_temp["services_system_integration_title"] = $this->lang->line("services_system_integration_title");
			

			$services_system_integration_list_text = $this->lang->line("services_system_integration_list");
			$services_system_integration_list_array = explode("^", $services_system_integration_list_text);

			$data_temp["services_system_integration_list"] = $services_system_integration_list_array;

			$data = $this->load->view("services_views/view_services_system_integration", $data_temp, TRUE);
		}
		else if($page == 3){

			$data_temp["services_consulting_title"] = $this->lang->line("services_consulting_title");
			$data_temp["services_consulting_subtitle"] = $this->lang->line("services_consulting_subtitle");

			$data = $this->load->view('services_views/view_services_consulting', $data_temp, TRUE);

		}

		echo $data;

	}

	public function getSetLanguageAjax(){
		$lang = $this->session->userdata('site_lang');
		if (!empty($lang)) {
			$language = array('language' => $lang );
		} else {
			$language = array('language' => 'english' );
		}
		
		
		$this->output->set_output(json_encode($language));
	}
}