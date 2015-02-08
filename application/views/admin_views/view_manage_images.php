<!-- Page where there are only two buttons, Edit about us pages, and Edit services pages.  -->


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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>

	<?php echo $header; ?>

	<div class="static-pages-content">
		<div class="container">
			
			<div class="row admin-holder">
				
				<a href="<?php echo base_url(); ?>staticPagesAdminController/show_about_us_pages" class="items" >
					<div class="col-md-3 control-pannel-item">
						<div class="tumbnail">
							<i class="fa fa-pencil-square-o fa-custom" ></i></br>
							<span class="text">About us pages</span>
						</div>
					</div>
				</a>

<!--<?php //echo base_url(); ?>staticPagesAdminController/show_services_pages-->
				<a href="<?php echo base_url(); ?>staticPagesAdminController/show_services_pages" class="items" >
					<div class="col-md-3 control-pannel-item">
						<div class="tumbnail">
							<i class="fa fa-pencil-square-o fa-custom" ></i></br>
							<span class="text">Services pages</span>
						</div>
					</div>
				</a>

			</div>

		</div>

	</div>


</body>
</html>