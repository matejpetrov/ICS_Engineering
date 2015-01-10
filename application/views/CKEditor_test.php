<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CKEditor</title>
        <script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script>
        <!-- <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script> -->
        <!-- <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> -->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
		<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

    </head>
    <body>

		<div class="container">
			
			<div class="row">
				<form action="welcome/ck_editor" method="POST">
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
								<label for="title">Title</label>
								<input class="form-control" name="news_title_english" placeholder="Enter news title..." />								
							</div>	

							  <div class="form-group">
							    <label for="editor1">News Content</label>
							    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
							    <textarea name="editor1" id="editor1" class="form-control"></textarea>
							  </div>							  					        					       					       
					        <?php echo "<script>

					            CKEDITOR.replace( 'editor1', {
								    skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/' 
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
								<label for="title">Title</label>
								<input class="form-control" name="news_title_english" placeholder="Enter news title..." />								
							</div>

					        <div class="form-group">
							    <label for="editor1">News Content</label>
							    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
							    <textarea name="editor2" id="editor1" class="form-control"></textarea>
							  </div>							  					        					       					       
					        <?php echo "<script>

					            CKEDITOR.replace( 'editor2', {
								    skin : 'bootstrapck," . base_url() . "assets/skins/bootstrapck/' 
								});
					        </script>" ?>	
					      </div>
					    </div>
					  </div>		  
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>

		</div>        

    </body>
</html>
