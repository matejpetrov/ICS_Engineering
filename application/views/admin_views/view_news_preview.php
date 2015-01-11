
<!-- <pre><?php //var_dump($translations); ?></pre> -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-theme.css" />

<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery_1.11.0.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

<p><?php var_dump($news); ?></p>

<div class="container">
	
	<?php 

	 	$news_english = array();
	    $news_macedonian = array();
	    
	    if($news[0]['lang'] == 0){
	    	$news_english = $news[0];
			$news_macedonian = $news[1];
	    }
	    else{
	    	$news_english = $news[1];
			$news_macedonian = $news[0];
	    }	

	 ?>

	<div class="row">		
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          News English
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
				
				<div class="col-md-12">				
					<h1><?php echo $news_english['title']; ?></h1>
					<?php echo $news_english['content']; ?>
					<p>Created at: <?php echo $news_english['created_at']; ?></p>
				</div>

		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          News Macedonian
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">

			    <div class="col-md-12">			
					<h1><?php echo $news_macedonian['title']; ?></h1>
					<?php echo $news_macedonian['content']; ?>
					<p>Created at: <?php echo $news_macedonian['created_at']; ?></p>
				</div>	
		      	
		      </div>
		    </div>
		  </div>		  
		</div><!-- panel -->

	</div><!-- row -->

	<div class="row">
		<div class="col-md-2">
			<a href="<?php echo base_url(); ?>admin" class="btn btn-primary">Main menu</a>
		</div>
		<div class="col-md-2">
			<a href="<?php echo base_url(); ?>admin/edit_news/<?php echo $id; ?>" class="btn btn-primary">Edit news</a>
		</div>
	</div>


</div>


