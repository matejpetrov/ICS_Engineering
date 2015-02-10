<?php echo $header; ?>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_navigate_pages.js"></script>

<script type="text/javascript">
	$(window).load(function() {
		$('img:not([class])').css('padding-right', '20px');
		$('img:not([class])').addClass('img-responsive');
	});
</script>


<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

<div class="container">
	
	<div class="row">
		
		<div class="col-md-9" id="content-container">				

			<?php echo $about_us_page; ?>

		</div>

		<div class="col-md-3">

			<ul class="nav nav-pills nav-stacked sidebar">
				<li id="0">
					<a href="#" onclick="about_us_ajax_page(0);"><?php echo $menus_about_us; ?></a>
				</li>
				<li id="1">
					<a href="#" onclick="about_us_ajax_page(1)"><?php echo $menus_mission; ?></a>
				</li>
				<li id="2">
					<a href="#" onclick="about_us_ajax_page(2)"><?php echo $menus_partners; ?></a>
				</li>

				<li id="3">
					<a href="#" onclick="about_us_ajax_page(3)"><?php echo $menus_corporate_info; ?></a>
				</li>			
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		getSubpage.init();
	});
</script>
<?php echo $footer; ?>