

<style>

	ul.services_engineering_list {		
	}
	ul.services_engineering_list li{
		display: block;		
		list-style-type: circle !important;
		text-align: justify;
	}
</style>

<h2><?php echo $services_engineering_title; ?></h2>

<h3><?php echo $services_engineering_subtitle; ?></h3>


<ul class="services_engineering_list">
<?php foreach($services_engineering_content as $sec){

?>			
	<li>
		<?php echo $sec; ?>
	</li>	

<?php } ?>

</ul>