<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/words_manage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-min.js"></script>
</head>
<body>
	<?php echo $header; ?>
	<div class="container">
		<input id="base_url" type="hidden" value="<?php echo base_url(); ?>" >
		<div class="row admin-holder">
			<h2>Manage Homepage Slider Words</h2>
		</div>
		<div class="row">
			<div class="col-md-6 words-language">
				<h4>Words English</h4>
				<ul id="en" class="words">
					<?php foreach ($english->result() as $en) {?>
					<li><input class="en" type="checkbox" value="<?php echo $en->id; ?>" /> <?php echo $en->word; ?></li>
					<?php } ?>
				</ul>
				<input type="button" id="" class="btn btn-primary" value="Add New Words" data-toggle="modal" data-target="#modal-en"/>
				<input type="button" id="delete-en" class="btn btn-danger" value="Delete Selected"/>
			</div>
			<div class="col-md-6 words-language">
				<h4>Words Macedonian</h4>
				<ul id="mk" class="words">
					<?php foreach ($macedonian->result() as $mk) {?>
					<li><input class="mk" type="checkbox" value="<?php echo $mk->id; ?>" /> <?php echo $mk->word; ?></li>
					<?php } ?>
				</ul>
				<input type="button" id="" class="btn btn-primary" value="Add New Words" data-toggle="modal" data-target="#modal-mk"/>
				<input type="button" id="delete-mk" class="btn btn-danger" value="Delete Selected"/>
			</div>
		</div>
	</div>

	<!-- Modal -->

	<!-- English -->
	<div id="modal-en" class="modal fade add-words-en" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<h3>Add new English words</h3>
				<h5>Input multiple words separeted by newline</h5>
				<textarea id="words"></textarea>
				<div class="modal-buttons">
					<input type="button" id="add-en" class="btn btn-success" value="Add Words"/>
					<input type="button" id="" class="btn btn-danger" value="Cancel" data-dismiss="modal" />
				</div>
			</div>
		</div>
	</div>
	<!-- English End -->

	<!-- Macedonian -->
	<div id="modal-mk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<h3>Add new Macedonian words</h3>
				<h5>Input multiple words separeted by newline</h5>
				<textarea id="words"></textarea>
				<div class="modal-buttons">
					<input type="button" id="add-mk" class="btn btn-success" value="Add Words"/>
					<input type="button" id="" class="btn btn-danger" value="Cancel" data-dismiss="modal" />
				</div>
			</div>
		</div>
	</div>
	<!-- Macedonian End -->
	<!-- End Modal -->
</body>
</html>

