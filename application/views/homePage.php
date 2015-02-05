<?php echo $header; ?>

<script type="text/javascript">
	$(document).ready(function() {

		$("#owl-logo").owlCarousel({


			items: 4,
			lazyLoad: true,
			navigation: false,
			autoPlay: true,
			pagination: false
		});

	});


</script>

<div class="push">
	<div class="camera_wrap camera_orange_skin camera_emboss pattern_1" id="camera_wrap_4">
		<?php foreach ($images->result() as $image) { ?>
		<div  data-src="<?php echo base_url().$image->image_url; ?>">
			<div class="moveFromRight" style="position:absolute;font-size:20px; top:5%; left:5%; color:#fff; padding:5px; width:25%">The text of your html element</div>
		</div>
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

<div class="container marketing">
	<div class="row news-row">
		<div id="owl-logo"  class="owl-carousel owl-theme">
		<div class="item"><a href="http://www.alcatel-lucent.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/alcatel_lucent.png" alt="Owl Image"></a></div>
		<div class="item"><a href="http://www.airbus.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/airbus.jpg" alt="Owl Image"></a></div>
		<div class="item"><a href="http://www.emersonnetworkpower.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/emerson_electric.jpg" alt="Owl Image"></a></div>
		<div class="item"><a href="http://www.overturenetworks.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/overture-networks.png" alt="Owl Image"></a></div>
		<div class="item"><a href="http://axellwireless.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/axell-wirelss-logo.png" alt="Owl Image"></a></div>
		<div class="item"><a href="http://www.virtualaccess.com/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/virtual-access.png" alt="Owl Image"></a></div>
		<div class="item"><a href="http://www.srs.kiev.ua/"><img class="partners-logo" src="<?php echo base_url(); ?>assets/images/companies/virtual-access.png" alt="Owl Image"></a></div>
		</div>
	</div>
</div>

<?php echo $footer; ?>

