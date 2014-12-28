<?php

class TestLanguageController extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		//$this->lang->load("message", "english");
		//loading the language file, that contains the language specific variabels. 
				
		//$this->lang->load("message", "macedonian");
		
		//the loading of the languages will be done with hooks. More specifically we will use the 
		//post_controller_constructor hook that is invoked after the controller is invoked before each function
		//is executed. 
	}
	
	
	public function index(){				
		
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
		
		$data["additional_address"] = $this->lang->line("additional_address");
		$data["additional_button_more"] = $this->lang->line("additional_button_more");
		
		$data_home_page["header"] = $this->load->view('header', $data, TRUE);
		$data_home_page["footer"] = $this->load->view('footer', $data, TRUE);
		
		$this->load->view("homePage", $data_home_page);
		
	}
	
	
	public function contact(){
		
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
		
		$data["additional_address"] = $this->lang->line("additional_address");
		$data["additional_button_more"] = $this->lang->line("additional_button_more");
		
		$data_contact["header"] = $this->load->view('header', $data, TRUE);
		$data_contact["footer"] = $this->load->view('footer', $data, TRUE);
		
		$this->load->view("contact", $data_contact);
	}
	
	public function test(){
		$this->load->view('view_language');
	}
	
	
}