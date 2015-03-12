<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<title>Manage news articles</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/all_news_manage.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

	<style type="text/css">

		.thead{
			border-bottom: solid 3px gray;
		}

	</style>		

</head>

<body class="list-body">
	<?php echo $header; ?>
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
	<div class="container">
		<div class="row admin-holder">
			<div class="col-md-12"><h2>Manage news articles</h2></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<thead class="thead ">
							<tr>
								<th>Created at</th>
								<th>Title (Macedonian)</th>
								<th>Title (English)</th>
								<th>Image</th>
								<th>Edit/Preview/Delete</th>
							</tr>
						</thead>

						<tbody class="table-body">

							<?php foreach($all_news as $key => $value){
								?>

								<tr class="table-row" id="<?php echo $key; ?>">
									<td><?php echo $value['created_at']; ?></td>
									<td><?php echo $value['title_macedonian']; ?></td>
									<td><?php echo $value['title_english']; ?></td>					
									<td>

										<img src="<?php echo base_url().$value['news_thumb_url']; ?>" style="height: 100px;width: 250px;" class="news_main_image" />


									</td>					
									<td>					
										<a href="<?php echo base_url() . "admin/show_news/" . $key; ?>" class="btn btn-primary btn-block">Preview</a>
										<a href="<?php echo base_url() . "admin/edit_news/" . $key; ?>" class="btn btn-default btn-block edit">Edit</a>
										<a href="#" class="btn btn-danger delete-link btn-block" data-toggle="modal" data-target="#modalDelete">Delete</a>
									</td>
								</tr>

								<?php
							} ?>

						</tbody>
					</table>

				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete the selected news?</p>
						<p>This operation is not reversable...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id="delete-cancel-btn">Close</button>
						<button type="button" class="btn btn-danger" id="delete-news-btn">Delete</button>
					</div>
				</div>
			</div>
		</div>

	</body>
	</html>