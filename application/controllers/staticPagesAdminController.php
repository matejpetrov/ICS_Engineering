<?php 

//controller that is responsible for controlling the actions related to retrieving and updating the data for the static pages (About us and Services)

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StaticPagesAdminController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();				
		
		$this->load->model('model_admin', 'model_admin', TRUE);
		$this->load->model('model_about_us_pages', 'model_about_us_pages', TRUE);
		$this->load->model('model_services_pages', 'model_services_pages', TRUE);

	}

	public function index(){
		
	}

	//function that is invoked when the admin has pressed the Edit static pages info button on the indexAdmin page. 
	public function edit_static_pages_info(){

		$data['header'] = $this->checkIfLoggedIn();			
		$this->load->helper('form');
		$this->load->view('admin_views/view_edit_static_pages', $data);

	}


	//function that shows the about us page where we can add the content of the static pages under the 
	//about us tab. 

	//When i call this function we need to access to the database and take the value to fill the CKEditor textareas. We already have a default values for 
	//the fields in the database, so every change is not an insertion, it is an update to the database. 
	//I will create a new model that will intended for getting and updating all the data for the about us pages. 
	public function show_about_us_pages(){
		$data['header'] = $this->checkIfLoggedIn();

		$about_us_db = $this->model_about_us_pages->get_all_about_us_content();


		foreach($about_us_db as $aud){
			if($aud['lang'] == 0){
				$data['about_us_english'] = $aud;
			}
			else{
				$data['about_us_macedonian'] = $aud;	
			}
		}

		$this->load->view('admin_views/view_about_us_pages_forms', $data, FALSE);

	}


	//function that is invoked from the about us tab in the about_us_page and here we should update the content of the about us page
	public function update_about_us_content(){

		$about_us_english = $_POST['editorAboutUsEnglish'];
		$about_us_macedonian = $_POST['editorAboutUsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_about_us_content($about_us_english, $about_us_macedonian)){
			$json = "{message:".$about_us_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}


	public function update_mission_content(){

		$mission_english = $_POST['editorMissionEnglish'];
		$mission_macedonian = $_POST['editorMissionMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_mission_content($mission_english, $mission_macedonian)){
			$json = "{message:".$mission_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	public function update_vision_content(){

		$vision_english = $_POST['editorVisionEnglish'];
		$vision_macedonian = $_POST['editorVisionMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_vision_content($vision_english, $vision_macedonian)){
			$json = "{message:".$vision_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	public function update_structure_content(){

		$structure_english = $_POST['editorStructureEnglish'];
		$structure_macedonian = $_POST['editorStructureMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_structure_content($structure_english, $structure_macedonian)){
			$json = "{message:".$structure_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}


	public function update_partners_content(){

		$partners_english = $_POST['editorPartnersEnglish'];
		$partners_macedonian = $_POST['editorPartnersMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_partners_content($partners_english, $partners_macedonian)){
			$json = "{message:".$partners_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}


	public function update_corporate_info_content(){

		$corporate_info_english = $_POST['editorCorporateInfoEnglish'];
		$corporate_info_macedonian = $_POST['editorCorporateInfoMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_corporate_info_content($corporate_info_english, $corporate_info_macedonian)){
			$json = "{message:".$corporate_info_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}


	//========================================================================================================
	//admin services pages

	//function that shows the services page where we can add the content of the static pages under the 
	//services tab.
	public function show_services_pages(){
		$data['header'] = $this->checkIfLoggedIn();

		$services_db = $this->model_services_pages->get_all_services_content();


		foreach($services_db as $aud){
			if($aud['lang'] == 0){
				$data['services_english'] = $aud;
			}
			else{
				$data['services_macedonian'] = $aud;	
			}
		}

		$this->load->view('admin_views/view_services_pages_forms', $data, FALSE);
	}

	//function that is invoked from the services tab in the services_page and here we should update the content of the 
	//services page
	public function update_services_content(){

		$services_english = $_POST['editorServicesEnglish'];
		$services_macedonian = $_POST['editorServicesMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_services_pages->update_services_content($services_english, $services_macedonian)){
			$json = "{message:".$services_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	public function update_engineering_content(){

		$engineering_english = $_POST['editorEngineeringEnglish'];
		$engineering_macedonian = $_POST['editorEngineeringMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_services_pages->update_engineering_content($engineering_english, $engineering_macedonian)){
			$json = "{message:".$engineering_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	public function update_system_integration_content(){

		$system_integration_english = $_POST['editorSystemIntegrationEnglish'];
		$system_integration_macedonian = $_POST['editorSystemIntegrationMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_services_pages->update_system_integration_content($system_integration_english, $system_integration_macedonian)){
			$json = "{message:".$system_integration_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}


	}

	public function update_consulting_content(){

		$consulting_english = $_POST['editorConsultingEnglish'];
		$consulting_macedonian = $_POST['editorConsultingMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_services_pages->update_consulting_content($consulting_english, $consulting_macedonian)){
			$json = "{message:".$consulting_english."}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}





	//========================================================================================================
	//private functions

	private function checkIfLoggedIn(){
		$userID = $this->session->userdata('user_id');
		if (empty($userID)) {
			redirect('admin','refresh');
		}else{
			return $this->load_admin_header($userID);
		}
	}

	private function load_admin_header($userID){
		$userData = $this->model_admin->getUserData($userID);
		$data_index['name'] = $userData['name'];
		$data_index['surname'] = $userData['surname'];
		$data_index['role'] = $userData['role'];
		return $this->load->view('admin_views/adminHeader', $data_index, TRUE);
	}


}

/* End of file staticPagesAdminController.php */
/* Location: ./application/controllers/staticPagesAdminController.php */


 ?>