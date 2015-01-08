<style>

	ul.services_system_integration_list {		
	}
	ul.services_system_integration_list li{
		display: block;		
		list-style-type: circle !important;
		text-align: justify;
	}
</style>


<h2><?php echo $services_system_integration_title; ?></h2>


<p><?php echo $services_system_integration_first_paragraph; ?></p>


<ul class="services_system_integration_list">
<?php foreach($services_system_integration_list as $s){

?>			
	<li>
		<?php echo $s; ?>
	</li>	

<?php } ?>

</ul>

<p><?php echo $services_system_integration_second_paragraph; ?></p>