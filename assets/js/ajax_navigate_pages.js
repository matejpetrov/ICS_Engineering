
function about_us_ajax_page(page_id){

	var controller = "static_pages_controller/";
	var func = "ajax_about_us_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + controller + func;

	$.ajax({
		'url' : url,        
		'type' : 'POST', 

		'data' : {'page_id':temp},

		'dataType' : 'html',
		beforeSend:function(){
			$('li').removeClass('active');
			$('a').removeClass('sub-selected');

		},
		'success' : function(data){ 
			var container = $('#content-container');
			if(data){
				container.html(data);
			}
		}
	}).done(function() {
		$('.sidebar').find('#' + temp).addClass('active');
		$('#about_' + temp).addClass('sub-selected');
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}

function services_ajax_page(page_id){

	var controller = "static_pages_controller/";
	var func = "ajax_services_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + controller + func;

	$.ajax({
		'url' : url,        
		'type' : 'POST', 

		'data' : {'page_id':temp},
		'dataType' : 'html',
		beforeSend:function(){
			$('li').removeClass('active');
			$('a').removeClass('sub-selected');

		},
		'success' : function(data){ 
			var container = $('#content-container');
			if(data){
				container.html(data);
			}
		}
	}).done(function() {
		$('.sidebar').find('#' + temp).addClass('active');
		$('#services_' + temp).addClass('sub-selected');
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}