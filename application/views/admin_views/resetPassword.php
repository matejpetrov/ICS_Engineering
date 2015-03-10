<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

	<title>Password reset</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>
	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />


	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>
	<input id="base_url" type="hidden" value="<?php echo base_url(); ?>">
	<div class="container">
		<div class="row">
			<div class="" style="width:300px;margin: auto; padding: 10% 0 0;">
				<img src="<?php echo base_url(); ?>assets/images/ics_logo_new.svg" style="height: 75px;" /> 
				<h3>Password Reset</h3>
				<div class="callout">
					Please enter your email address. You will receive a link to create a new password via email.  
				</div>
				<form method="post" action="<?php echo base_url(); ?>admin/resetPassword" id="form-reset" name="form-reset">
					<div id="user" class="form-group">
						<label for="email">E-mail</label>
						<input  name="email" id="email" type="text" class="form-control"  aria-describedby="basic-addon1">
					</div>
					<div id="error" class="<?php if($message == 1) echo "alert alert-danger";elseif($message == 2) echo "alert alert-success"?>" role="alert">
					<?php if($message == 1) echo "Email address does not exists";elseif($message == 2) echo "Email sent successfuly!<br>Please check your email for password reset link" ?>
					</div>
					<input id="loginBtn" name="loginBtn" type="submit" class="btn btn-default" value="Submit">
				</form>
				<p style="margin-top: 10px;">
					<a href="<?php echo base_url(); ?>admin">Login</a>
				</p>
				
			</div>			
		</div>
	</div>
</body>
</html>