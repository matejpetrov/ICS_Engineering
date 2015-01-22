<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<title>Edit news</title>
	<!-- <script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script> -->
	<!-- <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script> -->
	<!-- <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />		
	<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

	<!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script> -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		$( document ).ready(function() {			    

			var url = window.location.href;
			var url_split = url.split("/");
			var length = url_split.length;
			var id = url_split[length-1];

			$("#file-input").fileinput(
			{
				'uploadUrl':'http://localhost/ICS_Engineering/admin/edit_news_image/'+id,
				'previewFileType':'image',			
				'allowedFileExtensions':['jpg','png','gif']
			});

			$('#file-input').on('fileuploaded', function(event, data) {
				$('#myModal').modal('hide');				    
				var news_image_url = data.response.news_image_url;
				$('#news_image').attr("src", news_image_url);
				console.log('File uploaded triggered');
			});
		});	
	</script>


</head>
<body>

	<?php 
	$news_english = array();
	$news_macedonian = array();

	if($news[0]['lang'] == 0){
		$news_english = $news[0];
		$news_macedonian = $news[1];
	}
	else{
		$news_english = $news[1];
		$news_macedonian = $news[0];
	}	

	$news_image_url = $news_english['news_image_url'];
	echo $header;
	?>

	<div class="container">			
		<div class="row admin-holder">
			<div class="col-md-12"><h2>Edit news article</h2></div>
		</div>
		<form action="<?php echo base_url(); ?>admin/post_edit_news" method="POST">
			<div class="row">
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
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
								
								<div class="form-group">
									<label for="news_title_english">Title</label>
									<input class="form-control" name="news_title_english" placeholder="Enter news title..."  value="<?php echo $news_english['title']; ?>" />								
								</div>	

								<div class="form-group">
									<label for="editorEnglish">News Content</label>
									<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
									<textarea name="editorEnglish" id="editorEnglish"><?php echo $news_english['content']; ?></textarea>
								</div>							  					        					       					       
								<?php echo "<script>

								var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
								CKEDITOR.replace( 'editorEnglish', {
									skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
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

							<div class="form-group">
								<label for="news_title_macedonian">Title</label>
								<input class="form-control" name="news_title_macedonian" placeholder="Enter news title..." 
								value="<?php echo $news_macedonian['title']; ?>" />								
							</div>

							<div class="form-group">
								<label for="editorMacedonian">News Content</label>
								<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
								<textarea name="editorMacedonian" id="editorMacedonian"><?php echo $news_macedonian['content']; ?></textarea>
							</div>							  					        					       					       
							<?php echo "<script>

							var roxyFileman ='" . base_url() .  "assets/RoxyFileman/index.html';
							CKEDITOR.replace( 'editorMacedonian', {
								skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/',
								filebrowserBrowseUrl:roxyFileman,
								filebrowserImageBrowseUrl:roxyFileman+'?type=image',
								removeDialogTabs: 'link:upload;image:upload' 
							});
						</script>" ?>	
					</div>
				</div>
			</div>		  
		</div>																		
	</div>

	<div class="row">
		<div class="col-md-12 news-image-holder">
			<img src="<?php echo $news_image_url; ?>" alt="No image yet" class="" id="news_image" />	
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" style="text-align:center;">
			<button type="submit" class="btn btn-default" name="btn-save">Save changes</button>
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
				Edit news image
			</button>
			<button type="submit" class="btn btn-default" name="btn-cancel">Cancel</button>
		</div>
	</div>
</form>


</div>    
<div style="height:100px;"></div>





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<input type="file" name="file-input" size="20" id="file-input" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>	        
			</div>
		</div>
	</div>
</div>


</body>    
</html>
