<!DOCTYPE html>
<html>
<head>
	<title>Edit Personal Settings</title>

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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/settings.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>

</head>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row admin-holder">
			<h2>Edit personal settings</h2>
		</div>
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2 settings-title">
				<h4>Change Name and Surname</h4>
			</div>

			<div class="col-md-8 col-md-offset-2 settings">
				<form id="profile-info" action="<?php echo base_url(); ?>admin/changeName" method="post">
					
					<div class="form-group has-feedback">
						<label for="name">Name</label>
						<input name="name" id="name" type="text" class="form-control" value="<?php echo $name; ?>" aria-describedby="basic-addon1"/>
					</div>

					<div class="form-group has-feedback">
						<label for="surname">Surname</label>
						<input name="surname" id="surname" type="text" class="form-control" value="<?php echo $surname; ?>" aria-describedby="basic-addon1"/>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-default space" id="change-name"  value="Update profile info" />
						<div id="profile-info-alert" class="alert-settings"></div>
					</div>
					
				</form>
			</div>
			<div class="col-md-8 col-md-offset-2 settings-title">
				<h4>Change Password</h4>
			</div>
			<div class="col-md-8 col-md-offset-2 settings">
				<form id="password" action="<?php echo base_url(); ?>admin/changePassword" method="post">
					
					<div class="form-group has-feedback">
						<label for="pass-old">Old Password</label>
						<input name="pass-old" id="pass-old" type="password" class="form-control" aria-describedby="basic-addon1"/>
					</div>

					<div class="form-group has-feedback ">
						<label for="pass-new">New Password</label>
						<input name="pass-new" id="pass-new" type="password" class="form-control" aria-describedby="basic-addon1"/>
					</div>

					<div class="form-group has-feedback">	
						<label for="pass-conf">Confirm Password</label>
						<input name="pass-conf" id="pass-conf" type="password" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default space" id="change-password"  value="Update Password" />
						<div id="password-alert" class="alert-settings"></div>

					</div>
				</form>
			</div>
		</div>
	</div>
	<div style="height: 100px;"></div>
</body>
</html>