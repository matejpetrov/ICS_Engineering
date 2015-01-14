<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />		

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/all_news_manage.js"></script>


		<style type="text/css">

			.thead{
				border-bottom: solid 3px gray;
			}

		</style>		

	</head>

	<body>

		<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

		<table class="table table-hover">
			<thead class="thead">
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
						<img src="<?php echo $value['news_image_url']; ?>" style="height: 100px;width: 250px;" class="news_main_image" />
					</td>					
					<td>					
						<a href="<?php echo base_url() . "admin/show_news/" . $key; ?>" class="btn btn-primary">Preview</a>
						<a href="<?php echo base_url() . "admin/edit_news/" . $key; ?>" class="btn btn-default">Edit</a>
						<a href="#" class="btn btn-danger delete-link" data-toggle="modal" data-target="#modalDelete">Delete</a>
					</td>
				</tr>
				
				<?php
				} ?>

			</tbody>
		</table>


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
		        <button type="button" class="btn btn-primary" id="delete-news-btn">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

	</body>
</html>