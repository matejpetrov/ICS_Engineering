
<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#about_us_subpage" aria-controls="about_us_subpage" role="tab" data-toggle="tab">About us</a></li>
    <li role="presentation"><a href="#telecommunication" aria-controls="telecommunication" role="tab" data-toggle="tab">Telecommunication</a></li>
    <li role="presentation"><a href="#power-supply" aria-controls="power-supply" role="tab" data-toggle="tab">Power supply</a></li>
    <li role="presentation"><a href="#audio-video" aria-controls="audio-video" role="tab" data-toggle="tab">Audio/Video</a></li>
    <li role="presentation"><a href="#defence-security" aria-controls="defence-security" role="tab" data-toggle="tab">Defence and Security</a></li>						    
</ul>


<div class="tab-content">
	

	<!-- About us CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in active tab-container" id="about_us_subpage">
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



	<!-- Telecommunication CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="telecommunication">
		<h3>Enter the content of the telecommunication page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorTelecommunicationEnglish">Telecommunication - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorTelecommunicationEnglish" id="editorTelecommunicationEnglish"><?php echo $about_us_english['telecommunication']; ?></textarea>
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
				<label for="editorTelecommunicationMacedonian">Telecommunication - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorTelecommunicationMacedonian" id="editorTelecommunicationMacedonian"><?php echo $about_us_macedonian['telecommunication']; ?></textarea>
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
				<label for="editorPowerSupplyEnglish">Power Supply - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorPowerSupplyEnglish" id="editorPowerSupplyEnglish"><?php echo $about_us_english['power-supply']; ?></textarea>
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
				<label for="editorPowerSupplyMacedonian">Power Supply - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorPowerSupplyMacedonian" id="editorPowerSupplyMacedonian"><?php echo $about_us_macedonian['power-supply']; ?></textarea>
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
				<label for="editorAudioVideoEnglish">Audio/Video - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorAudioVideoEnglish" id="editorAudioVideoEnglish"><?php echo $about_us_english['audio-video']; ?></textarea>
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
				<label for="editorAudioVideoMacedonian">Audio/Video - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorAudioVideoMacedonian" id="editorAudioVideoMacedonian"><?php echo $about_us_macedonian['audio-video']; ?></textarea>
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
				<label for="editorDefenceSecurityEnglish">Defence/Security - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorDefenceSecurityEnglish" id="editorDefenceSecurityEnglish"><?php echo $about_us_english['defence-security']; ?></textarea>
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
				<label for="editorDefenceSecurityMacedonian">Defence/Security - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorDefenceSecurityMacedonian" id="editorDefenceSecurityMacedonian"><?php echo $about_us_macedonian['defence-security']; ?></textarea>
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
		
		<button class="btn btn-primary" name="btnSubmitDefenceSecurity" id="btnSubmitDefenceSecurity" onclick="update_defence_security_AJAX();" disabled="disabled">Save Defence/Security</button>
		
		<button class="btn btn-default" id="edit-defence-security-content" onclick="enableDefenceSecurityEdit();">Edit defence/security content</button>

	</div>
	<!-- Defence Security CKEditor form end -->

</div>
