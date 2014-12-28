	<div class="footer-navigation">
		 <div class="container-fluid" style="background-color: #626262;">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-12 footer">
							<ul class="footer-nav">
								<li>
									<a href="#"><?php echo $menus_home; ?></a>
								</li>
								<li>
									<a href="#"><?php echo $menus_about_us; ?></a>
								</li>
								<li class="last">
									<a href="#"><?php echo $menus_news; ?></a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-12 footer">
							<ul class="footer-nav">
								<li>
									<a href="#"><?php echo $menus_services; ?></a>
								</li>
								<li>
									<a href="#"><?php echo $menus_web_mail; ?></a>
								</li>
								<li class="last">
									<a href="#"><?php echo $menus_contact; ?></a>
								</li>
							</ul>
						</div>
						<div class="col-md-12 footer-nav">
							<p>
								<?php echo $additional_address;?>
							</p>
						</div>
						<div class="col-md-12 social-btn">
							<ul class="social-media">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</li>
								<li id="go-up">
									<a href="#" class="back-to-top"> <img src="<?php echo base_url(); ?>assets/images/ics-logo-malo1.svg" class="top" style="height: 60px;width: 60px;" /> <img src="<?php echo base_url(); ?>assets/images/arrow_up.svg" class="bottom" style="height: 60px;width: 60px;" /> </a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube-play"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<?php 
			$current = current_url();
			$base = base_url();		
			if ($current == $base){?>
				<div class="container-fluid">
					<div class="col-md-12">
						<div id="map"></div>
					</div>
				</div>
			<?php }?>			
		</div>
	</body>
	</html>
	