<!DOCTYPE html>
<html>
<head>
	<title>Create new user</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>
	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/add_user.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slider_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>

</head>
<body>
	<?php echo $header; ?>
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin-holder">
			<h2>Create new user</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="<?php echo base_url(); ?>admin/addNewUser" method="post" id="form-mail" name="form-mail">
					<div class="form-group has-feedback">
						<label for="username">Username</label>
						<input name="username" id="username" type="text" class="form-control" aria-describedby="basic-addon1"/>
						<span class="form-control-feedback"><i id="user-notification" class='fa'></i></span>
					</div>
					<div class="form-group has-feedback">
						<label for="email">Email</label>
						<input name="email" id="email" type="email" class="form-control" aria-describedby="basic-addon1"/>
						<span class="form-control-feedback"><i id="email-notification" class='fa'></i></span>
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input name="name" id="name" type="text" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label for="surname">Surname</label>
						<input name="surname" id="surname" type="text" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label>User Type</label>
						<select name="user_type" class="form-control" style="width:150px;">
							<option value="3">User</option>
							<option value="2">Super User</option>
						</select>
					</div>
					<input id="addUser" name="addUser" type="submit" class="btn btn-default" value="Submit"/>

					
				</form>
			</div>
		</div>



	</body>
	</html>