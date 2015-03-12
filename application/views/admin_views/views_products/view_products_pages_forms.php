<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Edit products static pages</title>
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/products_js/products_telecommunication_subpages_AJAX.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/products_js/products_power_supply_subpages_AJAX.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/products_js/products_audio_video_subpages_AJAX.js"></script>	
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/about_us_subpages_AJAX.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/services_subpages_AJAX.js"></script> -->
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
	<input type="hidden" id="page" value="products" />

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
						<li role="presentation" class="active"><a href="#telecommunications" aria-controls="telecommunications" role="tab" data-toggle="tab">Telecommunications</a></li>				    				    
						<li role="presentation"><a href="#power-supply" aria-controls="power-supply" role="tab" data-toggle="tab">Power Supply</a></li>
						<li role="presentation"><a href="#audio-video" aria-controls="audio-video" role="tab" data-toggle="tab">Audio/Video</a></li>
						<li role="presentation"><a href="#secure-communications" aria-controls="secure-communications" role="tab" data-toggle="tab">Secure Communication</a></li>
					</ul>		
				</div>	
				

				

				<div class="tab-content">
					
					<!-- Telecommunications CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in active tab-container" id="telecommunications">

						<?php echo $telecommunication_subpage; ?>

					</div>
					<!-- Telecommunications CKEditor form end -->

					<!-- Power Supply CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="power-supply">

						<?php echo $power_supply_subpages; ?>

					</div>
					<!-- Power Supply CKEditor form end -->

					<!-- Audio/Video CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="audio-video">

						<?php echo $audio_video_subpages; ?>

					</div>
					<!-- Audio/Video CKEditor form end -->	


					<!-- Secure Communications CKEditor form begin -->
					<div role="tabpanel" class="tab-pane fade in tab-container" id="secure-communications">
						<h3>Enter the content of the secure communications page</h3>

						<form action="" method="POST">
							
							<div class="form-group">
								<label for="editorSecureCommunicationsEnglish">Services (Secure Communication) - English</label>
							</div>

							<div class="form-group">														
								<textarea name="editorSecureCommunicationsEnglish" id="editorSecureCommunicationsEnglish"><?php echo $secure_communication_en ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorSecureCommunicationsEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



						</script>" ?>

						<div class="form-group">
							<label for="editorSecureCommunicationsMacedonian">Services (Secure Communication) - Macedonian</label>
						</div>

						<div class="form-group">																
							<textarea name="editorSecureCommunicationsMacedonian" id="editorSecureCommunicationsMacedonian"><?php echo $secure_communication_mk; ?></textarea>
						</div>							  					        					       					       
						<?php echo "<script>

						var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
						CKEDITOR.replace( 'editorSecureCommunicationsMacedonian', {
							readOnly: true,
							filebrowserBrowseUrl:roxyFileman,
							filebrowserImageBrowseUrl:roxyFileman+'?type=image',
							removeDialogTabs: 'link:upload;image:upload' 
						});



					</script>" ?>
					

				</form>
				
				<button class="btn btn-primary" name="btnSubmitSecureCommunications" data-loading-text="Saving..." id="btnSubmitSecureCommunications" onclick="update_secure_communications_AJAX();" disabled="disabled">Save secure communication</button>
				
				<button class="btn btn-default" id="edit-secure-communications-content" onclick="enableSecureCommunicationsEdit();">Edit secure communication content</button>

			</div>
			<!-- Secure Communications CKEditor form end -->


		</div>	

	</div>

</div>
<div style="height:100px;"></div>
</body>
</html>