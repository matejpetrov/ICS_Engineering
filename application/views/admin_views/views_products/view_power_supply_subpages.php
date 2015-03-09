<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#dc_power_systems" aria-controls="dc_power_systems" role="tab" data-toggle="tab">DC Power Systems</a></li>
    <li role="presentation"><a href="#ups" aria-controls="ups" role="tab" data-toggle="tab">UPS</a></li>
    <li role="presentation"><a href="#monitoring" aria-controls="monitoring" role="tab" data-toggle="tab">Monitoring</a></li>    				    
    <li role="presentation"><a href="#data_center" aria-controls="data_center" role="tab" data-toggle="tab">Data Center</a></li>
</ul>

<div class="tab-content">
	
	<!-- DC Power Systems CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in active tab-container" id="dc_power_systems">
		<h3>Enter the content of the DC power systems page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorDcPowerSystemsEnglish">DC Power Systems - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorDcPowerSystemsEnglish"  id="editorDcPowerSystemsEnglish"><?php echo $dc_power_systems_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorDcPowerSystemsEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorDcPowerSystemsMacedonian">DC Power Systems - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorDcPowerSystemsMacedonian" id="editorDcPowerSystemsMacedonian"><?php echo $dc_power_systems_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorDcPowerSystemsMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnDcPowerSystemsAccess" id="btnDcPowerSystemsAccess" onclick="update_dc_power_systems_AJAX();" disabled="disabled">Save DC power systems</button>
		
		<button class="btn btn-default" id="edit-dc-power-systems-content" onclick="enableDcPowerSystemsEdit();">Edit DC power systems content</button>

	</div>
	<!-- DC Power Systems CKEditor form end -->

	<!-- UPS CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="ups">
		<h3>Enter the content of the ups page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorUpsEnglish">UPS - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorUpsEnglish"  id="editorUpsEnglish"><?php echo $ups_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorUpsEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorUpsMacedonian">UPS - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorUpsMacedonian" id="editorUpsMacedonian"><?php echo $ups_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorUpsMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitUps" id="btnSubmitUps" onclick="update_ups_AJAX();" disabled="disabled">Save UPS</button>
		
		<button class="btn btn-default" id="edit-ups-content" onclick="enableUpsEdit();">Edit ups content</button>

	</div>
	<!-- UPS CKEditor form end -->


	<!-- Monitoring CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="monitoring">
		<h3>Enter the content of the monitoring page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorMonitoringEnglish">Monitoring - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorMonitoringEnglish"  id="editorMonitoringEnglish"><?php echo $monitoring_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorMonitoringEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorMonitoringMacedonian">Monitoring - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorMonitoringMacedonian" id="editorMonitoringMacedonian"><?php echo $monitoring_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorMonitoringMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitMonitoring" id="btnSubmitMonitoring" onclick="update_monitoring_AJAX();" disabled="disabled">Save Monitoring</button>
		
		<button class="btn btn-default" id="edit-monitoring-content" onclick="enableMonitoringEdit();">Edit monitoring content</button>

	</div>
	<!-- Monitoring CKEditor form end -->

	<!-- Data Center CKEditor form begin -->
	<div role="tabpanel" class="tab-pane fade in tab-container" id="data_center">
		<h3>Enter the content of the data center page</h3>

		<form action="" method="POST">
			
			<div class="form-group">
				<label for="editorDataCenterEnglish">Data Center - English</label>
			</div>

			<div class="form-group">														
				<textarea name="editorDataCenterEnglish"  id="editorDataCenterEnglish"><?php echo $data_center_en; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorDataCenterEnglish', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>

			<div class="form-group">
				<label for="editorDataCenterMacedonian">Data Center - Macedonian</label>
			</div>

			<div class="form-group">																
				<textarea name="editorDataCenterMacedonian" id="editorDataCenterMacedonian"><?php echo $data_center_mk; ?></textarea>
			</div>							  					        					       					       
			<?php echo "<script>

			var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
			CKEDITOR.replace( 'editorDataCenterMacedonian', {
				readOnly: true,
				filebrowserBrowseUrl:roxyFileman,
				filebrowserImageBrowseUrl:roxyFileman+'?type=image',
				removeDialogTabs: 'link:upload;image:upload' 
			});



			</script>" ?>
															

		</form>
		<button class="btn btn-primary" name="btnSubmitDataCenter" id="btnSubmitDataCenter" onclick="update_data_center_AJAX();" disabled="disabled">Save Data Center</button>
		
		<button class="btn btn-default" id="edit-data-center-content" onclick="enableDataCenterEdit();">Edit data center content</button>

	</div>
	<!-- Data Center CKEditor form end -->

</div>