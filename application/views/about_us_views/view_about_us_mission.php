

<style>

	ul.mission-list {
		list-style: square;
	}
	ul.mission-list > li{
		display: block;		
	}
</style>

<h2><?php echo $about_us_mission_title; ?></h2>

<ul class="mission-list">
<?php foreach($about_us_mission as $mission){

?>			
	<li>
		<?php echo $mission; ?>		
	</li>	

<?php } ?>

</ul>