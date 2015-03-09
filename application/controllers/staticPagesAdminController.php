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
		$this->load->model('model_products_pages', 'model_products_pages', TRUE);

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
		$data_pages['header'] = $this->checkIfLoggedIn();

		$about_us_db = $this->model_about_us_pages->get_all_about_us_content();


		$array_words = array();

		$array_words[0] = "about_us";
		$array_words[1] = "telecommunication";
		$array_words[2] = "power-supply";
		$array_words[3] = "audio-video";
		$array_words[4] = "defence-security";

		

		list($about_us_pages_1, $about_us_subpages_1) = $this->split_array_page_subpage($about_us_db[0], $array_words);
		list($about_us_pages_2, $about_us_subpages_2) = $this->split_array_page_subpage($about_us_db[1], $array_words);


		$data_pages['about_us_english'] = $about_us_pages_1;
		$data_pages['about_us_macedonian'] = $about_us_pages_2;

		$data_subpages['about_us_english'] = $about_us_subpages_1;
		$data_subpages['about_us_macedonian'] = $about_us_subpages_2;
		

		$data_pages["about_us_subpages"] = $this->load->view('admin_views/view_about_us_subpages_forms', $data_subpages, TRUE);

		$this->load->view('admin_views/view_about_us_pages_forms', $data_pages, FALSE);

	}

	//function that is invoked from the about us tab in the about_us_page and here we should update the content of the about us page
	public function update_about_us_content(){

		$about_us_english = $_POST['editorAboutUsEnglish'];
		$about_us_macedonian = $_POST['editorAboutUsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_about_us_pages->update_about_us_content($about_us_english, $about_us_macedonian)){
			$json = "{message: 'success'";
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
			$json = "{message: 'success'}";
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
			$json = "{message: 'success'}";
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
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}	



	//========================================================================================================
	//about us subpages

	public function update_telecommunication_content(){
		$telecommunication_english = $_POST['editorTelecommunicationEnglish'];
		$telecommunication_macedonian = $_POST['editorTelecommunicationMacedonian'];
		$page = $_POST['page'];

		$json = "";
		$json_encode = "";

		if($page == "about us"){
			$result = $this->model_about_us_pages->update_telecommunication_content($telecommunication_english, $telecommunication_macedonian);
		}
		else{
			#TODO REMOVE THIS
			$result = $this->model_services_pages->update_telecommunication_content($telecommunication_english, $telecommunication_macedonian);
		}

		if($result){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}


	public function update_power_supply_content(){

		$power_supply_english = $_POST['editorPowerSupplyEnglish'];
		$power_supply_macedonian = $_POST['editorPowerSupplyMacedonian'];				
		$page = $_POST['page'];

		$json = "";
		$json_encode = "";

		if($page == "about us"){
			$result = $this->model_about_us_pages->update_power_supply_content($power_supply_english, $power_supply_macedonian);
		}
		else{
			$result = $this->model_services_pages->update_power_supply_content($power_supply_english, $power_supply_macedonian);
		}

		if($result){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	public function update_audio_video_content(){
		$audio_video_english = $_POST['editorAudioVideoEnglish'];
		$audio_video_macedonian = $_POST['editorAudioVideoMacedonian'];		
		$page = $_POST['page'];		

		$json = "";
		$json_encode = "";

		if($page == "about us"){
			$result = $this->model_about_us_pages->update_audio_video_content($audio_video_english, $audio_video_macedonian);
		}
		else{
			$result = $this->model_services_pages->update_audio_video_content($audio_video_english, $audio_video_macedonian);
		}

		if($result){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}


	public function update_defence_security_content(){

		$defence_security_english = $_POST['editorDefenceSecurityEnglish'];
		$defence_security_macedonian = $_POST['editorDefenceSecurityMacedonian'];	
		$page = $_POST['page'];			

		$json = "";
		$json_encode = "";

		if($page == "about us"){
			$result = $this->model_about_us_pages->update_defence_security_content($defence_security_english, $defence_security_macedonian);
		}
		else{
			$result = $this->model_services_pages->update_defence_security_content($defence_security_english, $defence_security_macedonian);
		}

		if($result){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}


	//========================================================================================================


	//========================================================================================================
	//admin services pages



	//========================================================================================================

	//========================================================================================================
	//admin services subpages

	//function that shows the services page where we can add the content of the static pages under the 
	//services tab.
	public function show_services_pages(){
		$data_pages['header'] = $this->checkIfLoggedIn();

		$services_db = $this->model_services_pages->get_all_services_content();

		$array_words = array();

		$array_words[0] = "services";
		$array_words[1] = "engineering";
		$array_words[2] = "consulting";
		$array_words[3] = "system_integration";

		list($services_pages_1, $services_subpages_1) = $this->split_array_page_subpage($services_db[0], $array_words);
		list($services_pages_2, $services_subpages_2) = $this->split_array_page_subpage($services_db[1], $array_words);


		$data_pages['services_english'] = $services_pages_1;
		$data_pages['services_macedonian'] = $services_pages_2;

		$data_subpages['services_english'] = $services_subpages_1;
		$data_subpages['services_macedonian'] = $services_subpages_2;
		

		$data_pages["services_subpages"] = $this->load->view('admin_views/view_services_subpages_forms', $data_subpages, TRUE);

		$this->load->view('admin_views/view_services_pages_forms', $data_pages, FALSE);
	}


	//========================================================================================================
	//admin products pages


	public function show_products_pages(){

		$data_pages['header'] = $this->checkIfLoggedIn();

		//separate functions for getting all the subpages in different variables. 
		//Each variable will be given as data to the separate views for all the subpages. 


		$products_db = $this->model_products_pages->get_all_products_content();

		$data_telecommunication['fixed_access_en'] = $products_db[0]['fixed_access'];
		$data_telecommunication['fixed_access_mk'] = $products_db[1]['fixed_access'];

		$data_telecommunication['transport_en'] = $products_db[0]['transport'];
		$data_telecommunication['transport_mk'] = $products_db[1]['transport'];

		$data_telecommunication['solutions_en'] = $products_db[0]['solutions'];
		$data_telecommunication['solutions_mk'] = $products_db[1]['solutions'];

		$telecommunication_subpage = $this->load->view('admin_views/views_products/view_telecommunication_subpages', $data_telecommunication, TRUE);


		$data_power_supply['dc_power_systems_en'] = $products_db[0]['dc_power_systems'];
		$data_power_supply['dc_power_systems_mk'] = $products_db[1]['dc_power_systems'];

		$data_power_supply['ups_en'] = $products_db[0]['ups'];
		$data_power_supply['ups_mk'] = $products_db[1]['ups'];

		$data_power_supply['monitoring_en'] = $products_db[0]['monitoring'];
		$data_power_supply['monitoring_mk'] = $products_db[1]['monitoring'];

		$data_power_supply['data_center_en'] = $products_db[0]['data_center'];
		$data_power_supply['data_center_mk'] = $products_db[1]['data_center'];

		$power_supply_subpages = $this->load->view('admin_views/views_products/view_power_supply_subpages', $data_power_supply, TRUE);

		$data_audio_video['audio_conference_en'] = $products_db[0]['audio_conference'];
		$data_audio_video['audio_conference_mk'] = $products_db[1]['audio_conference'];

		$data_audio_video['court_recording_systems_en'] = $products_db[0]['court_recording_systems'];
		$data_audio_video['court_recording_systems_mk'] = $products_db[1]['court_recording_systems'];

		$audio_video_subpages = $this->load->view('admin_views/views_products/view_audio_video_subpages', $data_audio_video, TRUE);

		$data_pages['telecommunication_subpage'] = $telecommunication_subpage;
		$data_pages['power_supply_subpages'] = $power_supply_subpages;
		$data_pages['audio_video_subpages'] = $audio_video_subpages;

		$data_pages['secure_communication_en'] = $products_db[0]['secure_communication'];
		$data_pages['secure_communication_mk'] = $products_db[1]['secure_communication'];
		

		$this->load->view('admin_views/views_products/view_products_pages_forms', $data_pages, FALSE);

		
	}

	//========================================================================================================
	//telecommunication subpages BEGIN	

	public function update_fixed_access_content(){

		$fixed_access_english = $_POST['editorFixedAccessEnglish'];
		$fixed_access_macedonian = $_POST['editorFixedAccessMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_fixed_access_content($fixed_access_english, $fixed_access_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_transport_content(){
		$transport_english = $_POST['editorTransportEnglish'];
		$transport_macedonian = $_POST['editorTransportMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_transport_content($transport_english, $transport_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_solutions_content(){
		$solutions_english = $_POST['editorSolutionsEnglish'];
		$solutions_macedonian = $_POST['editorSolutionsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_solutions_content($solutions_english, $solutions_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}
	//telecommunication subpages END
	//========================================================================================================
		
	

	//========================================================================================================
	//power supply subpages BEGIN
	public function update_dc_power_systems_content(){
		$dc_power_systems_english = $_POST['editorDcPowerSystemsEnglish'];
		$dc_power_systems_macedonian = $_POST['editorDcPowerSystemsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_dc_power_systems_content($dc_power_systems_english, $dc_power_systems_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_ups_content(){
		$ups_english = $_POST['editorUpsEnglish'];
		$ups_macedonian = $_POST['editorUpsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_ups_content($ups_english, $ups_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_monitoring_content(){
		$monitoring_english = $_POST['editorMonitoringEnglish'];
		$monitoring_macedonian = $_POST['editorMonitoringMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_monitoring_content($monitoring_english, $monitoring_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_data_center_content(){
		$data_center_english = $_POST['editorDataCenterEnglish'];
		$data_center_macedonian = $_POST['editorDataCenterMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_data_center_content($data_center_english, $data_center_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	//power supply subpages END
	//========================================================================================================


	//========================================================================================================
	//audio/video subpages BEGIN

	public function update_audio_conference_content(){
		$audio_conference_english = $_POST['editorAudioConferenceEnglish'];
		$audio_conference_macedonian = $_POST['editorAudioConferenceMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_audio_conference_content($audio_conference_english, $audio_conference_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	public function update_court_recording_systems_content(){
		$court_recording_systems_english = $_POST['editorCourtRecordingSystemsEnglish'];
		$court_recording_systems_macedonian = $_POST['editorCourtRecordingSystemsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_court_recording_systems_content($court_recording_systems_english, $court_recording_systems_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}

	//audio/video subpages BEGIN
	//========================================================================================================


	public function update_secure_communications_content(){
		$secure_communications_english = $_POST['editorSecureCommunicationsEnglish'];
		$secure_communications_macedonian = $_POST['editorSecureCommunicationsMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_products_pages->update_secure_communications_content($secure_communications_english, $secure_communications_macedonian)){
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}
	}
	

	//========================================================================================================

	#TODO
	public function show_services_pages_final(){				

		$data_pages['header'] = $this->checkIfLoggedIn();

		$services_db = $this->model_services_pages->get_all_services_content();

		$data_pages['services_english'] = $services_db[0];
		$data_pages['services_macedonian'] = $services_db[1];

		$this->load->view('admin_views/view_services_pages_forms_final', $data_pages, FALSE);

	}

	//function that is invoked from the services tab in the services_page and here we should update the content of the 
	//services page
	public function update_services_content(){

		$services_english = $_POST['editorServicesEnglish'];
		$services_macedonian = $_POST['editorServicesMacedonian'];				

		$json = "";
		$json_encode = "";

		if($this->model_services_pages->update_services_content($services_english, $services_macedonian)){
			$json = "{message: 'success'}";
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
			$json = "{message: 'success'}";
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
			$json = "{message: 'success'}";
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
			$json = "{message: 'success'}";
			$json_encode = json_encode($json);
			echo $json_encode;
		}

		else{
			return false;
		}

	}

	//========================================================================================================

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


	//function that gets two arrays as an argument. The first one is an array that contains all the
	//columns of a database table, and the second is list of keys that should be removed from that array and
	//put in another one. This function should return array of two arrays which are actually the first array 
	//from the arguments separated in two. 
	private function split_array_page_subpage($array_full, $array_words){

		$array_result = array();				

		foreach($array_full as $key => $value){
			
			if(in_array($key, $array_words)){				
				$array_result[$key] = $value;
				unset($array_full[$key]);				
			}			

		}

		return array($array_full, $array_result);

	}


}

/* End of file staticPagesAdminController.php */
/* Location: ./application/controllers/staticPagesAdminController.php */


 ?>