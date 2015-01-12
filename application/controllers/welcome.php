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

		if($image['name'][0] != ''){

			$config['upload_path'] = 'assets/images/news_main_images';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('uploadFile'))
			{
				$data['image'] = $image;
				$data['errors'] = $this->upload->display_errors();
				$data['upload_path'] = $config['upload_path'];

				$this->load->view('temp', $data);
			}
			else
			{			
				$data['image_path'] = base_url().$config['upload_path'].'/'.$image['name'];
				$data['json'] = json_encode('{error:}');
				$this->load->view('temp_p', $data, FALSE);
				
			}

		}	
		else {
			$data['image_path'] = "No image selected";
			//$data['json'] = json_encode('{error:}');
			$this->load->view('temp_p', $data, FALSE);
		}	

	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */