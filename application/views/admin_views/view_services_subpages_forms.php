<ul class="nav nav-pills nav-justified" role="tablist">
	<li role="presentation" class="active"><a href="#services_subpages" aria-controls="services_subpages" role="tab" data-toggle="tab">Services</a></li>
	<li role="presentation"><a href="#engineering" aria-controls="engineering" role="tab" data-toggle="tab">Engineering</a></li>
	<li role="presentation"><a href="#system_integration" aria-controls="system_integration" role="tab" data-toggle="tab">System integration</a></li>
	<li role="presentation"><a href="#consulting" aria-controls="consulting" role="tab" data-toggle="tab">Consulting</a></li>				    
 </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  	

  	<!-- Services CKEditor form begin -->
    <div role="tabpanel" class="tab-pane fade in active tab-container" id="services_subpages">
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