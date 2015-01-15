<?php echo $header; ?>

<style type="text/css">
	

	img{
		padding-right: 20px;		
	}


</style>

<div class="container news-page">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: center;">
				<h1><?php echo $title; ?></h1>
			</div>

			<div style="text-align: center; margin-bottom: 20px;">
				<img src="<?php echo $news_image_url; ?>" style="width: 800px; height: 400px;" />
			</div>

			<?php echo $content; ?>
		</div>
	</div>
</div>

<?php echo $footer; ?>