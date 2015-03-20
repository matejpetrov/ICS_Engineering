<!-- Page where there are only two buttons, Edit about us pages, and Edit services pages.  -->


<!DOCTYPE html>
<html>
<head>
	<title>Manage Page Images</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>

	<?php echo $header; ?>

	<div class="container">
		<div class="row admin-holder">
			<div class="col-md-12"><h2>Manage Page Images</h2></div>
		</div>
		<div class="row admin-holder">
			<a href="<?php echo base_url(); ?>admin_images_controller/homepageSlider" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-picture-o fa-custom" ></i></br>
						<span class="text">Manage Slider Images</span>
					</div>
				</div>
			</a>

			<a href="#" class="items"  style="visibility: hidden;">
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-picture-o fa-custom" ></i></br>
						<span class="text">Manage Sidebar Images</span>
					</div>
				</div>
			</a>

			<a href="<?php echo base_url(); ?>admin_images_controller/homepageWords" class="items" >
				<div class="col-md-3 control-pannel-item">
					<div class="tumbnail">
						<i class="fa fa-newspaper-o fa-custom" ></i></br>
						<span class="text">Manage Words</span>
					</div>
				</div>
			</a>



		</div>

	</div>



</body>
</html>