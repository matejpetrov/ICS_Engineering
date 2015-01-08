<?php

class TestLanguageController extends CI_Controller{
	
	public function __construct() {
		parent::__construct();		
	}
	
	//ja prikazuva homePage. Za ovaa strana mi trebaat menus_lang i additional address.
	public function index(){
		
		$data = $this->get_menus_language_values();

		$data["additional_address"] = $this->lang->line("additional_address");		

		$data_home_page["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_home_page["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);
		
		$this->load->view("homePage", $data_home_page);
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
		
		$data_temp = array();

		if($page == 0){
			$data_temp["about_us_title"] = $this->lang->line("about_us_title");
			$data_temp["about_us_first_page"] = $this->lang->line("about_us_first_page");

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_main", $data_temp, TRUE);

		}
		else if($page == 1){
			$data_temp["about_us_mission_title"] = $this->lang->line("about_us_mission_title");

			$mission_text = $this->lang->line("about_us_mission");
			$mission_array = explode(".", $mission_text);

			$data_temp["about_us_mission"] = $mission_array;

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_mission", $data_temp, TRUE);
						
		}

		else if($page == 2){
			$data_temp["about_us_vision_title"] = $this->lang->line("about_us_vision_title");
			$data_temp["about_us_vision_subtitle"] = $this->lang->line("about_us_vision_subtitle");			

			$data_about_us["about_us_page"] = $this->load->view("about_us_views/view_about_us_vision", $data_temp, TRUE);
						
		}
		

		$data_about_us["header"] = $this->load->view('shared_layouts/header', $data, TRUE);
		$data_about_us["footer"] = $this->load->view('shared_layouts/footer', $data, TRUE);	

		$this->load->view('about_us_views/view_about_us_template', $data_about_us);
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
		$data["contact_btn_send"]	= $this->lang->line("contact_btn_send");
		$data["contact_success_message"] = $this->lang->line("contact_success_message");
 

		return $data;
	}

	//=========================================================================================


	public function ajax_about_us_page_navigation(){

		$page = $_POST["page_id"];

		if($page == 0){
			$data_temp["about_us_title"] = $this->lang->line("about_us_title");
			$data_temp["about_us_first_page"] = $this->lang->line("about_us_first_page");

			$data = $this->load->view("about_us_views/view_about_us_main", $data_temp, TRUE);
		}
		else if($page == 1){
			$data_temp["about_us_mission_title"] = $this->lang->line("about_us_mission_title");

			$mission_text = $this->lang->line("about_us_mission");
			$mission_array = explode(".", $mission_text);

			$data_temp["about_us_mission"] = $mission_array;

			$data = $this->load->view("about_us_views/view_about_us_mission", $data_temp, TRUE);
						
		}

		else if($page == 2){
			$data_temp["about_us_vision_title"] = $this->lang->line("about_us_vision_title");
			$data_temp["about_us_vision_subtitle"] = $this->lang->line("about_us_vision_subtitle");			

			$data = $this->load->view("about_us_views/view_about_us_vision", $data_temp, TRUE);						
		}


		echo $data;

	}
	
}