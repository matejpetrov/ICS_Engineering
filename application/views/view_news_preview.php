<?php echo $header; ?>
<script type="text/javascript">
	$(window).load(function() {
		$('img:not([class])').css('padding-right', '20px');
		$('img:not([class])').addClass('img-responsive');
	});
</script>
<div class="container news-page">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: center;">
				<h1><?php echo $title; ?></h1>
			</div>

			<div class="col-md-12" style="text-align: center; margin-bottom: 20px;">
				<img src="<?php echo base_url().$news_image_url; ?>" style="padding:0;display:initial; width: 800px;" />
			</div>

			<?php echo $content; ?>
		</div>
	</div>
</div>


<?php echo $footer; ?>