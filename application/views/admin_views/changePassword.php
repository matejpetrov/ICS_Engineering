<!DOCTYPE html>
<html>
<head>
	<title>Complete registration</title>

	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>
	
	<!--///////////////////////////   Styles   ///////////////////////////-->
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	
	<!--///////////////////////////   Scripts   ///////////////////////////-->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slider_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>

</head>
<body>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin-holder">
			<h2>Enter Password to complete registration</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url(); ?>admin/completeUser" method="post" id="form-mail" name="form-mail">
				<input name="id" type="hidden" id="base_url" value="<?php echo $id; ?>" />
				<div class="form-group has-feedback">
					<label for="password">Password</label>
					<input name="password" id="password" type="password" class="form-control" aria-describedby="basic-addon1"/>
					<span class="form-control-feedback"><i id="user-notification" class='fa'></i></span>
				</div>
				<div class="form-group has-feedback">
					<label for="confirm-password">Confirm Password</label>
					<input name="confirm-password" id="confirm-password" type="password" class="form-control" aria-describedby="basic-addon1"/>
					<span class="form-control-feedback"><i id="email-notification" class='fa'></i></span>
				</div>
				<input id="addUser" name="addUser" type="submit" class="btn btn-default" value="Submit"/>					
			</form>
		</div>
	</div>
</body>
</html>