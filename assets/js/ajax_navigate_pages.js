function about_us_ajax_page(page_id){

	var controller = "static_pages_controller/";
	var func = "ajax_about_us_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + func;

	$.ajax({
		'url' : url,        
		'type' : 'POST', 

		'data' : {'page_id':temp},

		'dataType' : 'json',
		beforeSend:function(){
			$('#content-container').find('#loading').addClass('loading');
			$('li').removeClass('active');
			$('a').removeClass('sub-selected');

		},
		'success' : function(data){ 
			var container = $('#content-container');
			if(data){
				$('title').text(data.title);
				container.html(data.data);
			}
		}
	}).done(function() {
		$('#content-container').prepend('<div id="loading"><div></div></div>');
		$('.sidebar').find('#' + temp).addClass('active');
		$('#about_' + temp).addClass('sub-selected');
		if (temp == 0) {
			$('.top-nav').find('#' + temp).addClass('active');
		};
		if (temp == 3) {
			$('head').append('<script type="text/javascript" src="'+base_url+'assets/js/map.js"></script>')
			map.init();
		};
		$('#content-container').find('img').each(function(){
			$(this).addClass('img-responsive');
			if (temp == 2) {
			$(this).css('padding-right','20px');
		};
		});
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}

function services_ajax_page(page_id){

	var controller = "static_pages_controller/";
	var func = "ajax_services_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + func;

	$.ajax({
		'url' : url,        
		'type' : 'POST', 
		'data' : {'page_id':temp},
		'dataType' : 'json',
		beforeSend:function(){
			$('#content-container').find('#loading').addClass('loading');
			$('li').removeClass('active');
			$('a').removeClass('sub-selected');
		},
		'success' : function(data){ 
			var container = $('#content-container');
			if(data){
				$('title').text(data.title);
				container.html(data.data);
			}
		}
	}).done(function() {
		$('#content-container').prepend('<div id="loading"><div></div></div>');
		$('.sidebar').find('#' + temp).addClass('active');
		$('#services_' + temp).addClass('sub-selected');
		if (temp == 0) {
			$('.top-nav').find('#' + temp).addClass('active');
		};
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}
function products_ajax_page(page_id){

	var controller = "static_pages_controller/";
	var func = "ajax_products_page_navigation";	

	var temp = page_id;	

	var base_url = document.getElementById('base_url').value;

	var url = base_url + func;

	$.ajax({
		'url' : url,        
		'type' : 'POST', 
		'data' : {'page_id':temp},
		'dataType' : 'json',
		beforeSend:function(){
			$('#content-container').find('#loading').addClass('loading');
			$('li').removeClass('active');
			$('a').removeClass('sub-selected');
		},
		'success' : function(data){ 
			var container = $('#content-container');
			if(data){
				$('title').text(data.title);
				container.html(data.data);
			}
		}
	}).done(function() {
		$('#content-container').prepend('<div id="loading"><div></div></div>');
		$('.sidebar').find('#' + temp).addClass('active');
		$('#products_' + temp).addClass('sub-selected');
		
		$('.top-nav').find('#0').addClass('active');
		/*if (temp) {
			$('.top-nav').find('#0').addClass('active');
		};*/
		window.history.pushState("", "", window.location.href.replace(/[0-9]#/, page_id));
	});

}
var getSubpage = {
	init: function() {
		$('#content-container.about_us').on('click','.sub',{func:'ajax_about_us_page_navigation'},this.requestPage);
		$('#content-container.products').on('click','.sub',{func:'ajax_products_page_navigation'},this.requestPage);
	},
	requestPage:function(e) {
		e.preventDefault();
		var clicked = $(this),
		parent = $(this).parent().attr('id'),
		container = $('#content-container'),
		base_url = $('#base_url').val(),
		controller = "static_pages_controller/",
		page_id=0,
		func = e.data.func;
		if (clicked.data('id') != undefined ) {
			page_id=clicked.data('id');
			console.log(page_id);
		};
		// "ajax_about_us_page_navigation";

		$.ajax({
			url: base_url + func,
			type: 'post',
			dataType: 'json',
			beforeSend:function() {
				if ($('.sidebar').find('.active').attr('id')==1) {
				$('#content-container').find('#loading').addClass('loading-topnav-dc');
				$('#' + parent).removeClass('active');

				}else{
				$('#content-container').find('#loading').addClass('loading-topnav');
				$('#' + parent).removeClass('active');
					
				};
			},
			data: {
				'page_id':page_id,
				'top_nav':clicked.data('page')
			},
			success:function(data) {
				$('title').text(data.title);
				container.html(data.data);
			}
		})
		.done(function() {
			container.find('#' + parent).addClass('active');
			$('#content-container').find('#loading').removeClass('loading-topnav');
			$('#content-container').prepend('<div id="loading"><div></div></div>');
			
		});
	}
};



