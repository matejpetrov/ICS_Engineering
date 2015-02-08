<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_images_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();				
		
		$this->load->model('model_admin', 'model_admin', TRUE);
		$this->load->model('model_homepage', 'model_homepage', TRUE);

	}

	public function index()
	{
		$data_slider['header'] = $this->checkIfLogedIn();
		$this->load->view('manage_images/view_manage_images', $data_slider, FALSE);

	}

	public function homepageWords(){
		$data_words['header'] = $this->checkIfLogedIn();		
		$data_words['english'] = $this->model_homepage->getAllWords(0);
		$data_words['macedonian'] = $this->model_homepage->getAllWords(1);
		$this->load->view('manage_images/manage_words', $data_words, FALSE);
		
	}

	public function deleteWords(){
		$wordsID=$this->input->post('words');
		$this->model_homepage->deleteWords($wordsID);
	}

	public function addWords(){
		$words=$this->input->post('words');
		$lang = $this->input->post('lang');
		$words = explode(';', $words);
		$words = array_filter($words);

		$result = $this->model_homepage->insertWords($words,$lang);
		// if ($result) {

			$this->output->set_output(json_encode($result));
		// } else {
			// $this->output->set_output(json_encode($array('result' =>'error')));
		// }
		

	}

	public function homepageSlider(){
		$data_slider['header'] = $this->checkIfLogedIn();
		$data_slider['images'] = $this->model_admin->getSliderImages();
		$this->load->view('manage_images/manage_slider', $data_slider, FALSE);
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
	// ===================================================================================
	// private functions
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

}

/* End of file admin_images_controller.php */
/* Location: ./application/controllers/admin_images_controller.php */