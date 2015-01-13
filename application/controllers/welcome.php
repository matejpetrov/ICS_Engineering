<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['image'] = "nothing yet";
		$data['errors'] = "no errors yet";
		$data['json'] = "no json yet";
		$data['upload_path'] = "no upload_path yet";
		$this->load->view('temp', $data);
	}

	public function ck_editor(){

		$ck_editor_content = $_POST['editor1'];

		$data["editor"] = $ck_editor_content;

		$this->load->view('temp', $data, FALSE);

	}


	public function image_upload(){
		
		$image = $_FILES['uploadFile'];

		$data['images']	 = $image;		
		$no_images = count($image['name']);

		$this->load->library('upload');

		
		/*$this->load->view('temp_p', $data, FALSE);*/
						
		
		$files = $_FILES;
		$temp = array();
	    $cpt = count($_FILES['uploadFile']['name']);	    
	    for($i=0; $i<$cpt; $i++)
	    {

	        $_FILES['uploadFile']['name']= $files['uploadFile']['name'][$i];
	        $_FILES['uploadFile']['type']= $files['uploadFile']['type'][$i];
	        $_FILES['uploadFile']['tmp_name']= $files['uploadFile']['tmp_name'][$i];
	        $_FILES['uploadFile']['error']= $files['uploadFile']['error'][$i];
	        $_FILES['uploadFile']['size']= $files['uploadFile']['size'][$i];    



		    $this->upload->initialize($this->set_upload_options());
		    $this->upload->do_upload('uploadFile');


	    }

		$data['new_array'] = $_FILES['uploadFile'];

		$json = '{error:}';
		$data['json'] = $json;
		$this->load->view('temp_p', $data, FALSE);

		

	}


	//change the structure of the array, to be in a format where there are multiple full image objects. 
	private function reArrayFiles($file_post) {

	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_ary;
	}

	private function set_upload_options(){	  
	//  upload an image options
	    $config = array();
	    $config['upload_path'] = 'assets/images/news_main_images';
		$config['allowed_types'] = 'gif|jpg|png';	    
	    $config['overwrite']     = FALSE;


	    return $config;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */