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


</style>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_navigate_pages.js"></script>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />

<div class="container">
	
	<div class="row">
		
		<div class="col-md-7" id="content-container">				

			<?php echo $services_page; ?>

		</div>

		<div class="col-md-4 sidebar-nav">

			<ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<li><a href="#" onclick="services_ajax_page(0);"><?php echo $menus_services; ?></a></li>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<li><a href="#" onclick="services_ajax_page(1)"><?php echo $menus_engineering; ?></a></li>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<li><a href="#" onclick="services_ajax_page(2)"><?php echo $menus_system_integration[0]; ?>
										<br /><?php echo $menus_system_integration[1]; ?></a></li>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<li><a href="#" onclick="services_ajax_page(3)"><?php echo $menus_consulting; ?></a></li>
					</div>
				</div>
																
			</ul>


		</div>

	</div>

</div>

<?php echo $footer; ?>