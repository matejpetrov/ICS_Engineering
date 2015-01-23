<!DOCTYPE html>
<html>
<head>
	<title>Error!</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<!--///////////////////////////   Styles   ///////////////////////////-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

	<!--///////////////////////////   Scripts   ///////////////////////////-->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_login.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

</head>
<body>
	<?php echo $header; ?>
	<div style="padding: 3% 0 0;">

		<div class="container" >
			<div class="row">
				<div class="col-xs-12" style="text-align:center;">
					<i class="fa fa-minus-circle" style="font-size:20em; color:#E60000;"></i>
				</div>
				<div class="col-xs-12" style="text-align:center;">
					<h1>You dont have permission to view this page!!!</h1>
				</div>
				<div class="col-xs-12" style="text-align:center;">
					<a href="<?php echo base_url(); ?>admin" class="btn btn-success">Go Back</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>