<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add new news</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

	<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


	<!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script> -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/add_edit_news_validation.js" type="text/javascript"></script>

	<script type="text/javascript">
		$( document ).ready(function() {			    
			/*$("#file-input").fileinput({'showUpload':false});*/
			$("#file-input").fileinput(
			{
				'showUpload':false, 
				'previewFileType':'image',
				'allowedFileExtensions':['jpg','png','gif']						
			});
		});	
	</script>

</head>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row admin-holder">
			<div class="col-md-12"><h2>Create new news article</h2></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form action="<?php echo base_url(); ?>admin/post_create_new_news" method="POST" enctype="multipart/form-data">				
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											News English
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">

										<div class="form-group has-feedback">
											<label for="news_title_english">Title</label>
											<input class="form-control" name="news_title_english" id="news_title_english" placeholder="Enter news title..." aria-describedby="basic-addon1" />			
											<span class="form-control-feedback"><i id="news-title-english-notification" class='fa'></i></span>											
										</div>	

										<div class="form-group">
											<label for="editorEnglish">News Content</label>
											<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
											<textarea name="editorEnglish" id="editorEnglish"></textarea>
										</div>							  					        					       					       
										<?php echo "<script>

										var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
										CKEDITOR.replace( 'editorEnglish', {
											filebrowserBrowseUrl:roxyFileman,
											filebrowserImageBrowseUrl:roxyFileman+'?type=image',
											removeDialogTabs: 'link:upload;image:upload' 
										});



									</script>" ?>				        
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										News Macedonian
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">

									<div class="form-group has-feedback">
										<label for="news_title_macedonian">Title</label>
										<input class="form-control" name="news_title_macedonian" id="news_title_macedonian" placeholder="Внесете наслов..." aria-describedby="basic-addon2" />
										<span class="form-control-feedback"><i id="news-title-macedonian-notification" class='fa'></i></span>	
									</div>

									<div class="form-group">
										<label for="editorMacedonian">News Content</label>
										<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
										<textarea name="editorMacedonian" id="editorMacedonian"></textarea>
									</div>							  					        					       					       
									<?php echo "<script>

									var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
									CKEDITOR.replace( 'editorMacedonian', {
										filebrowserBrowseUrl:roxyFileman,
										filebrowserImageBrowseUrl:roxyFileman+'?type=image',
										removeDialogTabs: 'link:upload;image:upload' 
									});
								</script>" ?>	
							</div>
						</div>
					</div>		  
				</div>

				<input type="file" name="file-input" size="20" id="file-input" />

				<br/>
				<div id="basic-addon1" role="alert" class="sr-only alert alert-danger">Title (English) must not be empty</div>
				<div id="basic-addon2" role="alert" class="sr-only alert alert-danger">Title (Macedonian) must not be empty</div>
				<div id="basic-addon3" role="alert" class="sr-only alert alert-danger">Content (English) must not be empty</div>
				<div id="basic-addon4" role="alert" class="sr-only alert alert-danger">Content (Macedonian) must not be empty</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>        
<div style="height:100px;"></div>
</body>
</html>
