
<div class="item">
	<img class="img-rounded" src="<?php echo $news_image_url; ?>" />
	<h3><?php echo $title; ?></h3>	
	<p>
		<a href="<?php echo base_url(); ?>staticPagesController/show_news_homepage/<?php echo $id; ?>">
			<button type="button" class="btn btn-default">
				Повеќе>>
			</button>
		</a>
	</p>
</div>