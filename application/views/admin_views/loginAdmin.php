<!DOCTYPE html>
<html>
<head>
	<title>Admin Login CMS</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />


	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_login.js"></script>
</head>
<body>
	<input id="base_url" type="hidden" value="<?php echo base_url(); ?>">
	<div class="container">
		<div class="row">
			<div class="" style="width:300px;margin: auto; padding: 10% 0 0;">
				<img src="<?php echo base_url(); ?>assets/images/ics_logo_new.svg" style="height: 75px;" /> <h3>Admin Login</h3>
				<form method="post" id="form-login" name="form-login">
					<div class="form-group">
						<label>Username</label>
						<input  name="username" id="username" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="password" id="password" type="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
					</div>

					<input id="loginBtn" name="loginBtn" type="submit" class="btn btn-default" value="Login">						
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>