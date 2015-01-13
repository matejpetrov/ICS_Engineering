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

	public function deleteImageInSlider(){
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
		$this->load->helper('form');
		$this->load->view('admin_views/view_add_new_news', '', FALSE);
	}

	public function post_create_new_news(){
		

		$image = $_FILES['file-input'];
		$config['upload_path'] = 'assets/images/news_main_images';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		foreach($_POST as $key => $value){
			$post[$key] = $value;
		}

		$created_at = date("Y-m-d");
		$news_image_url = base_url().$config['upload_path'].'/'.$image['name'];

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

	//functions that gets the news with the id given as argument and redirects to the view that displays that news
	public function show_news($id, $json=""){

		$news = $this->model_admin->get_news($id);
		
		$date = date_create($news[0]['created_at']);
		$news[0]['created_at'] = date_format($date, "d/m/Y");
		$date = date_create($news[1]['created_at']);
		$news[1]['created_at'] = date_format($date, "d/m/Y");		

		$data['news'] = $news;
		$data['id'] = $id;
		$data['json'] = $json;

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

	public function add_slider_images(){		
		
		$this->load->library('upload');		
		
		/*$this->load->view('temp_p', $data, FALSE);*/
		
		$upload_options = $this->set_upload_options();

		
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
				$this->load->view('temp_p', $data, FALSE);	
		    }
		    //if the upload was successful we should add the image URL in the database, in the homepage_images
		    //table.
		    else{

		    	$homepage_image = array(
					'image_url' => $homepage_image_url
				);				

		    	$id = $this->model_admin->add_slider_images($homepage_image);

		    	if($id != false){
		    		
		    		$json = array(
				        'new_image_url' => base_url().$homepage_image_url,
				        'new_image_id' => $id,
				        'temp' => 'matej'
				    );

				    $json_encode = json_encode($json);
					echo $json_encode;
		    	}
		    	else{
		    		//what to do if something goes wrong...
		    		$data['homepage_image'] = "Database";
					$this->load->view('temp_p', $data, FALSE);
		    	}

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


	//========================================================================================================
	//private functions

	private function set_upload_options(){	  
	//  upload an image options
	    $config = array();
	    $config['upload_path'] = 'assets/images/slides';
		$config['allowed_types'] = 'gif|jpg|png';	    
	    $config['overwrite']     = FALSE;


	    return $config;
	}

}
