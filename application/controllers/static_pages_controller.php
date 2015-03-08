<?php

class Static_pages_controller extends CI_Controller{
	
	public function __construct() {
		parent::__construct();		

		$this->load->library('session');
		
		$cookie_lang = $this->input->cookie('ics_language');
		if (empty($cookie_lang)) {
			$this->session->set_userdata( array('site_lang' => 'english'));
			$cookie = array(
				'name'   => 'language',
				'value'  => 'english',
				'expire' => '86500',
				'path'   => '/',
				'prefix' => 'ics_',
				'secure' => false
				);
			$this->input->set_cookie($cookie);
		}else{
			$this->session->set_userdata( array('site_lang' => $cookie_lang));
		}

		$this->load->model('model_homepage','model_homepage',TRUE);
	}
	
	//ja prikazuva homePage. Za ovaa strana mi trebaat menus_lang i additional address.
	public function index(){
		$data = $this->get_menus_language_values();

		$data["additional_address"] = $this->lang->line("additional_address");		

		$data_home_page["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_home_page["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);
		
		
		$data_home_page["images"] = $this->model_homepage->getSliderImages();

		$all_news = $this->get_all_news_homepage(0);

		$data_home_page['all_news'] = $all_news;

		$this->load->view("homePage", $data_home_page);
	}


	//function that loads all the views from the database and displays them. Invoked when we click
	//on the news tab in the header. 
	public function news(){

		$data = $this->get_menus_language_values();

		$data["additional_address"] = $this->lang->line("additional_address");		

		$data_all_news["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_all_news["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);

		$all_news = $this->get_all_news_homepage(1);

		$data_all_news['all_news'] = $all_news;		

		$this->load->view('view_all_news', $data_all_news, FALSE);

	}

	//gets the four latest news and loads the content in the view_sidebar_news view. The result will be
	//displayed in the preview of a specific news in the sidebar. Each row should be a link to that news
	//and with click on it AJAX call will be sent and that news will be shown.
	public function latest_news(){

		$session_lang = $this->session->userdata('site_lang');

		$result = $this->model_homepage->get_latest_news($session_lang);

		if($result){
			$latest_news = $result;
			$data['latest_news'] = $latest_news;
			return $this->load->view('view_latest_news', $data, TRUE);
		}
		else{
			return false;
		}


	}

	//creates the news homepage slider
	public function get_all_news_homepage($template){

		$lang = $this->session->userdata('site_lang');

		

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
			if (mb_strlen($title) > 35) {
				preg_match('/^.{1,35}(\p{L}|\p{N})/u', $title, $temp);
				$short_title = $temp[0].'...';
				$data_temp['title'] = $short_title;
			} else {
				$data_temp['title'] = $title;
				
			}
			$data_temp['more'] = $this->lang->line('additional_button_more');			

			if($template == 0){
				$view_temp = $this->load->view('admin_views/view_news_homepage_template', $data_temp, TRUE);
			}
			else{
				$view_temp = $this->load->view('news_template', $data_temp, TRUE);
			}			

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
		if($lang == 'macedonian'){
			setlocale(LC_TIME, 'mk_MK.utf8');
			$date_new =strftime("%#d %B %Y",strtotime($news['created_at']));
		}else{
			setlocale(LC_TIME, 'en_US.utf8');
			$date_new =strftime("%#d %B %Y",strtotime($news['created_at']));
		}
		$data_news['date'] = $date_new;

		$latest_news = $this->latest_news();

		if($latest_news != false){
			$data_news['latest_news'] = $latest_news;
		}
		else{
			$data_news['latest_news'] = "There are no latest news";
		}

		$data_news['latest_news_title'] = $this->lang->line("latest_news_title");

		$this->load->view('view_news_preview', $data_news, FALSE);

	}

	//function that retreives the information for a specific news and retreives its content. The function is invoked 
	//from an AJAX call to the server. 
	public function show_news_homepage_AJAX(){		

		$news_url = $_POST["news_url"];

		$session_lang = $this->session->userdata('site_lang');

		if($session_lang != ''){
			$lang = $session_lang;
		}		
		else $lang = 'english';

		$news = $this->model_homepage->get_news_homepage($news_url, $lang);

		$news["news_url"] = $news_url;


		if($news){
			echo json_encode($news);
		}

		else return false;

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
		$data["nav_services"] = $this->lang->line("nav_services");
		$data["additional_address"] = $this->lang->line("additional_address");

		$this->load->model('model_services_pages', 'model_services_pages', TRUE);
		$lang = $this->session->userdata('site_lang');
		
		$data_temp = array();

		if($page == 0){

			$data_temp["services_title"] = $this->lang->line("services_title");		

			$data_temp["nav_services"] = $this->lang->line("nav_services");
			$data_temp["nav_consulting"] = $this->lang->line("nav_consulting");
			$data_temp["nav_engineering"] = $this->lang->line("nav_engineering");
			$data_temp["nav_system_integration"] = $this->lang->line("nav_system_integration");				

			$column = 'services';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_first_page"] = $result['services'];
			

			$data_services["services_page"] = $this->load->view("services_views/view_services_main", $data_temp, TRUE);

		}
		else if($page == 1){

			$data_temp["services_telecommunication_title"] = $this->lang->line("services_telecommunication");

			$column = 'telecommunication';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_telecommunication_page"] = $result[$column];

			$data_services["services_page"] = $this->load->view("services_views/view_services_telecommunication", $data_temp, TRUE);

		}

		else if($page == 2){
			
			$data_temp["services_power_supply_title"] = $this->lang->line("services_power_supply");

			$column = 'power-supply';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_power_supply_page"] = $result[$column];			

			$data_services["services_page"] = $this->load->view("services_views/view_services_power_supply", $data_temp, TRUE);

		}

		else if($page == 3){

			$data_temp["services_audio_video_title"] = $this->lang->line("services_audio_video");

			$column = 'audio-video';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_audio_video_page"] = $result[$column];			

			$data_services["services_page"] = $this->load->view("services_views/view_services_audio_video", $data_temp, TRUE);

		}

		else if($page == 4){

			$data_temp["services_secure_communication_title"] = $this->lang->line("services_defence_security");

			$column = 'defence-security';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_secure_communication_page"] = $result[$column];			

			$data_services["services_page"] = $this->load->view("services_views/view_secure_communication", $data_temp, TRUE);

		}		
		

		$data_services["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_services["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);	

		$this->load->view('services_views/view_services_template', $data_services);		
	}

	#TODO
	public function products($page){

		$data = $this->get_menus_language_values();		
		$data["additional_address"] = $this->lang->line("additional_address");

		$this->load->model('model_products_pages', 'model_products_pages', TRUE);
		$lang = $this->session->userdata('site_lang');

		$data_temp = array();

		if($page == 0){		

			$data_temp["products_telecommunication"] = $this->lang->line("products_telecommunication");
			$data_temp["products_telecommunication_fixed_access"] = $this->lang->line("products_telecommunication_fixed_access");
			$data_temp["products_telecommunication_transport"] = $this->lang->line("products_telecommunication_transport");
			$data_temp["products_telecommunication_solutions"] = $this->lang->line("products_telecommunication_solutions");

			$column = 'fixed_access';

			$result = $this->model_products_pages->get_products_page_content($column, $lang);

			$data_temp["products_first_page"] = $result['fixed_access'];
			

			$data_products["products_page"] = $this->load->view("products_views/view_products_main", $data_temp, TRUE);

		}

		else if($page == 1){

			$data_temp["products_power_supply_dc_power_systems"] = $this->lang->line("products_power_supply_dc_power_systems");
			$data_temp["products_power_supply_ups"] = $this->lang->line("products_power_supply_ups");
			$data_temp["products_power_supply_monitoring"] = $this->lang->line("products_power_supply_monitoring");
			$data_temp["products_power_supply_data_center"] = $this->lang->line("products_power_supply_data_center");

			$data_temp["products_power_supply"] = $this->lang->line("products_power_supply");

			$column = 'dc_power_systems';

			$result = $this->model_products_pages->get_products_page_content($column, $lang);

			$data_temp["products_power_supply_dc_power_systems_page"] = $result[$column];

			$data_products["products_page"] = $this->load->view("products_views/view_products_dc_power_systems", $data_temp, TRUE);

		}

		else if($page == 2){
			
			$data_temp["products_audio_video_audio_conference"] = $this->lang->line("products_audio_video_audio_conference");
			$data_temp["products_audio_video_court_recording_systems"] = $this->lang->line("products_audio_video_court_recording_systems");

			$column = 'audio_conference';

			$result = $this->model_products_pages->get_products_page_content($column, $lang);

			$data_temp["products_audio_video_audio_conference_page"] = $result[$column];			

			$data_products["products_page"] = $this->load->view("products_views/view_products_audio_conference", $data_temp, TRUE);

		}

		else if($page == 3){

			$data_temp["products_secure_communications_title"] = $this->lang->line("products_secure_communications");

			$column = 'secure_communication';

			$result = $this->model_products_pages->get_products_page_content($column, $lang);

			$data_temp["products_secure_communications_page"] = $result[$column];			

			$data_products["products_page"] = $this->load->view("products_views/view_products_secure_communications", $data_temp, TRUE);

		}	


		$data_products["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_products["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);		

		$this->load->view('products_views/view_products_template', $data_products);

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
		$data["menus_partners"] = $this->lang->line("menus_partners");
		
		$data["menus_corporate_info"] = $this->lang->line("menus_corporate_info");
		
		$data["menus_services"]	= $this->lang->line("menus_services");
		$data["menus_products"]	= $this->lang->line("menus_products");
		$data["menus_telecommunications"] = $this->lang->line("menus_telecommunications");
		$data["menus_power_supply"] = $this->lang->line("menus_power_supply");
		$data["menus_audio_video"] = $this->lang->line("menus_audio_video");
		$data["menus_defence_security"] = $this->lang->line("menus_defence_security");
		
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
		$this->load->model('model_services_pages', 'model_services_pages', TRUE);
		$lang = $this->session->userdata('site_lang');

		if($page == 0){
			$data_temp["services_title"] = $this->lang->line("services_title");		

			$data_temp["nav_services"] = $this->lang->line("nav_services");
			$data_temp["nav_consulting"] = $this->lang->line("nav_consulting");
			$data_temp["nav_engineering"] = $this->lang->line("nav_engineering");
			$data_temp["nav_system_integration"] = $this->lang->line("nav_system_integration");		

			$column = 'services';
			$top_nav = $this->input->post('top_nav');

			if (!empty($top_nav)) {
				$column = $top_nav;
				$nav_lang = preg_replace('/-/', '_', $top_nav);
				$data_temp["services_title"] = $this->lang->line("nav_".$nav_lang);
			}
			

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_first_page"] = $result[$column];

			$data = $this->load->view("services_views/view_services_main", $data_temp, TRUE);

		}

		else if($page == 1){

			$data_temp["services_telecommunication_title"] = $this->lang->line("services_telecommunication");

			$column = 'telecommunication';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_telecommunication_page"] = $result[$column];						

			$data = $this->load->view("services_views/view_services_telecommunication", $data_temp, TRUE);
		}
		else if($page == 2){
			$data_temp["services_power_supply_title"] = $this->lang->line("services_power_supply");

			$column = 'power-supply';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_power_supply_page"] = $result[$column];						

			$data = $this->load->view("services_views/view_services_power_supply", $data_temp, TRUE);
		}
		else if($page == 3){

			$data_temp["services_audio_video_title"] = $this->lang->line("services_audio_video");

			$column = 'audio-video';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_audio_video_page"] = $result[$column];						

			$data = $this->load->view("services_views/view_services_audio_video", $data_temp, TRUE);

		}

		else if($page == 4){

			$data_temp["services_secure_communication_title"] = $this->lang->line("services_defence_security");

			$column = 'defence-security';

			$result = $this->model_services_pages->get_services_page_content($column, $lang);

			$data_temp["services_secure_communication_page"] = $result[$column];						

			$data = $this->load->view("services_views/view_secure_communication", $data_temp, TRUE);

		}

		echo $data;

	}
	
	public function ajax_products_telecommunication_page_navigation(){

		$page = $_POST["page_id"];
		$this->load->model('model_products_pages', 'model_products_pages', TRUE);
		$lang = $this->session->userdata('site_lang');


		if($page == 0){

			$data_temp["products_telecommunication"] = $this->lang->line("products_telecommunication");
			$data_temp["products_telecommunication_fixed_access"] = $this->lang->line("products_telecommunication_fixed_access");
			$data_temp["products_telecommunication_transport"] = $this->lang->line("products_telecommunication_transport");
			$data_temp["products_telecommunication_solutions"] = $this->lang->line("products_telecommunication_solutions");	

			$column = 'fixed_access';
			$top_nav = $this->input->post('top_nav');

			if (!empty($top_nav)) {
				$column = $top_nav;
				$nav_lang = preg_replace('/-/', '_', $top_nav);				
			}
			

			$result = $this->model_products_pages->get_products_page_content($column, $lang);

			$data_temp["products_first_page"] = $result[$column];

			$data = $this->load->view("products_views/view_products_main", $data_temp, TRUE);

		}



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