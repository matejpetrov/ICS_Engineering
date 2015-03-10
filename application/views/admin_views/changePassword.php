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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/password_verify.js"></script>

</head>
<body>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin-holder">
			<h2>Enter Password to complete registration</h2>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="<?php echo base_url(); ?>admin/completeUser" method="post" id="form-complete" name="form-complete">
					<input name="id" type="hidden" id="base_url" value="<?php echo $id; ?>" />
					<div class="form-group has-feedback">
						<label for="password">Password</label>
						<input name="password" id="password" type="password" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group has-feedback">
						<label for="confirm-password">Confirm Password</label>
						<input name="confirm-password" id="confirm-password" type="password" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<input id="confirmUser" name="confirmUser" type="submit" class="btn btn-default" value="Submit"/>					
				</form>
			</div>
		</div>
	</div>
</body>
</html>