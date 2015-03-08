<?php echo $header; ?>

<style>
	
	div.sidebar-nav > ul{
		list-style: none;
		margin-top: 20px;
	}

	div.sidebar-nav > ul > div > div > li > a{
		text-transform: uppercase;
		text-align: center;		
	}

	div.sidebar-nav > ul > div > div > li > a:hover{		
		text-decoration: none;
		color: #CD5A01 !important;    	
	}

	div.sidebar-nav > ul > div > div > li > a.selected{
		border-bottom: 2px solid #CD5A01;
		border-top: 2px solid #CD5A01;
		color: #CD5A01 !important; 
		text-decoration: none;
	}	
	.loading > div{
		background:url("<?php echo base_url(); ?>assets/images/ajax-loading.gif") no-repeat 0 0;
	}
	.loading-topnav > div{
		background:url("<?php echo base_url(); ?>assets/images/ajax-loading.gif") no-repeat 0 0;
	}

</style>


<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

<div class="container">
	
	<div class="row">
		
		<div class="col-md-9 services" id="content-container">
			<div id="loading">
				<div></div>
			</div>
			<?php echo $services_page; ?>

		</div>

		<div class="col-md-3">

			<ul class="nav nav-pills nav-stacked sidebar">
				<li id="0">
					<a href="#" onclick="services_ajax_page(0);"><?php echo $menus_consulting; ?></a>
				</li>
				<li id="1">
					<a href="#" onclick="services_ajax_page(1)"><?php echo $menus_engineering; ?></a>
				</li>
				<li id="2">
					<a href="#" onclick="services_ajax_page(2)"><?php echo $menus_system_integration; ?></a>
				</li>
			</ul>
		</div>

	</div>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_navigate_pages.js"></script>
<?php echo $footer; ?>