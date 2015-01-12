<!DOCTYPE html>
<html>
	 <head>
        <meta charset="utf-8">
        <title>Temporary view</title>
        <!-- <script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script> -->
        <!-- <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script> -->
        <!-- <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> -->

        

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />		
		<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


		<!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>

		<script type="text/javascript">
			$( document ).ready(function() {			    
				/*$("#file-input").fileinput({'showUpload':false});*/
				$("#uploadFile").fileinput(
					{
						'showUpload':false, 
						'previewFileType':'image',
						'allowedFileExtensions':['jpg','png','gif'],
						'maxFileUpload':2
					});
			});			
		</script>

	</head>
	<body>

		<p><?php var_dump($image); ?></p>
		<p><?php echo $errors; ?></p>

		<p><?php echo $json; ?></p>
		<p><?php echo $upload_path; ?></p>

		<form action="<?php echo base_url(); ?>welcome/image_upload" method="POST" enctype="multipart/form-data">
			
			<div class="col-md-4">
				<input type="file" name="uploadFile[]" size="20" id="uploadFile" multiple="true" />
			</div>

			<input type="submit" value="Submit" class="btn btn-primary" />

		</form>

	</body>
</html>