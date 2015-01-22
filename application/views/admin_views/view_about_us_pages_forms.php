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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/about_us_pages_AJAX.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>


	<style type="text/css">

		.about-us-title{

			text-align: center;
			margin-bottom: 50px;

		}

		.tab-container{

			padding-top: 25px;

		}

		#edit-about-us-content, #edit-mission-content, #edit-vision-content, #edit-structure-content, #edit-partners-content{
			
			position: relative;
			left: 10px;
			top: -1px;

		}

		#edit-corporate-info-content{
			position: relative;
			left: 15px;
			top: -1px;			
		}

	</style>

	<script type="text/javascript">

		function enableAboutUsEdit(){

			var btnText = $("#edit-about-us-content").html();
			var isEnabled = $("#btnSubmitAboutUs").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitAboutUs").prop("disabled", false);				
				$("#edit-about-us-content").html("Cancel");
				CKEDITOR.instances.editorAboutUsEnglish.setReadOnly (false);
				CKEDITOR.instances.editorAboutUsMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitAboutUs").prop("disabled", true);				
				$("#edit-about-us-content").html("Edit about us content");
				CKEDITOR.instances.editorAboutUsEnglish.setReadOnly (true);
				CKEDITOR.instances.editorAboutUsMacedonian.setReadOnly (true);
			}

		}


		function enableMissionEdit(){

			var btnText = $("#edit-mission-content").html();
			var isEnabled = $("#btnSubmitMission").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitMission").prop("disabled", false);				
				$("#edit-mission-content").html("Cancel");
				CKEDITOR.instances.editorMissionEnglish.setReadOnly (false);
				CKEDITOR.instances.editorMissionMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitMission").prop("disabled", true);				
				$("#edit-mission-content").html("Edit mission content");				
				CKEDITOR.instances.editorMissionEnglish.setReadOnly (true);
				CKEDITOR.instances.editorMissionMacedonian.setReadOnly (true);
			}

		}

		function enableVisionEdit(){

			var btnText = $("#edit-vision-content").html();
			var isEnabled = $("#btnSubmitVision").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitVision").prop("disabled", false);				
				$("#edit-vision-content").html("Cancel");
				CKEDITOR.instances.editorVisionEnglish.setReadOnly (false);
				CKEDITOR.instances.editorVisionMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitVision").prop("disabled", true);				
				$("#edit-vision-content").html("Edit vision content");				
				CKEDITOR.instances.editorVisionEnglish.setReadOnly (true);
				CKEDITOR.instances.editorVisionMacedonian.setReadOnly (true);
			}
		
		}

		function enableStructureEdit(){

			var btnText = $("#edit-structure-content").html();
			var isEnabled = $("#btnSubmitStructure").prop("disabled");

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitStructure").prop("disabled", false);				
				$("#edit-structure-content").html("Cancel");
				CKEDITOR.instances.editorStructureEnglish.setReadOnly (false);
				CKEDITOR.instances.editorStructureMacedonian.setReadOnly (false);			
			}
			else{
				$("#btnSubmitStructure").prop("disabled", true);				
				$("#edit-structure-content").html("Edit structure content");				
				CKEDITOR.instances.editorStructureEnglish.setReadOnly (true);
				CKEDITOR.instances.editorStructureMacedonian.setReadOnly (true);
			}
		}		

		function enablePartnersEdit(){

			var btnText = $("#edit-partners-content").html();
			var isEnabled = $("#btnSubmitPartners").prop("disabled");			

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitPartners").prop("disabled", false);				
				$("#edit-partners-content").html("Cancel");
				CKEDITOR.instances.editorPartnersEnglish.setReadOnly (false);
				CKEDITOR.instances.editorPartnersMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitPartners").prop("disabled", true);				
				$("#edit-partners-content").html("Edit partners content");				
				CKEDITOR.instances.editorPartnersEnglish.setReadOnly (true);
				CKEDITOR.instances.editorPartnersMacedonian.setReadOnly (true);
			}

		}

		function enableCorporateInfoEdit(){

			var btnText = $("#edit-corporate-info-content").html();
			var isEnabled = $("#btnSubmitCorporateInfo").prop("disabled");			

			if(isEnabled && btnText != "Cancel"){
				$("#btnSubmitCorporateInfo").prop("disabled", false);				
				$("#edit-corporate-info-content").html("Cancel");
				CKEDITOR.instances.editorCorporateInfoEnglish.setReadOnly (false);
				CKEDITOR.instances.editorCorporateInfoMacedonian.setReadOnly (false);
			}
			else{
				$("#btnSubmitCorporateInfo").prop("disabled", true);				
				$("#edit-corporate-info-content").html("Edit corporate info content");				
				CKEDITOR.instances.editorCorporateInfoEnglish.setReadOnly (true);
				CKEDITOR.instances.editorCorporateInfoMacedonian.setReadOnly (true);
			}

		}

	</script>


</head>
<body>

	<?php echo $header; ?>	
	
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

	<div class="success"></div>

	<div class="container">

		<div class="row about-us-title">			
			<h2>Select the tab and edit the content</h2>
		</div>

		<div class="row">
			
			<div class="col-md-10 col-md-offset-1">
				
				<div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs nav-justified" role="tablist">
				    <li role="presentation" class="active"><a href="#about_us" aria-controls="about_us" role="tab" data-toggle="tab">About us</a></li>
				    <li role="presentation"><a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">Mission</a></li>
				    <li role="presentation"><a href="#vision" aria-controls="vision" role="tab" data-toggle="tab">Vision</a></li>
				    <li role="presentation"><a href="#structure" aria-controls="structure" role="tab" data-toggle="tab">Structure</a></li>
				    <li role="presentation"><a href="#partners" aria-controls="partners" role="tab" data-toggle="tab">Partners</a></li>
				    <li role="presentation"><a href="#corporate_info" aria-controls="corporate_info" role="tab" data-toggle="tab">Corporate info</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    
				  	<!-- About us CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade in active tab-container" id="about_us">
				    	<h3>Enter the content of the about us page</h3>

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorAboutUsEnglish">About us - English</label>
				    		</div>

				    		<div class="form-group">														
								<textarea name="editorAboutUsEnglish" id="editorAboutUsEnglish"><?php echo $about_us_english['about_us']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorAboutUsEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorAboutUsMacedonian">About us - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorAboutUsMacedonian" id="editorAboutUsMacedonian"><?php echo $about_us_macedonian['about_us']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorAboutUsMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>
																			

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitAboutUs" id="btnSubmitAboutUs" onclick="update_about_us_AJAX();" disabled="disabled">Save About us</button>
				    	
				    	<button class="btn btn-default" id="edit-about-us-content" onclick="enableAboutUsEdit();">Edit about us content</button>

				    </div>
				    <!-- About us CKEditor form end -->

				    <!-- Mission CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="mission">
						
						<h3>Enter the content of the mission page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorMissionEnglish">About us (Mission) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorMissionEnglish" id="editorMissionEnglish"><?php echo $about_us_english['mission']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorMissionEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorMissionMacedonian">About us (Mission) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorMissionMacedonian" id="editorMissionMacedonian"><?php echo $about_us_macedonian['mission']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorMissionMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>s				    		

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitMission" id="btnSubmitMission" onclick="update_mission_AJAX();" disabled="disabled">Save Mission</button>
				    	<button class="btn btn-default" id="edit-mission-content" onclick="enableMissionEdit();">Edit mission content</button>

				    </div>
				    <!-- Mission CKEditor form end -->

				    <!-- Vision CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="vision">
				    	
				    	<h3>Enter the content of the vision page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorVisionEnglish">About us (Vision) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorVisionEnglish" id="editorVisionEnglish"><?php echo $about_us_english['vision']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorVisionEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorVisionMacedonian">About us (Vision) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorVisionMacedonian" id="editorVisionMacedonian"><?php echo $about_us_macedonian['vision']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorVisionMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

				    		<!-- <input type="submit" name="btnSubmitVision" id="btnSubmitVision" value="Save Vision" class="btn btn-primary" disabled="disabled"/>							 -->

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitVision" id="btnSubmitVision" onclick="update_vision_AJAX();" disabled="disabled">Save Vision</button>
				    	<button class="btn btn-default" id="edit-vision-content" onclick="enableVisionEdit();">Edit vision content</button>

				    </div>
				    <!-- Vision CKEditor form end -->

				    <!-- Structure CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="structure">
				    	
				    	<h3>Enter the content of the structure page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorStructureEnglish">About us (Structure) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorStructureEnglish" id="editorStructureEnglish"><?php echo $about_us_english['structure']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorStructureEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorStructureMacedonian">About us (Structure) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorStructureMacedonian" id="editorStructureMacedonian"><?php echo $about_us_macedonian['structure']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorStructureMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>				    		

				    	</form>
						<button class="btn btn-primary" name="btnSubmitStructure" id="btnSubmitStructure" onclick="update_structure_AJAX();" disabled="disabled">Save Structure</button>
				    	<button class="btn btn-default" id="edit-structure-content" onclick="enableStructureEdit();">Edit structure content</button>

				    </div>
				    <!-- Structure CKEditor form end -->


				    <!-- Partners CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="partners">
				    	
				    	<h3>Enter the content of the partners page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorPartnersEnglish">About us (Partners) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorPartnersEnglish" id="editorPartnersEnglish"><?php echo $about_us_english['partners']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorPartnersEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorPartnersMacedonian">About us (Partners) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorPartnersMacedonian" id="editorPartnersMacedonian"><?php echo $about_us_macedonian['partners']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorPartnersMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>				    		

				    	</form>
						<button class="btn btn-primary" name="btnSubmitPartners" id="btnSubmitPartners" onclick="update_partners_AJAX();" disabled="disabled">Save Partners</button>
				    	<button class="btn btn-default" id="edit-partners-content" onclick="enablePartnersEdit();">Edit partners content</button>

				    </div>
				    <!-- Partners CKEditor form end -->

				    <!-- Corporate Info CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="corporate_info">
				    	
				    	<h3>Enter the content of the corporate info page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorCorporateInfoEnglish">About us (Corporate info) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorCorporateInfoEnglish" id="editorCorporateInfoEnglish"><?php echo $about_us_english['corporate_info']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorCorporateInfoEnglish', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorCorporateInfoMacedonian">About us (Corporate info) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorCorporateInfoMacedonian" id="editorCorporateInfoMacedonian"><?php echo $about_us_macedonian['corporate_info']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorCorporateInfoMacedonian', {
								readOnly: true,
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

				    		<!-- <input type="submit" name="btnSubmitCorporateInfo" id="btnSubmitCorporateInfo" value="Save Corporate info" class="btn btn-primary" disabled="disabled"/> -->							

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitCorporateInfo" id="btnSubmitCorporateInfo" onclick="update_corporate_info_AJAX();" disabled="disabled">Save Corporate Info</button>
				    	<button class="btn btn-default" id="edit-corporate-info-content" onclick="enableCorporateInfoEdit();">Edit corporate info content</button>

				    </div>
				    <!-- Corporate Info CKEditor form end -->



				  </div>

				</div>

				<a href="<?php echo base_url(); ?>staticPagesAdminController/edit_static_pages_info"> &lt&lt BACK</a>

			</div>

		</div>

	</div>

</body>
</html>