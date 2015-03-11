<noscript>
	<div id="warning" class="noscript">
		This website will not work if Javascript is disabled. Please turn on back Javascript.
	</div>	
</noscript>
<div class="container-fluid" style="background-color: #CD5A01;">
	<div class="container header">
		<div class="row">
			<div class="col-md-12 lang">
				<a href="<?php echo base_url(); ?>admin" class="i_header home"><i class="fa fa-home"></i></a>
				<ul class="user-info-list">
					<li class="user-info first" >
						<?php echo $name; ?>
					</li>
					<li class="user-info last">
						<?php echo $surname; ?>
					</li>
					<li class="dropdown settings-active">
						<a href="#" class="dropdown-toggle i_header" data-toggle="dropdown" role="button" aria-expanded="false" id="cog"><i class="fa fa-cog"></i></a>
						<ul class="dropdown-menu admin-menu" role="menu">
							<li>
								<a id="settings" href="<?php echo base_url(); ?>admin/settings">Settings</a>
							</li>								
							<li>
								<a id="logout" href="<?php echo base_url(); ?>admin/logout">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
