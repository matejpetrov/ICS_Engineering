<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/about_us_subpages_AJAX.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/services_subpages_AJAX.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>


	<style type="text/css">

		.services-title{

			text-align: center;
			margin-bottom: 50px;

		}

		.tab-container{

			padding-top: 25px;

		}

		#edit-services-content, #edit-engineering-content, #edit-system-integration-content, #edit-consulting-content{
			
			position: relative;
			left: 10px;
			top: -1px;

		}

	</style>
	
</head>
<body>


	<?php echo $header; ?>	
	
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
	<input type="hidden" id="page" value="services" />

	<div class="success"></div>

	<div class="container">

		<div class="row services-title">			
			<h2>Select the tab and edit the content</h2>
		</div>

		<div class="row">
			
			<div class="col-md-10 col-md-offset-1">

				<div role="tabpanel">

				<!-- Nav tabs -->
				  <ul class="nav nav-tabs nav-justified" role="tablist">
				    <li role="presentation" class="active"><a href="#services" aria-controls="services" role="tab" data-toggle="tab">Services</a></li>
				    <li role="presentation"><a href="#telecommunications" aria-controls="telecommunications" role="tab" data-toggle="tab">Telecommunications</a></li>				    				    
				    <li role="presentation"><a href="#power-supply" aria-controls="power-supply" role="tab" data-toggle="tab">Power Supply</a></li>
				    <li role="presentation"><a href="#audio-video" aria-controls="audio-video" role="tab" data-toggle="tab">Audio/Video</a></li>
				    <li role="presentation"><a href="#defence-security" aria-controls="defence-security" role="tab" data-toggle="tab">Secure Communication</a></li>
				  </ul>

				</div>				
				
				<div class="tab-content">

					<!-- Services CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in active tab-container" id="services">

				  		<?php echo $services_subpages; ?>

				  	</div>
				  	<!-- Services CKEditor form end -->	

				  	<!-- Telecommunication CKEditor form begin -->	
				  	<div role="tabpanel" class="tab-pane fade in tab-container" id="telecommunications">
						<h3>Enter the content of the telecommunication page</h3>

						<form action="" method="POST">
							
							<div class="form-group">
								<label for="editorTelecommunicationEnglish">Services (Telecommunication) - English</label>
							</div>

							<div class="form-group">														
								<textarea name="editorTelecommunicationEnglish" id="editorTelecommunicationEnglish"><?php echo $services_english['telecommunication']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorTelecommunicationEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
								<label for="editorTelecommunicationMacedonian">Services (Telecommunication) - Macedonian</label>
							</div>

							<div class="form-group">																
								<textarea name="editorTelecommunicationMacedonian" id="editorTelecommunicationMacedonian"><?php echo $services_macedonian['telecommunication']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorTelecommunicationMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

						</form>
						<button class="btn btn-primary" name="btnSubmitTelecommunication" id="btnSubmitTelecommunication" onclick="update_telecommunication_AJAX();" disabled="disabled">Save Telecommunication</button>
						
						<button class="btn btn-default" id="edit-telecommunication-content" onclick="enableTelecommunicationEdit();">Edit telecommunication content</button>				  		

					</div>		
					<!-- Telecommunication CKEditor form end -->


					<!-- PowerSupply CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="power-supply">
						<h3>Enter the content of the power supply page</h3>

						<form action="" method="POST">
							
							<div class="form-group">
								<label for="editorPowerSupplyEnglish">Services (Power Supply) - English</label>
							</div>

							<div class="form-group">														
								<textarea name="editorPowerSupplyEnglish" id="editorPowerSupplyEnglish"><?php echo $services_english['power-supply']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorPowerSupplyEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
								<label for="editorPowerSupplyMacedonian">Services (Power Supply) - Macedonian</label>
							</div>

							<div class="form-group">																
								<textarea name="editorPowerSupplyMacedonian" id="editorPowerSupplyMacedonian"><?php echo $services_macedonian['power-supply']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorPowerSupplyMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

						</form>
						<button class="btn btn-primary" name="btnSubmitPowerSupply" id="btnSubmitPowerSupply" onclick="update_power_supply_AJAX();" disabled="disabled">Save Power Supply</button>
						
						<button class="btn btn-default" id="edit-power-supply-content" onclick="enablePowerSupplyEdit();">Edit power supply content</button>

					</div>
					<!-- PowerSupply CKEditor form end -->


					<!-- Audio/Video CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="audio-video">
						<h3>Enter the content of the audio/video page</h3>

						<form action="" method="POST">
							
							<div class="form-group">
								<label for="editorAudioVideoEnglish">Services (Audio/Video) - English</label>
							</div>

							<div class="form-group">														
								<textarea name="editorAudioVideoEnglish" id="editorAudioVideoEnglish"><?php echo $services_english['audio-video']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorAudioVideoEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
								<label for="editorAudioVideoMacedonian">Services (Audio/Video) - Macedonian</label>
							</div>

							<div class="form-group">																
								<textarea name="editorAudioVideoMacedonian" id="editorAudioVideoMacedonian"><?php echo $services_macedonian['audio-video']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorAudioVideoMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

						</form>
						<button class="btn btn-primary" name="btnSubmitAudioVideo" id="btnSubmitAudioVideo" onclick="update_audio_video_AJAX();" disabled="disabled">Save Audio/Video</button>
						
						<button class="btn btn-default" id="edit-audio-video-content" onclick="enableAudioVideoEdit();">Edit audio/video content</button>

					</div>
					<!-- Audio/Video CKEditor form end -->


					<!-- Defence Security CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="defence-security">
						<h3>Enter the content of the defence/security page</h3>

						<form action="" method="POST">
							
							<div class="form-group">
								<label for="editorDefenceSecurityEnglish">Services (Secure Communication) - English</label>
							</div>

							<div class="form-group">														
								<textarea name="editorDefenceSecurityEnglish" id="editorDefenceSecurityEnglish"><?php echo $services_english['defence-security']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorDefenceSecurityEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
								<label for="editorDefenceSecurityMacedonian">Services (Secure Communication) - Macedonian</label>
							</div>

							<div class="form-group">																
								<textarea name="editorDefenceSecurityMacedonian" id="editorDefenceSecurityMacedonian"><?php echo $services_macedonian['defence-security']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorDefenceSecurityMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

						</form>
						
						<button class="btn btn-primary" name="btnSubmitDefenceSecurity" id="btnSubmitDefenceSecurity" onclick="update_defence_security_AJAX();" disabled="disabled">Save Secure communication</button>
						
						<button class="btn btn-default" id="edit-defence-security-content" onclick="enableDefenceSecurityEdit();">Edit secure communication content</button>

					</div>
					<!-- Defence Security CKEditor form end -->


				</div>													
				

			</div>

		</div>

	</div>

<div style="height:100px;"></div>
</body>
</html>