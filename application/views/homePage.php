<?php echo $header; ?>

<div class="push">
	<div class="camera_wrap camera_orange_skin camera_emboss pattern_1" id="camera_wrap_4">
		<?php foreach ($images->result() as $image) { ?>
		<div  data-src="<?php echo base_url().$image->image_url; ?>"></div>
		<?php } ?>
	</div>
</div>

<div class="container marketing">
	<div class="row news-row">
			<div id="owl-news"  class="owl-carousel owl-theme">
				<?php foreach($all_news as $news){

						echo $news;

					} ?>
			</div>
	</div>
</div>

<?php echo $footer; ?>

