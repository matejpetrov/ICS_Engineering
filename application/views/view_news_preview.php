<?php echo $header; ?>

<!-- preview in detail a news that has been selected.  -->

<script type="text/javascript">
	$(window).ready(function() {
		$('img:not([class])').css('padding-right', '20px');
		$('img:not([class])').addClass('img-responsive');
	});
</script>

<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/latest-news-navigation.js'></script>


<input type="hidden" id="get_news_url" value="<?php echo base_url(); ?>static_pages_controller/show_news_homepage_AJAX" />
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

<div class="container news-page">
	<div class="row">
		<div class="col-md-8">
			<div class="current_news_title" style="text-align: center;">
				<h1><?php echo $title; ?></h1>
			</div>

			<div class="col-md-12" style="text-align: center; margin-bottom: 20px;">
				<img class="current_news_image" src="<?php echo base_url().$news_image_url; ?>" style="padding:0;display:initial; width: 800px;" />
			</div>

			<div class="current_news_content">
				<?php echo $content; ?>
			</div>
			
		</div>		

		<div class="col-md-3 latest_news">
			
			<div class="row">
				<h3><?php echo $latest_news_title; ?></h3>
				<?php echo $latest_news; ?>
			</div>

			<div class="row all_news_btn" style="text-align:center;">
				<a href="<?php echo base_url(); ?>static_pages_controller/news">
					<button class="btn btn-warning">All news</button>
				</a>
			</div>

		</div>

	</div>	

</div>


<?php echo $footer; ?>