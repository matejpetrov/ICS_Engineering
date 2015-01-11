
function about_us_ajax_page(page_id){

		var controller = "staticPagesController/";
		var func = "ajax_about_us_page_navigation";	

		var temp = page_id;	

		var base_url = document.getElementById('base_url').value;

		var url = base_url + controller + func;

		$.ajax({
		      'url' : url,        
		      'type' : 'POST', //the way you want to send data to your URL
		      //in the post object i am sending this parameter.
		      'data' : {'page_id':temp},
		      'dataType' : 'html',
		      'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
		          var container = $('#content-container'); //jquery selector (get element by id)
		          if(data){
		        	container.html(data);
		          }
		      }
		});

}

function services_ajax_page(page_id){

	var controller = "staticPagesController/";
	var func = "ajax_services_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + controller + func;

	$.ajax({
	      'url' : url,        
	      'type' : 'POST', //the way you want to send data to your URL
	      //in the post object i am sending this parameter.
	      'data' : {'page_id':temp},
	      'dataType' : 'html',
	      'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
	          var container = $('#content-container'); //jquery selector (get element by id)
	          if(data){
	        	container.html(data);
	          }
	      }
	});	

}