<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
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

	public function create_new_news(){
		$create_news_data['header'] = $this->checkIfLogedIn();
		$this->load->helper('form');
		$this->load->view('admin_views/view_add_new_news', $create_news_data);
	}

	public function post_create_new_news(){
		
		$tag_upload = true;

		$image = $_FILES['file-input'];

		//['name']		

		$config['upload_path'] = 'assets/images/news_main_images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 8000;

		$this->load->library('upload', $config);

		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}

		$created_at = date("Y-m-d");
		
		if($image['name'] == ""){
			$image['name'] = "jack-daniels-logo3.jpg";
			$tag_upload = false;
		}		

		$news_image_url = $config['upload_path'].'/'.$image['name'];

		$news_title_english = $post["news_title_english"];
		$news_content_english = $post["editorEnglish"];
		$news_url_english = preg_replace('/(;|\/|:|(|)|\\\|=|\+|\"|\')/i', "", $news_title_english);
		$news_url_english = url_title($news_url_english,'dash', true);

		$news_title_macedonian = $post["news_title_macedonian"];
		$news_content_macedonian = $post["editorMacedonian"];


		$news = array(
			'created_at' => $created_at,
			'news_url' => $news_url_english,
			'news_image_url' => $news_image_url
			);

		$translations = array(

			array('lang' => 0, 'title' => $news_title_english, 'content' => $news_content_english),

			array('lang' => 1, 'title' => $news_title_macedonian, 'content' => $news_content_macedonian)

			);
		
		//if an image is chosen to be uploaded i should use the do_upload function, otherwise i should only insert row in the database.
		if($tag_upload == true){

			//first upload the image -> then add the news (id, created_at and news_image_url) -> then add the 
			//translation_content		
			if ( ! $this->upload->do_upload('file-input'))
			{
				$data['image'] = $image;
				$data['errors'] = $this->upload->display_errors();
				$data['upload_path'] = $config['upload_path'];

				$this->load->view('temp_to_delete/view_temp', $data);
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

		//if no image is chosen to be uploaded, i only do an insert in the database. 
		else{
			
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

			if($news_image_url != "assets/images/news_main_images/jack-daniels-logo3.jpg"){
				if(file_exists($news_image_url)){
					unlink($news_image_url);
					$json = "{success:}";
				}

				else{
					$json = "{success:not deleted ".$news_image_url."}";
				}	

			}	
			else{
				$json = "{success:}";
			}	
			
			$json_encode = json_encode($json);

			echo $json_encode;

		}
		else{
			return false;
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
			$data_addUser['userError'] = false;
			$data_addUser['emailError'] = false;
			$data_addUser['nameError'] = false;
			$data_addUser['surnameError'] = false;
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
		
		$userMsg = $this->checkUser($username);
		$emailMsg = $this->checkEmail($email);
		$nameMsg = $this->checkName($name);
		$surnameMsg = $this->checkSurname($surname);

		if (!$userMsg && !$emailMsg && !$nameMsg && !$surnameMsg) {
			$result = $this->model_admin->createUser($name, $surname, $email, $username, $temp_password, $auth_link, $role);
			if ($result) {
				$this->load->library('mail_sender');
				$this->mail_sender->setAddress($email);
				$this->mail_sender->setFrom('info@ics.net.mk','ICS Engineering');
				$this->mail_sender->setSubject('New User Created');
				$message="<h3>New user account created</h3></br><p>Hello, ".$name." ".$surname."<br><br>Your CMS administrator account for ICS Engineering website has been created</p><br><p>Username: ".$username."</p><br><p>Please click the link below to complete your registration</p></br><p><a href=\"" .base_url()."admin/auth/" . $auth_link . "\">".base_url()."admin/auth/" . $auth_link . "</a></p><br><p>From ICS Engineering</p><br>";
				$this->mail_sender->setBody($message);

				if($this->mail_sender->sendMail()){
					redirect('admin/showAllUsers', 'refresh');
				}
			}
		} else {
			$errors['header'] = $this->checkIfLogedIn();
			$errors['userError'] = $userMsg;
			$errors['emailError'] = $emailMsg;
			$errors['nameError'] = $nameMsg;
			$errors['surnameError'] = $surnameMsg;
			$this->load->view('admin_views/addUser', $errors, FALSE);
		}
		

		
	}

	private function checkUser($username){
		if (empty($username)) {
			return 'Username required';
		}else{
			if (preg_match("/^[0-9A-Za-z_\.-]+$/", $username) == 0) {
				return 'Username contains invalid character(s)';
			} else {
				$result = $this->model_admin->checkUsername($username);
				if ($result) {
					return false;
				} else {
					return 'Username already in use';
				}
			}
			
		}
	}

	private function checkEmail($email){
		if(empty($email)){
			return 'Email required';
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return 'Please enter valid e-mail address';
			} else {
				$result = $this->model_admin->checkEmail($email);
				if ($result) {
					return false;
				} else {
					return 'E-mail already in use';
				}
			}
			
			
		}
	}

	private function checkName($name){
		if ($name == '') {
			return 'Name Required';
		}else{
			return false;
		}
	}

	private function checkSurname($surname){
		if ($surname == '') {
			return 'Surname Required';
		}else{
			return false;
		}
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
		// $hash = password_hash($password, PASSWORD_BCRYPT);
		$id = $this->input->post('id');
		$result = $this->model_admin->complete($id,$password);
		if ($result) {
			redirect('admin', 'refresh');
		} else {
			echo "error";
		}	
	}

	public function settings(){
		$user_id = $this->session->userdata('user_id');
		$userData = $this->model_admin->getUserData($user_id);
		$data['header'] = $this->checkIfLogedIn();
		$data['name'] = $userData['name'];
		$data['surname'] = $userData['surname']; 
		$this->load->view('admin_views/view_user_settings', $data, FALSE);
	}

	public function changeName(){
		$this->checkIfLogedIn();
		$user_id = $this->session->userdata('user_id');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$result = $this->model_admin->changeName($user_id,$name,$surname);
		
		if ($result) {
			$this->output->set_output(json_encode(array('success'=>'Your personal info was successfully updated')));
		} else {
			$this->output->set_output(json_encode(array('error'=>'Something went wrong')));
		}
		
		
	}

	public function changePassword(){
		$this->checkIfLogedIn();
		$user_id = $this->session->userdata('user_id');
		$old = $this->input->post('pass-old');
		$new = $this->input->post('pass-new');
		$conf = $this->input->post('pass-conf');

		if (empty($old) || empty($new) || empty($conf)) {
			$this->output->set_output(json_encode(array('error'=>'All fields are required')));
		} else if (!$this->compareOldPassword($old)) {
			$this->output->set_output(json_encode(array('error'=>$old,'id'=>'pass-old')));
		} else if (!$this->compareNewPassword($new,$conf)) {
			$this->output->set_output(json_encode(array('error'=>'Passwords don\'t match','id'=>'pass-conf')));
		} else if ($this->model_admin->changePassword($user_id,$new)) {
			$this->output->set_output(json_encode(array('success'=>'Password was successfully updated')));
		}
	}

	public function checkMailAjax(){
		$this->checkIfLogedIn();
		$email = $this->input->post('email');
		if(empty($email)){
			$return = array('result' => 'Email required' );
			$this->output->set_output(json_encode($return));
		}else{
			// filter_var('bob@example.com', FILTER_VALIDATE_EMAIL)
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$return = array('result' => 'Please enter valid e-mail address' );
				$this->output->set_output(json_encode($return));
			} else {
				$result = $this->model_admin->checkEmail($email);
				if ($result) {
					$return = array('result' => 'ok' );
					$this->output->set_output(json_encode($return));
				} else {
					$return = array('result' => 'E-mail already in use' );
					$this->output->set_output(json_encode($return));
				}
			}
			
			
		}
	}

	public function checkUsernameAjax(){
		$this->checkIfLogedIn();
		$username = $this->input->post('username');
		if (empty($username)) {
			$return = array('result' => 'Username required' );
			$this->output->set_output(json_encode($return));
		}else{
			// preg_match("^[0-9A-Za-z_]+$", username) == 0
			if (preg_match("/^[0-9A-Za-z_\.-]+$/", $username) == 0) {
				$return = array('result' => 'Username contains invalid character(s)' );
				$this->output->set_output(json_encode($return));
			} else {
				$result = $this->model_admin->checkUsername($username);
				if ($result) {
					$return = array('result' => 'ok' );
					$this->output->set_output(json_encode($return));
				} else {
					$return = array('result' => 'Username already in use' );
					$this->output->set_output(json_encode($return));
				}
			}
			
		}
	}

	public function changeRole(){
		$this->checkIfLogedIn();
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
		$this->checkIfLogedIn();
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

	private function compareNewPassword($password,$password_confirm){
		if ($password == $password_confirm) {
			return true;
		} else {
			return false;
		}	
	}

	private function compareOldPassword($formPassword){
		$userID = $this->session->userdata('user_id');
		$dbPassword = $this->model_admin->getOldPassword($userID);
		// password_verify($formPassword,$dbPassword)
		if ($formPassword == $dbPassword) {
			return true;
		} else {
			return false;
		}
		
	}

	private function checkSuperUser(){
		$userID = $this->session->userdata('user_id');
		$role = $this->model_admin->getUserRole($userID);
		if ($role == 2) {
			return true;			
		} else {
			return false;
		}	
	}

	private function generateAuthCode($lenght){
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

	//  upload an image options
	private function set_upload_options(){	  
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
