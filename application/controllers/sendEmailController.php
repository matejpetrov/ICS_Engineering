<?php
class SendEmailController extends CI_Controller
{
	function sendEmail(){
		
		$nameSurname=$this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$array = array(
			'ime' => $nameSurname,
			'mejl' => $email,
			'sub' => $subject,
			'msg' => $message
		 );
		
		$this->load->library('mail_sender');

		$this->mail_sender->setFrom($email,$nameSurname);
		$this->mail_sender->setSubject($subject);
		$this->mail_sender->setBody($message);

		$this->mail_sender->sendMail();
		$this->output->set_output(json_encode($array));

	}	
}
?>