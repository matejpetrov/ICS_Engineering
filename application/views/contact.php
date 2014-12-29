<?php echo $header; ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 contact">
			<h1><?php echo $contact_page_title; ?></h1>
			<form method="post" action="<?php echo base_url();?>sendEmailController/sendEmail">
				<div class="form-group">
					<label><?php echo $contact_name_surname; ?></label>
					<input  name="name" type="text" class="form-control" placeholder="<?php echo $contact_name_surname_placeholder; ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_mail; ?></label>
					<input name="email" type="text" class="form-control" placeholder="<?php echo $contact_mail_placeholder ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_title; ?></label>
					<input name="subject" type="text" class="form-control" placeholder="<?php echo $contact_title_placeholder; ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_message; ?></label>
					<textarea name="msg" class="form-control" placeholder="<?php echo $contact_message_placeholder; ?>" ></textarea>
					<button type="submit" class="btn btn-default">
						<?php echo $contact_btn_send; ?>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>