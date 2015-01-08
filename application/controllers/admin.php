<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_views/loginAdmin');
	}	
	public function login(){
		$this->load->model('model_admin','',TRUE);
		// echo "<script type='text/javascript'>alert('');</script>";
		$result = $this->model_admin->userLogin($this->input->post('username'), $this->input->post('password'));

		if ($result == false) {
			$data = $this->load->view('login_error','',TRUE); 
			echo $data;
		} else {
			echo "1";
			// redirect('admin/show','refresh');
		}
		
	}
	public function show(){
		$this->load->view('admin_views/indexAdmin', '', FALSE);
	}
}
