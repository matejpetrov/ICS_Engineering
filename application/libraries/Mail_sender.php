<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_sender
{
	

	protected $ci;
	
	var $mail;

	public function __construct()
	{	
		include (APPPATH. 'third_party/class.phpmailer.php');
		$this->ci =& get_instance();
		$this->mail= new PHPMailer ();
		$this->init();
		
	}
	public function init(){
		$this->mail->IsSMTP ();
		$this->mail->IsHTML(true);
		$this->mail->Mailer = 'smtp';
		$this->mail->SMTPAuth = true;
		$this->mail->Host = 'mail.ekoplast.com.mk'; // "ssl://smtp.gmail.com" didn't worked
		$this->mail->Port = 25;
		$this->mail->SMTPSecure = '';
		$this->mail->Username = "borka@ekoplast.com.mk";
		$this->mail->Password = "Kondura2359";
		// $this->address="borka@ekoplast.com.mk";
		// $this->mail->addAddress("borka@ekoplast.com.mk");
		$this->mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.		
		
		
	}

	public function setFrom($email, $sender_name)	{

		$this->mail->From = $email;
		$this->mail->FromName = $sender_name;
	}

	public function setAddress($to){
		$this->mail->addAddress ($to);
	}

	public function setReplyTo($replyTo)
	{
		$this->mail->AddReplyTo($replyTo);
	}

	public function setSubject($subject){
		$this->mail->Subject = $subject;
		return $this->mail->Subject;
	}

	public function setBody($messageBody){
		$this->mail->Body = $messageBody;
	}

	public function sendMail(){
		return $this->mail->Send();
	}

}

/* End of file MY_mail_sender.php */
/* Location: ./application/libraries/MY_mail_sender.php */
