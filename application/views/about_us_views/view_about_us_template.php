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
					<a href="#" onclick="about_us_ajax_page(2)"><?php echo $menus_vision; ?></a>
				</li>

				<li id="3">
					<a href="#" onclick="about_us_ajax_page(3)"><?php echo $menus_structure; ?></a>
				</li>

				<li id="4">
					<a href="#" onclick="about_us_ajax_page(4)"><?php echo $menus_partners; ?></a>
				</li>

				<li id="5">
					<a href="#" onclick="about_us_ajax_page(5)"><?php echo "$menus_corporate_info[0] $menus_corporate_info[1]"; ?></a>
				</li>			
			</ul>
		</div>
	</div>
</div>

<?php echo $footer; ?>