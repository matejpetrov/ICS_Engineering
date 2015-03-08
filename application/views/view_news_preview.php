<?php echo $header; ?>

<!-- preview in detail a news that has been selected.  -->

<script type="text/javascript">
	$(window).ready(function() {
		$('img:not([class])').css('padding-right', '10px');
		$('img:not([class])').addClass('img-responsive');
	});
</script>
<style type="text/css">
	.loading-news > div{
		background:url("<?php echo base_url(); ?>assets/images/ajax-loading.gif") no-repeat 0 0;
	}
</style>

<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/latest-news-navigation.js'></script>


<input type="hidden" id="get_news_url" value="<?php echo base_url(); ?>static_pages_controller/show_news_homepage_AJAX" />
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

<div class="container news-page">
	<div class="row">
		<div class="col-md-12 news-container">
			<div id="loading">
				<div></div>
			</div>
			<div class="col-md-12">
				<div class="col-md-12 current_news_title">
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
			<div class="col-md-12" style="background-color: #F8F8F8;">
				<div class="date">
					<?php echo $date; ?>
					<!-- Stavi data da se pokazuva tuka u format DD-Mesec-YYYY (01-January-2015) -->
				</div>
			</div>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="col-md-9 news-article">

					<div class="col-sm-12 col-md-12" style="margin-bottom: 20px;">
						<img class="current_news_image" src="<?php echo base_url().$news_image_url; ?>" />
					</div>

					<div class="col-md-12 current_news_content">
						<?php echo $content; ?>
						<div style="height: 50px;"></div>
					</div>
				</div>		

				<div class="col-md-3 latest_news">

					<!-- <div class="row"> -->
					<h3><?php echo $latest_news_title; ?></h3>
					<?php echo $latest_news; ?>
					<!-- </div> -->

					<div class="row all_news_btn" style="text-align:center;">
						<a href="<?php echo base_url(); ?>static_pages_controller/news">
							<button class="btn btn-default"><?php echo $all_news_btn; ?></button>
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>	
</div>
<div style="height: 50px;"></div>

<?php echo $footer; ?>