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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slider_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>
</head>
<body>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin">
			<h2>Manage Homepage Slider Images</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div>
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
					<!-- Vo ovoj div stavi go toa za upload otvori ja stranata kje sfatis :D -->
					<span class="image-add" >
						<div class="add-fix">
							<div class="add-icon">
								<i class="fa fa-plus add"></i>
							</div>
						</div>
					</div>
				</span>
				<!-- Do tuka :D -->
			</div>
		</div>
	</div>
</div>
</body>
</html>