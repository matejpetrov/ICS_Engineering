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

				  	<li role="presentation" class="active"><a href="#consulting" aria-controls="consulting" role="tab" data-toggle="tab">Consulting</a></li>
				    
				    <li role="presentation"><a href="#engineering" aria-controls="engineering" role="tab" data-toggle="tab">Engineering</a></li>				    				    
				    				    
				    <li role="presentation"><a href="#system_integration" aria-controls="system_integration" role="tab" data-toggle="tab">System Integration</a></li>
				  </ul>

				</div>

				<div class="tab-content">


					<!-- Consulting CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in tab-container" id="consulting">
				    	<h3>Enter the content of the consulting page</h3>

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorConsultingEnglish">Consulting - English</label>
				    		</div>

				    		<div class="form-group">														
								<textarea name="editorConsultingEnglish" id="editorConsultingEnglish"><?php echo $services_english['consulting']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorConsultingEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorConsultingMacedonian">Consulting - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorConsultingMacedonian" id="editorConsultingMacedonian"><?php echo $services_macedonian['consulting']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorConsultingMacedonian', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitConsulting" id="btnSubmitConsulting" onclick="update_consulting_AJAX();" disabled="disabled">Save Consulting</button>
				    	
				    	<button class="btn btn-default" id="edit-consulting-content" onclick="enableConsultingEdit();">Edit consulting content</button>

				    </div>
				    <!-- Consulting CKEditor form end -->

				    <!-- Engineering CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in tab-container" id="engineering">
				    	<h3>Enter the content of the engineering page</h3>

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorEngineeringEnglish">Engineering - English</label>
				    		</div>

				    		<div class="form-group">														
								<textarea name="editorEngineeringEnglish" id="editorEngineeringEnglish"><?php echo $services_english['engineering']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorEngineeringEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorEngineeringMacedonian">Engineering - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorEngineeringMacedonian" id="editorEngineeringMacedonian"><?php echo $services_macedonian['engineering']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorEngineeringMacedonian', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitEngineering" id="btnSubmitEngineering" onclick="update_engineering_AJAX();" disabled="disabled">Save Engineering</button>
				    	
				    	<button class="btn btn-default" id="edit-engineering-content" onclick="enableEngineeringEdit();">Edit engineering content</button>

				    </div>
				    <!-- Engineering CKEditor form end -->

				    <!-- System Integration CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in tab-container" id="system_integration">
				    	<h3>Enter the content of the system integration page</h3>

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorSystemIntegrationEnglish">System Integration - English</label>
				    		</div>

				    		<div class="form-group">														
								<textarea name="editorSystemIntegrationEnglish" id="editorSystemIntegrationEnglish"><?php echo $services_english['system_integration']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorSystemIntegrationEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorSystemIntegrationMacedonian">System Integration - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorSystemIntegrationMacedonian" id="editorSystemIntegrationMacedonian"><?php echo $services_macedonian['system_integration']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorSystemIntegrationMacedonian', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitSystemIntegration" id="btnSubmitSystemIntegration" onclick="update_system_integration_AJAX();" disabled="disabled">Save System Integration</button>
				    	
				    	<button class="btn btn-default" id="edit-system-integration-content" onclick="enableSystemIntegrationEdit();">Edit system integration content</button>

				    </div>
				    <!-- System Integration CKEditor form end -->


				</div>

			</div>

		</div>

	</div>

</body>

</html>