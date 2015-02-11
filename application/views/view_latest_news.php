<!-- view that will contain 4 latest news in the sidebar of the news preview view.  -->
	
<table class="table table-hover latest_news_table">

	<?php foreach($latest_news as $key => $value){
		?>

		<tr id="<?php echo $value['news_url']; ?>">														
			<td>
				<img src="<?php echo base_url().$value['news_image_url']; ?>" class="latest_news_image" />
			</td>
			<td><?php echo $value['title']; ?></td>	
		</tr>

		<?php
	} ?>

</table>