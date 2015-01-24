<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();				
		
		$this->load->model('model_admin', 'model_admin', TRUE);

	}


	public function index(){
		$userID = $this->session->userdata('user_id');
		if (empty($userID)) {
			$this->load->view('admin_views/loginAdmin');
		}else{
			$this->home($userID);
		}
	}

	public function homepageSlider(){
		$data_slider['header'] = $this->checkIfLogedIn();
		$data_slider['images'] = $this->model_admin->getSliderImages();
		$this->load->view('admin_views/manageSlider', $data_slider, FALSE);
	}

	public function deleteImageInSlider(){
		$this->checkIfLogedIn();
		$imageID = $this->input->post('id');
		$path = $this->model_admin->getImagePath($imageID);

		if ($this->model_admin->deleteImage($imageID)) {
			unlink($path);
			$array = array('success' => 'true' );
			$this->output->set_output(json_encode($array));
		}else{
			$array = array('success' => 'false' );
			$this->output->set_output(json_encode($array));
		}
	}


	public function create_new_news(){
		$create_news_data['header'] = $this->checkIfLogedIn();
		$this->load->helper('form');
		$this->load->view('admin_views/view_add_new_news', $create_news_data);
	}

	public function post_create_new_news(){
		

		$image = $_FILES['file-input'];
		$config['upload_path'] = 'assets/images/news_main_images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 8000;

		$this->load->library('upload', $config);

		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}

		$created_at = date("Y-m-d");
		// $homepage_image_url = $upload_options['upload_path'].'/'.$_FILES['file-input']['name'];
		$news_image_url = $config['upload_path'].'/'.$image['name'];

		$news_title_english = $post["news_title_english"];
		$news_content_english = $post["editorEnglish"];

		$news_title_macedonian = $post["news_title_macedonian"];
		$news_content_macedonian = $post["editorMacedonian"];


		$news = array(
			'created_at' => $created_at,
			'news_image_url' => $news_image_url
			);

		$translations = array(

			array('lang' => 0, 'title' => $news_title_english, 'content' => $news_content_english),

			array('lang' => 1, 'title' => $news_title_macedonian, 'content' => $news_content_macedonian)

			);
		
		//first upload the image -> then add the news (id, created_at and news_image_url) -> then add the 
		//translation_content		
		if ( ! $this->upload->do_upload('file-input'))
		{
			$data['image'] = $image;
			$data['errors'] = $this->upload->display_errors();
			$data['upload_path'] = $config['upload_path'];

			$this->load->view('temp', $data);
		}
		else
		{
			$id = $this->model_admin->add_new_news($news);	

			$translations[0]['news_id'] = $id;
			$translations[1]['news_id'] = $id;

			$data['id'] = $id;

			if($id != false){

				if($this->model_admin->add_new_translation($translations)){
					$json = json_encode('{error:}');
					$this->show_news($id, $json);				
				}

			}
			
		}										

	}

	//function that shows all the news that are in the database.
	public function show_all_news()	{
		$data['header'] = $this->checkIfLogedIn();

		$all_news = $this->model_admin->get_all_news();		
		$all_news_better = $this->refactor_news_array($all_news);
		$data['all_news'] = $all_news_better;
		$this->load->view('admin_views/view_show_all_news', $data);

	}	

	//functions that gets the news with the id given as argument and redirects to the view that displays that news
	public function show_news($id, $json=""){
		$data['header'] = $this->checkIfLogedIn();
		
		$news = $this->model_admin->get_news($id);
		
		$date = date_create($news[0]['created_at']);
		$news[0]['created_at'] = date_format($date, "d/m/Y");
		$date = date_create($news[1]['created_at']);
		$news[1]['created_at'] = date_format($date, "d/m/Y");		

		$data['news'] = $news;
		$data['id'] = $id;
		$data['json'] = $json;

		$this->load->view('admin_views/view_news_preview', $data);

	}	

	public function edit_news($id){
		$data['header'] = $this->checkIfLogedIn();
		$news = $this->model_admin->get_news($id);

		$data['news'] = $news;
		$data['id'] = $id;

		$this->load->view('admin_views/view_edit_news', $data);
	}

	public function post_edit_news(){

		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}
		$id = $post['id'];

		if(isset($_POST['btn-cancel'])){
			redirect('admin/show_all_news' , 'refresh');
		}
		else{

			$news_title_english = $post["news_title_english"];
			$news_content_english = $post["editorEnglish"];

			$news_title_macedonian = $post["news_title_macedonian"];
			$news_content_macedonian = $post["editorMacedonian"];

			$translation_english = array(
				'news_id' => $id,
				'title' => $news_title_english,
				'content' => $news_content_english
				);

			$translation_macedonian = array(
				'news_id' => $id,
				'title' => $news_title_macedonian,
				'content' => $news_content_macedonian
				);

			if($this->model_admin->edit_news($id, $translation_english, $translation_macedonian)){
				$this->show_news($id);
			}
			else{
				echo "error";
			}

		}

	}

	//function invoked from the popup for changin image, located on the edit news page.
	public function edit_news_image($id){

		$image = $_FILES['file-input'];
		$config['upload_path'] = 'assets/images/news_main_images';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		$news_image_url = base_url().$config['upload_path'].'/'.$image['name'];

		$news = array(
			'news_image_url' => $news_image_url
			);


		if ( ! $this->upload->do_upload('file-input'))
		{
			$data['image'] = $image;
			$data['errors'] = $this->upload->display_errors();
			$data['upload_path'] = $config['upload_path'];

			$this->load->view('temp', $data);
		}
		else
		{						
			if($this->model_admin->edit_news_image($id, $news)){
				
				$json = array(
					'news_image_url' => $news['news_image_url'],
					'temp' => 'matej'
					);

				$json_encode = json_encode($json);

				echo $json_encode;
			}
			else{
				$data['image_path'] = "temp";
				$this->load->view('temp_p', $data, FALSE);
			}
		}
		
	}


	public function delete_news(){				

		$id = $_POST['id'];
		$news_image_url = $_POST['news_image_url'];
		$base_url = base_url();
		$start = strlen($base_url);

		$news_image_url = substr($news_image_url, $start);


		if($this->model_admin->delete_news($id)){			

			if(file_exists($news_image_url)){
				unlink($news_image_url);
				$json = "{success:}";
			}

			else{
				$json = "{success:not deleted ".$news_image_url."}";
			}			
			
			$json_encode = json_encode($json);

			echo $json_encode;

		}
		else{
			return false;
		}				

	}

	public function add_slider_images(){
		
		$this->load->library('upload');		
		
		/*$this->load->view('temp_p', $data, FALSE);*/
		
		$upload_options = $this->set_upload_options();
		$homepage_images = array();
		
		$files = $_FILES;
		$cpt = count($_FILES['file-input']['name']);   
		for($i=0; $i<$cpt; $i++)
		{

			$_FILES['file-input']['name']= $files['file-input']['name'][$i];
			$_FILES['file-input']['type']= $files['file-input']['type'][$i];
			$_FILES['file-input']['tmp_name']= $files['file-input']['tmp_name'][$i];
			$_FILES['file-input']['error']= $files['file-input']['error'][$i];
			$_FILES['file-input']['size']= $files['file-input']['size'][$i];    



			$this->upload->initialize($upload_options);


			$homepage_image_url = $upload_options['upload_path'].'/'.$_FILES['file-input']['name'];

			if(! $this->upload->do_upload('file-input')){
				$data['homepage_image'] = "Upload ".$upload_options['upload_path'].'/'.$_FILES['file-input']['name'];
				$data['errors'] =  $this->upload->display_errors();
				$this->load->view('temp_p', $data, FALSE);	
			}
		    //if the upload was successful we add the image_url in an array.
			else{

				$homepage_image = array(
					'image_url' => $homepage_image_url
					);
				array_push($homepage_images, $homepage_image);		    	

			}

		}

	    //after all the images were uploaded we should add them all in the database

		$ids = $this->model_admin->add_slider_images($homepage_images);

	    //if all the images were added in the database we should construct a JSON object and send it back to 
	    //the view.

		$json = array();

		if($ids != false){

			foreach ($ids as $url => $id) {

				$temp = array(
					'new_image_url' => base_url().$url,
					'new_image_id' => $id,
					'temp' => 'matej'
					);
				array_push($json, $temp);
			}    		

			$json_encode = json_encode($json);
			echo $json_encode;
		}
    	//if the images are not successfully added to the database, we should delete all the uploaded images
    	//and show message for error
		else{    		
			$data['homepage_image'] = "Database";
			$data['errors'] =  "The images were not successfully added to the database.";
			$this->load->view('temp_p', $data, FALSE);
		}

	}

	public function login(){

		$username=$this->input->post('username');
		$password=$this->input->post('password');
		if(empty($username)){
			$array = array(
				'error' => "Please enter username",
				'id'=>'user'
				);
			$this->output->set_output(json_encode($array));
		}elseif (empty($password)) {
			$array = array(
				'error' => "Please enter password",
				'id'=>'pass'
				);
			$this->output->set_output(json_encode($array));
		}else{		
			$result = $this->model_admin->userLogin($username,$password);

			if ($result == false) {
				$array = array(
					'error' => "The email or password you entered is incorrect.",
					'id'=>'pass'					
					);
				$this->output->set_output(json_encode($array));
			} else {
				$session = array(
					'user_id' => $result
					);
				
				$this->session->set_userdata( $session );
				$array = array('success' => "");
				$this->output->set_output(json_encode($array));
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		redirect('admin','refresh');
	}
	public function home($userID){
		$data['header'] = $this->load_admin_header($userID);
		$this->load->view('admin_views/indexAdmin', $data);
		
	}
	public function loginSuccess(){
		$userID = $this->session->userdata('user_id');
		if (empty($userID)) {
			redirect('admin', 'refresh');
		}else{
			redirect('admin','refresh');
			// $this->home($userID);
		}
	}
	
	public function showAddUser(){
		$data_addUser['header'] = $this->checkIfLogedIn();

		if ($this->checkSuperUser()) {
			$this->load->view('admin_views/addUser',$data_addUser);	
		} else {
			$this->show_error_user_role();
		}
	}
	
	public function addNewUser(){
		$temp_password = $this->generateAuthCode(10);
		$auth_link = $this->generateAuthCode(30);
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$role = $this->input->post('user_type');
		$result = $this->model_admin->createUser($name, $surname, $email, $username, $temp_password, $auth_link, $role);
		if ($result) {
			$this->load->library('mail_sender');
			$this->mail_sender->setAddress($email);
			$this->mail_sender->setFrom('noreply@ics.net.mk','ICS Engineering');
			$this->mail_sender->setSubject('New User Created');
			$message="<h3>New user account created</h3></br><p>Hello, ".$name." ".$surname."<br><br>Your CMS administrator account for ICS Engineering website has been created</p><br><p>Please click the link below to complete your registration</p></br><p><a href=\"" .base_url()."admin/auth/" . $auth_link . "\">".base_url()."admin/auth/" . $auth_link . "</a></p><br><p>From ICS Engineering</p><br>";
			$this->mail_sender->setBody($message);

			$this->mail_sender->sendMail();
		}
		redirect('admin/showAllUsers', 'refresh');
	}

	public function auth($code){
		$id = $this->model_admin->checkLink($code);
		if ($id) {
			$data['id'] = $id;
			$this->load->view('admin_views/changePassword',$data);
		} else {
			redirect('static_pages_controller', 'refresh');
		}
	}

	public function completeUser(){
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$result = $this->model_admin->complete($id,$password);
		if ($result) {
			redirect('admin', 'refresh');
		} else {
			echo "error";
		}
		
	}

	public function checkMail(){
		$email = $this->input->post('email');
		if(empty($email)){
			$return = array('result' => 'error' );
			$this->output->set_output(json_encode($return));
		}else{
			$result = $this->model_admin->checkEmail($email);
			if ($result) {
				$return = array('result' => 'ok' );
				$this->output->set_output(json_encode($return));
			} else {
				$return = array('result' => 'error' );
				$this->output->set_output(json_encode($return));
			}

		}
	}

	public function checkUsername(){
		$username = $this->input->post('username');
		if (empty($username)) {
			$return = array('result' => 'error' );
			$this->output->set_output(json_encode($return));
		}else{
			$result = $this->model_admin->checkUsername($username);
			if ($result) {
				$return = array('result' => 'ok' );
				$this->output->set_output(json_encode($return));
			} else {
				$return = array('result' => 'error' );
				$this->output->set_output(json_encode($return));
			}
		}
	}

	public function changeRole(){
		$id = $this->input->post('id');
		$result = $this->model_admin->changeRole($id);
		if ($result == 2) {
			$data = array('role' => 'Super User' );
		} else {
			$data = array('role' => 'User' );
		}
		
		$this->output->set_output(json_encode($data));
		
	}

	public function showAllUsers(){
		$data_showUser['header'] = $this->checkIfLogedIn();
		if ($this->checkSuperUser()) {
			$data_showUser['users'] = $this->model_admin->getAllUsers();
			$this->load->view('admin_views/manageUsers', $data_showUser);		
		} else {
			$this->show_error_user_role();
		}
		
	}

	public function deleteUser(){
		$id = $this->input->post('id');
		$this->model_admin->deleteUser($id);
		$data = array('result' => '1');
		$this->output->set_output(json_encode($data));
	}	

	public function show_error_user_role(){
		$data['header'] = $this->checkIfLogedIn();
		$this->load->view('admin_views/role_error', $data, FALSE);
		
	}


	//========================================================================================================
	//private functions

	private function checkSuperUser(){
		$userID = $this->session->userdata('user_id');
		$role = $this->model_admin->getUserRole($userID);
		if ($role == 2) {
			return true;			
		} else {
			return false;
		}
		
	}

	private function generateAuthCode($lenght)
	{
		$alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$pass = array ();
		$alphaLenght = strlen ( $alphabet ) - 1;
		for($i = 0; $i < $lenght; $i ++) {
			$n = rand ( 0, $alphaLenght );
			$pass [] = $alphabet [$n];
		}
		return implode ( $pass );
	}

	private function checkIfLogedIn(){
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

	private function set_upload_options(){	  
	//  upload an image options
		$config = array();
		$config['upload_path'] = 'assets/images/slides';
		$config['allowed_types'] = 'gif|jpg|png';	    
		$config['overwrite']     = FALSE;


		return $config;
	}

	//function that recieves all the news from the database as a parameter. That array has multiple 
	//members for the same news, since there are two languages for each news.
	//This function will merge those two array members into one and return it as a result. 
	private function refactor_news_array($all_news){

		$all_news_better = array();

		foreach ($all_news as $news) {

			$key = $news['id'];

			if(!array_key_exists($key, $all_news_better)){
				if($news['lang'] == 0){
					$temp = array(					
						'created_at' => $news['created_at'],
						'news_image_url' => $news['news_image_url'],
						'title_english' => $news['title'],
						);
				}
				else {
					$temp = array(					
						'created_at' => $news['created_at'],
						'news_image_url' => $news['news_image_url'],
						'title_macedonian' => $news['title'],
						);
				}

				$all_news_better[$news['id']] = $temp;
			}
			else{
				if($news['lang'] == 0){
					$all_news_better[$news['id']]['title_english'] = $news['title'];
				}
				else {
					$all_news_better[$news['id']]['title_macedonian'] = $news['title'];
				}				


			}			

		}

		return $all_news_better;

	}

}
