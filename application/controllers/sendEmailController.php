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
		$this->output->set_output(json_encode($array));
		require (APPPATH. 'third_party/class.phpmailer.php');
		$mail = new PHPMailer ();
		$mail->IsSMTP ();
		$mail->Mailer = 'smtp';
		$mail->SMTPAuth = true;
		$mail->Host = 'mail.ekoplast.com.mk'; // "ssl://smtp.gmail.com" didn't worked
		$mail->Port = 25;
		$mail->SMTPSecure = '';
		
		$mail->Username = "borka@ekoplast.com.mk";
		$mail->Password = "Kondura2359";
		
		$mail->IsHTML ( true ); // if you are going to send HTML formatted emails
		$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
		
		$mail->From = $email;
		$mail->FromName = $nameSurname;
		
		$mail->addAddress ( "borka@ekoplast.com.mk", "User 1" );
		
		$mail->Subject = $subject;
		$mail->Body = $message;
		
		$mail->Send ();
		// echo '<h1>Sucess</h1>' ;
		// redirect('testLanguageController/index');
	}	
}
?>