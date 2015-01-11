<?php echo $header; ?>

<div class="push">
	<div class="camera_wrap camera_orange_skin camera_emboss pattern_1" id="camera_wrap_4">
		<?php foreach ($images->result() as $image) { ?>
		<div  data-src="<?php echo base_url().$image->image_url; ?>"></div>
		<?php } ?>
	</div>
</div>

<div class="container marketing">
	<div class="row news-row">
			<div id="owl-news"  class="owl-carousel owl-theme">
				<div class="item">
					<img class="img-rounded" src="assets/images/news_images/sudnica.png" />
					<h3>Со ИЦС до најмодерна судница во Македонија</h3>
					<p>
						ИЦС Консалтинг Инженеринг го дизајнира и имплементира решението за аудио-визуелно следење на судските процеси... 
					</p>
					<p>
						<a href="<?php echo base_url(); ?>staticPagesController/news_example">
								<button type="button" class="btn btn-default">
									Повеќе>>
								</button>
						</a>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="assets/images/fiber_optic.jpg" />
					<h3>Успешна приказна 2 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="assets/images/fiber_optic.jpg" />
					<h3>Успешна приказна 3 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="assets/images/fiber_optic.jpg" />
					<h3>Успешна приказна 4 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="assets/images/fiber_optic.jpg" />
					<h3>Успешна приказна 5 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="assets/images/fiber_optic.jpg" />
					<h3>Успешна приказна 6 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
				<div class="item">
					<img class="img-rounded" src="images/fiber_optic.jpg" />
					<h3>Успешна приказна 7 :
					<br />
					Март 2010</h3>
					<p>
						ИЦС Консалтинг и Инженеринг успешно инсталираше опрема за ИМС проектот за Македонски Телеком
						како под-изведувач за "Ericsson AB"
					</p>
					<p>
						<button type="button" class="btn btn-default">
							Повеќе>>
						</button>
					</p>
				</div>
			</div>
	</div>
</div>

<?php echo $footer; ?>

