<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_login.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

</head>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row admin-holder">
			<div class="col-md-12"><h2>Welcome to the ICS Engineering CMS admin page</h2></div>
		</div>
		<div class="row admin-holder">
			<a href="<?php echo base_url(); ?>admin/homepageSlider" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-picture-o fa-custom" ></i></br>
						<span class="text">Manage Homepage slider images</span>
					</div>
				</div>
			</a>
			<a href="<?php echo base_url(); ?>admin/create_new_news" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-plus-square-o fa-custom" ></i></br>
						<span class="text">Create new news article</span>

					</div>
				</div>
			</a>
			<a href="<?php echo base_url(); ?>admin/show_all_news" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-pencil-square-o fa-custom" ></i></br>
						<span class="text">Manage news articles</span>					
					</div>
				</div>
			</a>
			<a href="#" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-newspaper-o fa-custom" ></i></br>
						<span class="text">Edit about us info</span>

					</div>
				</div>
			</a>

			<?php if ($role == 2) { ?>
			<a href="<?php echo base_url(); ?>admin/showAddUser" class="items" >
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

			<?php } ?>
		</div>
	</div>
</div>
</body>
</html>