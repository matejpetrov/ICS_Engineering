<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#fixed_access" aria-controls="fixed_access" role="tab" data-toggle="tab">Fixed access</a></li>
    <li role="presentation"><a href="#transport" aria-controls="transport" role="tab" data-toggle="tab">Transport</a></li>
    <li role="presentation"><a href="#solutions" aria-controls="solutions" role="tab" data-toggle="tab">Solutions</a></li>    				    
</ul>

<div class="tab-content">
	
	<!-- Fixed access CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in active tab-container" id="fixed_access">
		<h3>Enter the content of the fixed access page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorFixedAccessEnglish">Fixed access - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorFixedAccessEnglish"  id="editorFixedAccessEnglish"><?php echo $fixed_access_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorFixedAccessEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorFixedAccessMacedonian">Fixed access - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorFixedAccessMacedonian" id="editorFixedAccessMacedonian"><?php echo $fixed_access_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorFixedAccessMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitFixedAccess" data-loading-text="Saving..." id="btnSubmitFixedAccess" onclick="update_fixed_access_AJAX();" disabled="disabled">Save Fixed access</button>
		
		<button class="btn btn-default" id="edit-fixed-access-content" onclick="enableFixedAccessEdit();">Edit fixed access content</button>

	</div>
	<!-- Fixed access CKEditor form end -->

	<!-- Transport CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="transport">
		<h3>Enter the content of the fixed access page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorTransportEnglish">Transport - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorTransportEnglish"  id="editorTransportEnglish"><?php echo $transport_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorTransportEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorTransportMacedonian">Transport - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorTransportMacedonian" id="editorTransportMacedonian"><?php echo $transport_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorTransportMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitTransport" data-loading-text="Saving..." id="btnSubmitTransport" onclick="update_transport_AJAX();" disabled="disabled">Save Transport</button>
		
		<button class="btn btn-default" id="edit-transport-content" onclick="enableTransportEdit();">Edit transport content</button>

	</div>
	<!-- Transport CKEditor form end -->


	<!-- Solutions CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="solutions">
		<h3>Enter the content of the solutions page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorSolutionsEnglish">Solutions - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorSolutionsEnglish"  id="editorSolutionsEnglish"><?php echo $solutions_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorSolutionsEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorSolutionsMacedonian">Solutions - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorSolutionsMacedonian" id="editorSolutionsMacedonian"><?php echo $solutions_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorSolutionsMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitSolutions" data-loading-text="Saving..." id="btnSubmitSolutions" onclick="update_solutions_AJAX();" disabled="disabled">Save Solutions</button>
		
		<button class="btn btn-default" id="edit-solutions-content" onclick="enableSolutionsEdit();">Edit solutions content</button>

	</div>
	<!-- Solutions CKEditor form end -->

</div>