<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Edit about us static pages</title>
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/about_us_subpages_AJAX.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>


	<style type="text/css">

		.about-us-title{

			text-align: center;
			margin-bottom: 50px;

		}

		.tab-container{

			padding-top: 25px;

		}

		#edit-about-us-content, #edit-mission-content, #edit-partners-content{
			
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

</head>
<body>

	<?php echo $header; ?>	
	
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
	<input type="hidden" id="page" value="about us" />

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
				    <li role="presentation"><a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">Mission&Vision</a></li>				    				    
				    <li role="presentation"><a href="#partners" aria-controls="partners" role="tab" data-toggle="tab">Partners</a></li>
				    <li role="presentation"><a href="#corporate_info" aria-controls="corporate_info" role="tab" data-toggle="tab">Company Information</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    
				  	<div role="tabpanel" class="tab-pane fade in active tab-container" id="about_us">

				  		<?php echo $about_us_subpages; ?>

				  	</div>

				    <!-- Mission and Vision CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="mission">
						
						<h3>Enter the content of the mission/vision page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorMissionEnglish">About us (Mission&Vision) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorMissionEnglish" id="editorMissionEnglish"><?php echo $about_us_english['mission']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorMissionEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorMissionMacedonian">About us (Mission&Vision) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorMissionMacedonian" id="editorMissionMacedonian"><?php echo $about_us_macedonian['mission']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorMissionMacedonian', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitMission" data-loading-text="Saving..." id="btnSubmitMission" onclick="update_mission_AJAX();" disabled="disabled">Save Mission/Vision</button>
				    	<button class="btn btn-default" id="edit-mission-content" onclick="enableMissionEdit();">Edit mission/vision content</button>

				    </div>
				    <!-- Mission and Vision CKEditor form end -->				   				   


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
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>				    		

				    	</form>
						<button class="btn btn-primary" name="btnSubmitPartners" data-loading-text="Saving..." id="btnSubmitPartners" onclick="update_partners_AJAX();" disabled="disabled">Save Partners</button>
				    	<button class="btn btn-default" id="edit-partners-content" onclick="enablePartnersEdit();">Edit partners content</button>

				    </div>
				    <!-- Partners CKEditor form end -->

				    <!-- Corporate Info CKEditor form begin -->
				    <div role="tabpanel" class="tab-pane fade tab-container" id="corporate_info">
				    	
				    	<h3>Enter the content of the company information page</h3>						

				    	<form action="" method="POST">
				    		
				    		<div class="form-group">
				    			<label for="editorCorporateInfoEnglish">About us (Company Information) - English</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorCorporateInfoEnglish" id="editorCorporateInfoEnglish"><?php echo $about_us_english['corporate_info']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorCorporateInfoEnglish', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

							<div class="form-group">
				    			<label for="editorCorporateInfoMacedonian">About us (Company Information) - Macedonian</label>
				    		</div>

				    		<div class="form-group">																
								<textarea name="editorCorporateInfoMacedonian" id="editorCorporateInfoMacedonian"><?php echo $about_us_macedonian['corporate_info']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorCorporateInfoMacedonian', {
								readOnly: true,
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});



							</script>" ?>

				    		<!-- <input type="submit" name="btnSubmitCorporateInfo" id="btnSubmitCorporateInfo" value="Save Company Information" class="btn btn-primary" disabled="disabled"/> -->							

				    	</form>
				    	<button class="btn btn-primary" name="btnSubmitCorporateInfo" data-loading-text="Saving..." id="btnSubmitCorporateInfo" onclick="update_corporate_info_AJAX();" disabled="disabled">Save company information</button>
				    	<button class="btn btn-default" id="edit-corporate-info-content" onclick="enableCorporateInfoEdit();">Edit company information content</button>

				    </div>
				    <!-- Corporate Info CKEditor form end -->



				  </div>

				</div>
				
			</div>

		</div>

	</div>
<div style="height:100px;"></div>
</body>
</html>