<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<title>ICS Engineering</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/camera_slider/camera.css' type='text/css' media='all'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl_carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl_carousel/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/carousel.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
	
	<style>
		
	</style>

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.snow.min.1.0.js"></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/camera_slider/camera.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl_carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dynamic_news.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/back_top.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2tnEc20g8Oh5nhCSHHKsbLJERhS--y-k&sensor=false"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-jquery.js"></script>		
	
	<script>
		jQuery(function() {

			jQuery('#camera_wrap_4').camera({
				height : '400px',
				loader : 'pie',
				loaderColor : "#CD5A01",
				pagination : false,
				thumbnails : false,
				fx: 'simpleFade',
				hover : true,
				opacityOnGrid : false,
				navigation : true,
				imagePath : 'images/'
			});

		});
	</script>	
</head>

<body>	
	<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>" />		
	<div id="header" style="border: none;" >
		<div class="container-fluid" style="background-color: #CD5A01;">
			<div class="container header">
				<div class="row">
					<div class="col-md-12 lang">
						<ul class="user-info-list">
							<li>
								<a href="<?php echo base_url(); ?>langSwitch/switchLanguage/english" class="english">EN</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>langSwitch/switchLanguage/macedonian" class="macedonian">MK</a>
							</li>
							<li>
								<a href="http://youtube.com" target="_blank" class="i_header"> <i class="fa fa-youtube-play"></i> </a>
							</li>
							<li>
								<a href="http://twitter.com" target="_blank" class="i_header"> <i class="fa fa-twitter"></i> </a>
							</li>
							<li>
								<a href="http://linkedin.com" target="_blank" class="i_header"><i class="fa fa-linkedin"></i></a>	
							</li>
							<li>
								<a href="http://facebook.com" target="_blank" class="i_header"> <i class="fa fa-facebook"></i> </a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<div id="menu">
			<nav class="navbar navbar-default navbar-static-top nav-custom" role="navigation" >
				<div class="container">
					<div class="navbar-header" style="height: 75px;">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="fa fa-bars fa-lg"></i>
						</button>
						<a href="<?php echo base_url();?>" class="navbar-brand brand-custom"><img src="<?php echo base_url(); ?>assets/images/ics_logo_new.svg" height="75" /></a>
					</div>

					<div class="collapse navbar-collapse collapse-custom">

						<ul class="nav navbar-nav navbar-right nav-menu" id="navMenu">
							<li class="selected">
								<a href="<?php echo base_url();?>" id="home"><?php echo $menus_home; ?></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"
								role="button" aria-expanded="false" id="about_us"> <?php echo $menus_about_us; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu header-menu" role="menu">
									<li>
										<a href="<?php echo base_url(); ?>static_pages_controller/about_us/0" id="about_0"><?php echo $menus_about_us; ?></a>
									</li>
									<hr/>										
									<li>
										<a href="<?php echo base_url(); ?>static_pages_controller/about_us/1" id="about_1"><?php echo $menus_mission; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>static_pages_controller/about_us/2" id="about_2"><?php echo $menus_vision; ?></a>
									</li>
									<li>
										<a href="#" id="about_3"><?php echo $menus_structure; ?></a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="#" id="about_4"><?php echo $menus_partners; ?></a>
									</li>
									<li>
										<a href="#" id="about_5"><?php echo $menus_corporate_info[0]; ?>
											<br />
											<?php echo $menus_corporate_info[1]; ?></a>
										</li>
									</ul>
								</li>								
								<li>
									<a href="#" id="news"><?php echo $menus_news; ?></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									role="button" aria-expanded="false" id="services"><?php echo $menus_services; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu header-menu" role="menu">										
										<li>
											<a href="<?php echo base_url(); ?>static_pages_controller/services/0" id="services_0"><?php echo $menus_services; ?></a>
										</li>
										<hr/>

										<li>
											<a href="<?php echo base_url(); ?>static_pages_controller/services/1" id="services_1"><?php echo $menus_engineering; ?></a>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>static_pages_controller/services/2" id="services_2"><?php echo $menus_system_integration[0]; ?>
												<br />
												<?php echo $menus_system_integration[1]; ?></a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>static_pages_controller/services/3" id="services_3"><?php echo $menus_consulting; ?></a>
											</li>
										</ul>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>static_pages_controller/webMail" id="webMail"><?php echo $menus_web_mail; ?></a>
									</li>

									<li class="last">
										<a href="<?php echo base_url(); ?>static_pages_controller/contact" id="contact"><?php echo $menus_contact; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>