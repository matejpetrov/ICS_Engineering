<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		$userID = $this->session->userdata('user_id');
		if (empty($userID)) {
			$this->load->view('admin_views/loginAdmin');
		}else{
			$this->home($userID);
		}
		
	}
	
	public function homepageSlider()
	{
		$this->load->view('admin_views/manageSlider', "", FALSE);
	}


	public function create_new_news(){

		$this->load->view('admin_views/view_add_new_news', '', FALSE);

	}

	public function post_create_new_news(){
		
	}
	public function testFunction($urda)
	{
		echo "blablablab";
	}


	public function login(){
		$this->load->model('model_admin','',TRUE);
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
		$this->load->model('model_admin','',TRUE);
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
