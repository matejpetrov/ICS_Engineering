<?php echo $header; ?>
<div class="container">
	
	<div class="row">

		<div class="news-item-container">
			
			<?php foreach($all_news as $news){

				echo $news;

			} ?>

		</div>
		<div class="clearfix"></div>
		<div class="page">
			<nav>
				<ul class="pagination">
					<li class="<?php if(($active - 1) == 0) echo "disabled"; ?>">
						<?php if(($active - 1) > 0) echo "<a href=\"".base_url()."static_pages_controller/news/".($active-1)."\" aria-label=\"Previous\">"; ?>
							<span aria-hidden="true">&laquo;</span>
						<?php if(($active - 1) > 0) echo "</a>"; ?>
					</li>
					<?php for ($i=1; $i <= $pages; $i++) { ?>
					<li class="<?php if($i == $active) echo "active"; ?>"><a href="<?php echo base_url(); ?>static_pages_controller/news/<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>

					<li class="<?php if($active == $pages) echo "disabled"; ?>">
						<?php if(($active) < $pages) echo "<a href=\"".base_url()."static_pages_controller/news/".($active+1)."\" aria-label=\"Next\">"; ?>
							<span aria-hidden="true">&raquo;</span>
						<?php if(($active ) < $pages) echo "</a>"; ?>

						
					</li>
				</ul>
			</nav>
		</div>


	</div>


</div>

<?php echo $footer; ?>