<!DOCTYPE html>
<html>
<head>
	<title>Manage Homepage Slider</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>
	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link href="<?php echo base_url(); ?>assets/css/fileUploader/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/fileUploader/fileinput.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slider_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>

<<<<<<< HEAD
=======

	<style type="text/css">

		#add_image_btn{
			background-color: transparent;
            background-repeat: no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
		}
		#add_image_btn:focus{			
            outline: none;
		}
	</style>

	<script type="text/javascript">
		
		$( document ).ready(function() {			    

			$("#file-input").fileinput(
			{
				'uploadUrl':'http://localhost/ICS_Engineering/admin/add_slider_images',
				'previewFileType':'image',
				'allowedFileExtensions':['jpg','png','gif'],
				'maxFileCount':3
			});

			$('#file-input').on('fileuploaded', function(event, data) {
			    $('#modalAddImages').modal('hide');		    
			    var json = data.response;
			    var append_text = "The JSON object is: " + json;
			    			    			    
			    $.each(json, function(index,jsonObject){
			    	new_image_url = jsonObject.new_image_url;
			    	new_image_id = jsonObject.new_image_id;
				    $('#slider-images-container').append(					
						'<span class="image-holder" ><img src="'+new_image_url+'" style="height: 100px;width: 240px;" /><div class="fix"><div class="icon-cancel"><i class="fa fa-times fa-2x" style="height: 20px;width: 25px;" ></i></div><div id="'+new_image_id+'" class="icon"><i class="fa fa-trash-o fa-2x" style="height: 20px;width: 25px;" ></i></div><div class="over" ></div></div></span>'
				    );				    
				});
			    console.log('File uploaded triggered');
			});
		});	

	</script>

>>>>>>> origin/master
</head>
<body>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin">
			<h2>Manage Homepage Slider Images</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="slider-images-container">
					<?php foreach ($images->result() as $image) { ?>
					<span class="image-holder" >
						<img src="<?php echo base_url().$image->image_url; ?>" style="height: 100px;width: 240px;" />
						<div class="fix">
							<div class="icon-cancel">
								<i class="fa fa-times fa-2x" style="height: 20px;width: 25px;" ></i>
							</div>
							<div id="<?php echo $image->id; ?>" class="icon">
								<i class="fa fa-trash-o fa-2x" style="height: 20px;width: 25px;" ></i>
							</div>
							<div class="over" >
							</div>
						</div>
					</span>
					<?php } ?>

				</div>
				<div>
					<!-- Vo ovoj div stavi go toa za upload otvori ja stranata kje sfatis :D -->
					<button type="button" id="add_image_btn" data-toggle="modal" data-target="#modalAddImages">					
						<span class="image-add" >
							<div class="add-fix">
								<div class="add-icon">
									<i class="fa fa-plus add"></i>
								</div>
							</div>
						</div>
					</span>
				</button>
				
				<!-- Do tuka :D -->
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<input type="file" name="file-input[]" size="20" id="file-input" multiple="true" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>	        
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->


</body>
</html>