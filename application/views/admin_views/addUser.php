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
	<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slider_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>

</head>
<body>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin-holder">
			<h2>Create new user</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form action="<?php echo base_url(); ?>admin/addUser" method="post" id="form-mail" name="form-mail">
					<div class="form-group">
						<label for="name">Name</label>
						<input name="name" id="name" type="text" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label for="surname">Surname</label>
						<input name="surname" id="surname" type="text" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input name="username" id="username" type="text" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input name="email" id="email" type="email" class="form-control" aria-describedby="basic-addon1"/>
					</div>
					<div class="form-group">
						<label>User Type</label>
						<select name="user_type" class="form-control" style="width:150px;">
							<option id="2">Super User</option>
							<option id="3">User</option>
						</select>
					</div>
					<input id="sendMail" name="sendMail" type="submit" class="btn btn-default" value="Submit"/>

					
				</form>
			</div>
		</div>



	</body>
	</html>