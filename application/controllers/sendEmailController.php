<?php
class SendEmailController extends CI_Controller
{
	function sendEmail(){
		
		$nameSurname=$this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$temp_message = $this->input->post('message');
		$message = 'FROM: '.$nameSurname.'('.$email.')<br><br>'.$temp_message;
		$array = array(
			'ime' => $nameSurname,
			'mail' => $email,
			'sub' => $subject,
			'msg' => $message
			);
		
		$this->load->library('mail_sender');
		$this->mail_sender->setUsername('icsinfo@t-home.mk');
		$this->mail_sender->setFrom('icsinfo@t-home.mk','ICS Engineering Info');
		$this->mail_sender->setSubject($subject);
		$this->mail_sender->setAddress("info@ics.net.mk");
		
		$this->mail_sender->setBody($message);

		$this->mail_sender->sendMail();
		$this->output->set_output(json_encode($array));

	}	
}
?>