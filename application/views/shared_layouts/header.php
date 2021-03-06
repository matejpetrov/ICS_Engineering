<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<title><?php echo $title; ?></title>
	<!-- Google -->
	<meta name="author" content="Boris Siljanovski & Matej Petrov" />
	<meta name="description" content=""/>
	<meta name="keywords" content="ICS, ics, Engineering, Consulting, engineering, consulting, telecommunications, alcatel, emerson, axel, virtual access, overture, macedonia,innovation, communication technology, communication technologies, telecommunications technology" />
	<meta name="copyright" content="ICS Consulting Engineering" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Facebook -->
	<?php 
		if (!isset($image)) {
			$fb_image = base_url().'assets/images/news_main_images/img_thumb/ics_default_image_thumb.png';
			$fb_description = $title;
		} else {
			$fb_image = base_url().$image;
			$fb_description = $description;
		}
		// var_dump($description);
	?>
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $fb_image; ?>" />
	<meta property="og:url" content="<?php echo base_url(); ?>" />
	<meta property="og:description" content="<?php echo $fb_description ?>" />

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
	<!-- <link rel="stylesheet" href="/min/g=css" /> -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
	
	

	<!-- ///////////////////////////   Scripts   /////////////////////////// -->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.snow.min.1.0.js"></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl_carousel/owl.carousel.min.js"></script>
	<!-- <script type="text/javascript" src="/min/g=js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dynamic_news.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/back_top.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2tnEc20g8Oh5nhCSHHKsbLJERhS--y-k&sensor=false"></script>
	<?php if (current_url() == base_url()) {?> 
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/camera_slider/camera.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/words_slider.js"></script>
	<?php } ?>
	<?php if (current_url() == base_url() || current_url() == base_url()."about_us/3" ): ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>
		
	<?php endif ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-jquery.js"></script>
	

	<?php if (current_url() == base_url()) {?> 
	
	<script>
		jQuery(function() {

			jQuery('#camera_wrap_4').camera({
				height : '400px',
				loader : 'pie',
				loaderColor : "#CD5A01",
				pagination : false,
				thumbnails : false,
				autoAdvance: true,
				fx: 'simpleFade',
				hover : true,
				opacityOnGrid : false,
				navigation : true,
				imagePath : 'images/'
			});

		});
	</script>
	<?php } ?>
</head>

<body>	
	<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>" />	
	<noscript>
		<div id="warning" class="noscript">
			This website will not work if Javascript is disabled. Please turn on back Javascript.
		</div>	
	</noscript>
	<div id="header" style="border: none;" >
		<div class="container-fluid" style="background-color: #CD5A01;">
			<div class="container header">
				<div class="row">
					<div class="col-md-12 lang">
						<ul class="user-info-list inline">
							<li>
								<a href="<?php echo base_url(); ?>langSwitch/switchLanguage/english" class="english">EN</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>langSwitch/switchLanguage/macedonian" class="macedonian">MK</a>
							</li>							
							<li>
								<a href="https://www.linkedin.com/company/1580791" target="_blank" class="i_header"><i class="fa fa-linkedin"></i></a>	
							</li>
							<li>
								<a href="https://www.facebook.com/pages/ICS-Consulting-Engineering/938490292836165" target="_blank" class="i_header"> <i class="fa fa-facebook"></i> </a>
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
						<a href="<?php echo base_url();?>" class="navbar-brand brand-custom"><img class="logo" src="<?php echo base_url(); ?>assets/images/ics-logo-new-new.svg" style="height:75px;width:227px;" /></a>
					</div>

					<div class="collapse navbar-collapse collapse-custom">

						<ul class="nav navbar-nav navbar-right nav-menu" id="navMenu">
							<li>
								<a href="<?php echo base_url();?>" id="home"><?php echo $menus_home; ?></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"
								role="button" aria-expanded="false" id="about_us"> <?php echo $menus_about_us; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu header-menu" role="menu">
									<li>
										<a href="<?php echo base_url(); ?>about_us/0" id="about_0"><?php echo $menus_about_us; ?></a>
									</li>
									<hr/>										
									<li>
										<a href="<?php echo base_url(); ?>about_us/mission" id="about_1"><?php echo $menus_mission; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>about_us/2" id="about_2"><?php echo $menus_partners; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>about_us/3" id="about_3"><?php echo $menus_corporate_info ?></a>
									</li>
								</ul>
							</li>								
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"
								role="button" aria-expanded="false" id="services"><?php echo $menus_services; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu header-menu" role="menu">										
									<li>
										<a href="<?php echo base_url(); ?>services/0" id="services_0"><?php echo $menus_consulting; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/1" id="services_1"><?php echo $menus_engineering; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/2" id="services_2"><?php echo $menus_system_integration; ?></a>
									</li>


								</ul>

							</li>

							<!-- products -->
							<!-- <?php //echo base_url(); ?>services/2 -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"
								role="button" aria-expanded="false" id="products"><?php echo $menus_products; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu header-menu" role="menu">										
									<li>
										<a href="<?php echo base_url(); ?>products/0" id="products_0"><?php echo $menus_telecommunications; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>products/1" id="products_1"><?php echo $menus_power_supply; ?></a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>products/2" id="products_2"><?php echo $menus_audio_video; ?></a>
									</li>	
									<li>
										<a href="<?php echo base_url(); ?>products/3" id="products_3"><?php echo $menus_defence_security; ?></a>
									</li>										
								</ul>

							</li>
							<!-- products -->

							<li>
								<a href="<?php echo base_url(); ?>news" id="news"><?php echo $menus_news; ?></a>
							</li>
							<li>
								<a href="http://mail.ics.net.mk:81/redmine/" target="_blank" id="support"><?php echo $menus_web_mail; ?></a>
							</li>

							<li class="last">
								<a href="<?php echo base_url(); ?>contact" id="contact"><?php echo $menus_contact; ?></a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>