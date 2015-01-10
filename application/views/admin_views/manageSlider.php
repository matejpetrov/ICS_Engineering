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

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_login.js"></script>
</head>
<body>
	<div class="container">
		<div class="row admin">
			<h2>Manage Homepage Slider Images</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<table class="table table-bordered">
					<thead></thead>
					<?php foreach ($images->result() as $image) { ?>
					<tr>
						<td>
							<img src="<?php echo base_url().$image->image_url; ?>" style="height: 100px;width: 250px;" />
						</td>
						<td>
							<a href="<?php echo base_url(). "admin/deleteImageInSlider/" . $image->id;?>" class="btn btn-danger" >Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
				
				
				
			</div>
		</div>
	</div>
</body>
</html>