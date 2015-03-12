<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#audio_conference" aria-controls="audio_conference" role="tab" data-toggle="tab">Audio conference</a></li>
    <li role="presentation"><a href="#court_recording_systems" aria-controls="court_recording_systems" role="tab" data-toggle="tab">Court recording systems</a></li>    
</ul>

<div class="tab-content">
	

	<!-- Audio Conference CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in active tab-container" id="audio_conference">
		<h3>Enter the content of the audio conference page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorAudioConferenceEnglish">Audio Conference - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorAudioConferenceEnglish"  id="editorAudioConferenceEnglish"><?php echo $audio_conference_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorAudioConferenceEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorAudioConferenceMacedonian">Audio Conference - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorAudioConferenceMacedonian" id="editorAudioConferenceMacedonian"><?php echo $audio_conference_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorAudioConferenceMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitAudioConference" data-loading-text="Saving..." id="btnSubmitAudioConference" onclick="update_audio_conference_AJAX();" disabled="disabled">Save Audio Conference</button>
		
		<button class="btn btn-default" id="edit-audio-conference-content" onclick="enableAudioConferenceEdit();">Edit audio conference content</button>

	</div>
	<!-- UPS CKEditor form end -->

	<!-- Court recording systems CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="court_recording_systems">
		<h3>Enter the content of the court recording systems page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorCourtRecordingSystemsEnglish">Court recording systems - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorCourtRecordingSystemsEnglish"  id="editorCourtRecordingSystemsEnglish"><?php echo $court_recording_systems_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorCourtRecordingSystemsEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorCourtRecordingSystemsMacedonian">Court recording systems - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorCourtRecordingSystemsMacedonian" id="editorCourtRecordingSystemsMacedonian"><?php echo $court_recording_systems_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorCourtRecordingSystemsMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitCourtRecordingSystems" data-loading-text="Saving..." id="btnSubmitCourtRecordingSystems" onclick="update_court_recording_system_AJAX();" disabled="disabled">Save Court recording systems</button>
		
		<button class="btn btn-default" id="edit-court-recording-systems-content" onclick="enableCourtRecordingSystemsEdit();">Edit court recording systems content</button>

	</div>
	<!-- Court recording systems CKEditor form end -->


</div>