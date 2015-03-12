
<div class="item">
	<img class="img-rounded" src="<?php echo base_url().$news_thumb_url; ?>" />
	<h3><?php echo $title; ?></h3>	
	<p>
		<a href="<?php echo base_url(); ?>news/<?php echo $news_url; ?>">
			<button type="button" class="btn btn-default">
				<?php echo $more; ?>
			</button>
		</a>
	</p>
</div>