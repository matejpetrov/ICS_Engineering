<?php echo $header; ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 contact">
			<h1 id="title-page"><?php echo $contact_page_title; ?></h1>
			<div id="mailSuccess" class="alert alert-success hide" role="alert">
				Вашата порака е успешно испратена
			</div>
			<form method="post" id="form-mail" name="form-mail">
				<div class="form-group">
					<label><?php echo $contact_name_surname; ?></label>
					<input  name="name" id="name" type="text" class="form-control" placeholder="<?php echo $contact_name_surname_placeholder; ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_mail; ?></label>
					<input name="email" id="email" type="text" class="form-control" placeholder="<?php echo $contact_mail_placeholder ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_title; ?></label>
					<input name="subject" id="subject" type="text" class="form-control" placeholder="<?php echo $contact_title_placeholder; ?>" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label><?php echo $contact_message; ?></label>
					<textarea name="msg" id="msg" class="form-control" placeholder="<?php echo $contact_message_placeholder; ?>" ></textarea>
					<input id="sendMail" name="sendMail" type="submit" class="btn btn-default" value="<?php echo $contact_btn_send; ?>">
						 <!-- <?php //echo $contact_btn_send; ?> -->
					<!-- </button> -->
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>