
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
		if (temp == 0) {
			$('.top-nav').find('#' + temp).addClass('active');
		};
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}


var getSubpage = {
	init: function() {
		$('#content-container.about_us').on('click','.sub',{func:'ajax_about_us_page_navigation'},this.requestPage);
		$('#content-container.services').on('click','.sub',{func:'ajax_services_page_navigation'},this.requestPage);
	},
	requestPage:function(e) {
		e.preventDefault();
		var clicked = $(this),
		parent = $(this).parent().attr('id'),
		container = $('#content-container'),
		base_url = $('#base_url').val(),
		controller = "static_pages_controller/",
		func = e.data.func;
		// "ajax_about_us_page_navigation";

		$.ajax({
			url: base_url + controller + func,
			type: 'post',
			dataType: 'html',
			beforeSend:function() {
				$('#' + parent).removeClass('active');
			},
			data: {
				'page_id':0,
				'top_nav':clicked.data('page')
			},
			success:function(data) {
				container.html(data);
			}
		})
		.done(function() {
			container.find('#' + parent).addClass('active');
		});
	}
};


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
		if (temp == 0) {
			$('.top-nav').find('#' + temp).addClass('active');
		};
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}

