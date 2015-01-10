<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_login.js"></script>
</head>
<body>
	<div class="container">
		<div class="row admin">
			<div class="col-md-12"><h2>Welcome <?php echo $name. " " .$surname; ?></h2></div>
			<a href="<?php echo base_url(); ?>admin/logout">Logout</a>
		</div>
		<div class="row admin">
			<a href="<?php echo base_url(); ?>admin/homepageSlider" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-picture-o fa-custom" ></i></br>
						<span class="text">Manage Homepage slider images</span>
					</div>
				</div>
			</a>
			<a href="#" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-plus-square-o fa-custom" ></i></br>
						<span class="text">Create new news article</span>

					</div>
				</div>
			</a>
			<a href="#" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-pencil-square-o fa-custom" ></i></br>
						<span class="text">Edit news articles</span>					
					</div>
				</div>
			</a>
		</div>
		<?php if ($role == 2) { ?>
		<div class="row admin">
			<a href="#" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-user fa-custom" ></i></br>
						<span class="text">Create new user</span>
					</div>
				</div>
			</a>
			<a href="#" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-users fa-custom" ></i></br>
						<span class="text">Manage users</span>

					</div>
				</div>
			</a>
			
		</div>
		<?php } ?>
	</div>
	</div>
</body>
</html>