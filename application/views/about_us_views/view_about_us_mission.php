<style>

	ul.mission-list {		
	}
	ul.mission-list li{
		display: block;		
		list-style-type: circle !important;
		text-align: justify;
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