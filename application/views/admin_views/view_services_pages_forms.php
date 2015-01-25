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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/services_pages_AJAX.js"></script>
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

	<script type="text/javascript">

		function enableServicesEdit(){

			var btnText = $("#edit-services-content").html();
			var isEnabled = $("#btnSubmitServices").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitServices").prop("disabled", false);				
				$("#edit-services-content").html("Cancel");
				CKEDITOR.instances.editorServicesEnglish.setReadOnly (false);
				CKEDITOR.instances.editorServicesMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitServices").prop("disabled", true);				
				$("#edit-services-content").html("Edit services content");
				CKEDITOR.instances.editorServicesEnglish.setReadOnly (true);
				CKEDITOR.instances.editorServicesMacedonian.setReadOnly (true);
			}

		}

		function enableEngineeringEdit(){

			var btnText = $("#edit-engineering-content").html();
			var isEnabled = $("#btnSubmitEngineering").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitEngineering").prop("disabled", false);				
				$("#edit-engineering-content").html("Cancel");
				CKEDITOR.instances.editorEngineeringEnglish.setReadOnly (false);
				CKEDITOR.instances.editorEngineeringMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitEngineering").prop("disabled", true);				
				$("#edit-engineering-content").html("Edit engineering content");				
				CKEDITOR.instances.editorEngineeringEnglish.setReadOnly (true);
				CKEDITOR.instances.editorEngineeringMacedonian.setReadOnly (true);
			}

		}

		function enableSystemIntegrationEdit(){

			var btnText = $("#edit-system-integration-content").html();
			var isEnabled = $("#btnSubmitSystemIntegration").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitSystemIntegration").prop("disabled", false);				
				$("#edit-system-integration-content").html("Cancel");
				CKEDITOR.instances.editorSystemIntegrationEnglish.setReadOnly (false);
				CKEDITOR.instances.editorSystemIntegrationMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitSystemIntegration").prop("disabled", true);				
				$("#edit-system-integration-content").html("Edit vision content");				
				CKEDITOR.instances.editorSystemIntegrationEnglish.setReadOnly (true);
				CKEDITOR.instances.editorSystemIntegrationMacedonian.setReadOnly (true);
			}
		
		}

		function enableConsultingEdit(){

			var btnText = $("#edit-consulting-content").html();
			var isEnabled = $("#btnSubmitConsulting").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitConsulting").prop("disabled", false);				
				$("#edit-consulting-content").html("Cancel");
				CKEDITOR.instances.editorConsultingEnglish.setReadOnly (false);
				CKEDITOR.instances.editorConsultingMacedonian.setReadOnly (false);			
			}
			else{
				$("#btnSubmitConsulting").prop("disabled", true);				
				$("#edit-consulting-content").html("Edit consulting content");				
				CKEDITOR.instances.editorConsultingEnglish.setReadOnly (true);
				CKEDITOR.instances.editorConsultingMacedonian.setReadOnly (true);
			}
		
		}

	</script>
</head>
<body>


	<?php echo $header; ?>	
	
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

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
				    <li role="presentation"><a href="#engineering" aria-controls="engineering" role="tab" data-toggle="tab">Engineering</a></li>
				    <li role="presentation"><a href="#system_integration" aria-controls="system_integration" role="tab" data-toggle="tab">System integration</a></li>
				    <li role="presentation"><a href="#consulting" aria-controls="consulting" role="tab" data-toggle="tab">Consulting</a></li>				    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				  	

				  	<!-- Services CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in active tab-container" id="services">
				    	<h3>Enter the content of the services page</h3>

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorServicesEnglish">Services - English</label>
				    		</div>

				    		<div class="form-group">														
								<textarea name="editorServicesEnglish" id="editorServicesEnglish"><?php echo $services_english['services']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorServicesEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorServicesMacedonian">Services - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorServicesMacedonian" id="editorServicesMacedonian"><?php echo $services_macedonian['services']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorServicesMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitServices" id="btnSubmitServices" onclick="update_services_AJAX();" disabled="disabled">Save Services</button>
				    	
				    	<button class="btn btn-default" id="edit-services-content" onclick="enableServicesEdit();">Edit services content</button>

				    </div>
				    <!-- Services CKEditor form end -->


				    <!-- Engineering CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in active tab-container" id="engineering">
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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
				    <div role="tabpanel" class="tab-pane fade in active tab-container" id="system_integration">
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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


				    <!-- Consulting CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in active tab-container" id="consulting">
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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


				  </div>

				</div>

			</div>

		</div>

	</div>


</body>
</html>