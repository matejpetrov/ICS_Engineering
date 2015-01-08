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
		<style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                width: 100%;
                height: 250px;
            }
		</style>
		<style>
            .owl-wrapper {
                text-align: center;
                /*background-color:#f8f8f8;*/
                z-index: 1;
            }
            #owl-news {
                margin-top: -70px;
            }
            #owl-news .item {
                background-color: #FFFFFF;
                height: 435px;
                border: 1px solid #CD5A01;
                display: block;
                padding: 30px 15px;
                margin: 0px 10px;
                box-shadow: 2px 3px 5px -2px rgba(0,0,0,0.75);
            }
            .owl-theme .owl-controls .owl-buttons div {
                padding: 5px 9px;
                -webkit-border-radius: 0px !important;
                -moz-border-radius: 0px !important;
                border-radius: 0px !important;
            }

            .owl-theme .owl-buttons i {
                margin-top: 2px;
                font-size: 30px;
            }

            /*//To move navigation buttons outside use these settings:*/

            .owl-theme .owl-controls .owl-buttons div {
                position: absolute;
            }

            .owl-theme .owl-controls .owl-buttons .owl-prev {
                left: -5px;
                top: 120px;
                padding: 10px 1px 10px 3px;
                z-index: 1;
            }

            .owl-theme .owl-controls .owl-buttons .owl-next {
                right: -5px;
                top: 120px;
                padding: 10px 3px 10px 0px;
                z-index: 1;
            }
		</style>
		<style>
            .fluid_container {
                bottom: 0;
                height: 100%;
                left: 0;
                position: fixed;
                right: 0;
                top: 120px;
                width: 50%;
                z-index: 0;
            }
            #camera_wrap_4 {
                bottom: 0;
                height: 100%;
                left: 0;
                margin-bottom: 0 !important;
                position: static;
                right: 0;
                top: 0;
                margin-top: 0px;
            }
            .camera_bar {
                z-index: 2;
            }
            .camera_thumbs {
                margin-top: -100px;
                position: relative;
                z-index: 1;
            }
            .camera_thumbs_cont {
                border-radius: 0;
                -moz-border-radius: 0;
                -webkit-border-radius: 0;
            }
            .camera_overlayer {
                opacity: .1;
            }
		</style>

		<!--///////////////////////////   Scripts   ///////////////////////////-->
		<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.snow.min.1.0.js"></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js'></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/camera_slider/camera.js'></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl_carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/back_top.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2tnEc20g8Oh5nhCSHHKsbLJERhS--y-k&sensor=false"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-jquery.js"></script>		
		
		<script>
			// $(document).ready(function() {
			// 	$.fn.snow();
			// });
		</script>
		</script>
		<script>
			jQuery(function() {

				jQuery('#camera_wrap_4').camera({
					height : '400px',
					loader : 'pie',
					loaderColor : "#CD5A01",
					pagination : false,
					thumbnails : false,
					hover : true,
					opacityOnGrid : false,
					navigation : true,
					imagePath : 'images/'
				});

			});
		</script>
		<script>
			$(document).ready(function() {

				$("#owl-news").owlCarousel({
					items : 3,
					// itemsDesktop:[1217,3],
					navigation : true,
					pagination : false,
					lazyLoad : true,
					navigationText : ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
				});

			});
		</script>		
	</head>
	
	<body>	
		<input type="hidden" id="uri_string" name="uri_string" value="<?php echo uri_string(); ?>" />		
		<div id="header" style="border: none;" >
			<div class="container-fluid" style="background-color: #CD5A01;">
				<div class="container header">
					<div class="row">
						<div class="col-md-12 lang">
							<ul>
								<li>
									<a href="<?php echo base_url(); ?>langswitch/switchLanguage/english" class="en">EN</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>langswitch/switchLanguage/macedonian" class="mk">MK</a>
								</li>
								<li>
									<a href="http://facebook.com" class="i_header"> <i class="fa fa-youtube-play"></i> </a>
								</li>
								<li>
									<a href="http://facebook.com" class="i_header"> <i class="fa fa-twitter"></i> </a>
								</li>
								<li>
									<a href="http://facebook.com" class="i_header"> <i class="fa fa-facebook"></i> </a>
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
									role="button" aria-expanded="false"> <?php echo $menus_about_us; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="<?php echo base_url(); ?>testLanguageController/about_us/0"><?php echo $menus_about_us; ?></a>
										</li>
										<hr style="margin-top: 3px; margin-bottom: 5px;"/>										
										<li>
											<a href="<?php echo base_url(); ?>testLanguageController/about_us/1"><?php echo $menus_mission; ?></a>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>testLanguageController/about_us/2"><?php echo $menus_vision; ?></a>
										</li>
										<li>
											<a href="#"><?php echo $menus_structure; ?></a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="#"><?php echo $menus_partners; ?></a>
										</li>
										<li>
											<a href="#"><?php echo $menus_corporate_info[0]; ?>
											<br />
											<?php echo $menus_corporate_info[1]; ?></a>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									role="button" aria-expanded="false"><?php echo $menus_services; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">										
										<li>
											<a href="#"><?php echo $menus_services; ?></a>
										</li>
										<hr style="margin-top: 3px; margin-bottom: 5px;"/>
										
										<li>
											<a href="#"><?php echo $menus_engineering; ?></a>
										</li>
										<li>
											<a href="#"><?php echo $menus_system_integration[0]; ?>
											<br />
											<?php echo $menus_system_integration[1]; ?></a>
										</li>
										<li>
											<a href="#"><?php echo $menus_consulting; ?></a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" id="news"><?php echo $menus_news; ?></a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>testLanguageController/webMail" id="webMail"><?php echo $menus_web_mail; ?></a>
								</li>

								<li class="last">
									<a href="<?php echo base_url(); ?>testLanguageController/contact" id="contact"><?php echo $menus_contact; ?></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>