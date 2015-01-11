<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CKEditor</title>
        <!-- <script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script> -->
        <!-- <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script> -->
        <!-- <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> -->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/CKEditor/ckeditor.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
		<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

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

		 ?>

		<div class="container">			
			<div class="row">
				<form action="<?php echo base_url(); ?>admin/post_edit_news" method="POST">
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

					        	var roxyFileman ='assets/RoxyFileman/index.html'; 
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

					            var roxyFileman ='assets/RoxyFileman/index.html'; 
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
					<button type="submit" class="btn btn-default" name="btn-save">Save changes</button>
					<button type="submit" class="btn btn-default" name="btn-cancel">Cancel</button>
				</form>
			</div>

		</div>        

    </body>
</html>
