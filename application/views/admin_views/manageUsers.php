<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>

	<title>Manage users</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font_awesome/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/manage_users.js"></script>
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
			<div class="col-md-12"><h2>Manage users</h2></div>
		</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead class="thead">
						<tr>
							<th>Username</th>
							<th>Name</th>
							<th>Surname</th>
							<th>E-mail</th>
							<th>Role</th>
							<th>Authenticated</th>
						</tr>
					</thead>

					<tbody class="table-body">

						<?php foreach($users->result() as $user){
							?>

							<tr class="table-row" id="<?php echo $user->id; ?>">
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->name; ?></td>
								<td><?php echo $user->surname; ?></td>					
								<td><?php echo $user->email; ?></td>					
								<td id="role">
								<?php 
									if ($user->role == 2) {
										echo "Super User";
									} else {
										echo "User";
									}
									
								?>
								</td>					
								<td>
								<?php
									if ($user->authenticated == 1) {
									 	echo "Yes";
									 } else {
									 	echo "No";
									 }
									  
								?>
								</td>									
								<td>					
									<?php if ($user->protected == 1) { ?>
									<button id="changeRole" class="btn btn-primary btn-block" <?php echo "disabled=\"disabled\""; ?>>Change Role</button>
									<button class="btn btn-danger  delete btn-block" <?php echo "disabled=\"disabled\""; ?> data-toggle="modal" data-target="#modalDelete">Delete</button>
									<?php }else{ ?>
									<button id="changeRole" class="btn btn-primary btn-block ">Change Role</button>
									<button id="delete-user" class="btn btn-danger  delete btn-block " data-toggle="modal" data-target="#modalDelete">Delete</button>
								<?php } ?>
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
					<p>Are you sure you want to delete the selected user?</p>
					<p>This operation is not reversable...</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="delete-cancel-btn">Close</button>
					<button type="button" class="btn btn-danger" id="delete-user-confirm">Delete</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>