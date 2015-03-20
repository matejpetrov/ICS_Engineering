	<div class="footer-navigation">
		<div class="container-fluid" style="background-color: #949494;">
			<div class="container">
				<div class="row">
				<div class="footer-menu">
					<div class="col-md-6 col-sm-12 footer">
						<ul class="footer-nav inline">
							<li>
								<a href="<?php echo base_url();?>" id="home-footer" ><?php echo $menus_home; ?></a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>about_us/0" id="about_us_footer"><?php echo $menus_about_us; ?></a>
							</li>
							<li class="last">
								<a href="<?php echo base_url(); ?>services/0" id="services_footer"><?php echo $menus_services; ?></a>
							</li>
							
						</ul>
					</div>
					<div class="col-md-6 col-sm-12 footer">
						<ul class="footer-nav inline">
							<li class="first">
								<a href="<?php echo base_url(); ?>products/0" id="products_footer"><?php echo $menus_products; ?></a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>news" id="news_footer"><?php echo $menus_news; ?></a>
							</li>
							<li>
								<a href="http://mail.ics.net.mk:81/redmine/" target="_blank" id="support-footer" ><?php echo $menus_web_mail; ?></a>
							</li>
							<li class="last">
								<a href="<?php echo base_url();?>contact" id="contact-footer" ><?php echo $menus_contact; ?></a>
							</li>
						</ul>
					</div>
</div>
					<div class="col-md-12 footer-nav address">
						<p>
							<?php echo $additional_address;?>
						</p>
					</div>
					<div class="col-md-12 social-btn">
						<ul class="social-media inline">
							<li>
								<a href="https://www.facebook.com/pages/ICS-Consulting-Engineering/938490292836165" target="_blank"><i class="fa fa-facebook"></i></a>
							</li>								
							<li id="go-up">
								<a href="#" class="back-to-top"> <img src="<?php echo base_url(); ?>assets/images/ics-logo-malo1.svg" class="top" style="height: 60px;width: 60px;" /> <img src="<?php echo base_url(); ?>assets/images/arrow_up.svg" class="bottom" style="height: 60px;width: 60px;" /> </a>
							</li>
							<li>
								<a href="https://www.linkedin.com/company/1580791" target="_blank"><i class="fa fa-linkedin"></i></a>
							</li>								
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid copyright">
			<div class="container">
				<div class="row">
				<div class="col-md-12 copyright-holder">
						<div>
							&copy; ICS Consulting Engineering <?php echo date('Y'); ?>
						</div>
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
