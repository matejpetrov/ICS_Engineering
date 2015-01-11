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
		$this->checkIfLogedIn();
		$data_slider['images'] = $this->model_admin->getSliderImages();
		$this->load->view('admin_views/manageSlider', $data_slider, FALSE);
	}

	public function deleteImageInSlider($imageID){
		$path = $this->model_admin->getImagePath($imageID);
		if ($this->model_admin->deleteImage($imageID)) {
			unlink($path);
			redirect('admin/homepageSlider', 'refresh');
		}else{
			echo "error";
		}
	}


	public function create_new_news(){
		$this->load->view('admin_views/view_add_new_news', '', FALSE);
	}

	public function post_create_new_news(){
		
		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}

		$created_at = date("Y-m-d");

		$news_title_english = $post["news_title_english"];
		$news_content_english = $post["editorEnglish"];

		$news_title_macedonian = $post["news_title_macedonian"];
		$news_content_macedonian = $post["editorMacedonian"];


		$news = array(
			'created_at' => $created_at
		);

		$translations = array(

			array('lang' => 0, 'title' => $news_title_english, 'content' => $news_content_english),

			array('lang' => 1, 'title' => $news_title_macedonian, 'content' => $news_content_macedonian)

		);				
		
		$id = $this->model_admin->add_new_news($news);				

		$translations[0]['news_id'] = $id;
		$translations[1]['news_id'] = $id;

		$data['id'] = $id;

		if($id != false){

			if($this->model_admin->add_new_translation($translations)){
				$this->show_news($id);				
			}

		}		

	}	

	//functions that gets the news with the id given as argument and redirects to the view that displays that news
	public function show_news($id){

		$news = $this->model_admin->get_news($id);

		$data['news'] = $news;
		$data['id'] = $id;

		$this->load->view('admin_views/view_news_preview', $data, FALSE);

	}

	public function edit_news($id){

		$news = $this->model_admin->get_news($id);

		$data['news'] = $news;
		$data['id'] = $id;

		$this->load->view('admin_views/view_edit_news', $data, FALSE);
	}

	public function post_edit_news(){

		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}
		$id = $post['id'];

		if(isset($_POST['btn-cancel'])){
			$this->load->view('admin_views/loginAdmin', '', FALSE);
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

	private function checkIfLogedIn(){
		$userID = $this->session->userdata('user_id');
		if (empty($userID)) {
			redirect('admin','refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		redirect('admin','refresh');
	}
	public function home($userID){
		$userData = $this->model_admin->getUserData($userID);
		$data_index['name'] = $userData['name'];
		$data_index['surname'] = $userData['surname'];
		$data_index['role'] = $userData['role'];
		$this->load->view('admin_views/indexAdmin', $data_index);
		
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
}
