$(document).ready(function(){
	var pathname=window.location.pathname;
	var array=pathname.split('/');
	var numEl=array.length-1;
	var last = array[numEl];
	var prelast = array[numEl-1];
	var preprelast = array[numEl-2];
	if (last != "") {

		if($.isNumeric(last)){

			if(prelast == 'about_us'){
				$('#about_us').addClass('selected');
				$('#about_us_footer').addClass('selected');
				$('.sidebar').find('#' + last).addClass('active');
				$('#about_' + last).addClass('sub-selected');
				if (last == 0) {
					$('.top-nav').find('#' + last).addClass('active');
				};
			}
			else if(prelast == 'services'){
				$('#services').addClass('selected');
				$('#services_footer').addClass('selected');
				$('.sidebar').find('#' + last).addClass('active');
				$('#services_' + last).addClass('sub-selected');
				if (last == 0) {
					$('.top-nav').find('#' + last).addClass('active');
				};
			}
			else if(prelast == 'products'){
				$('#products').addClass('selected');
				$('#products_footer').addClass('selected');
				$('.sidebar').find('#' + last).addClass('active');
				$('#products_' + last).addClass('sub-selected');
				$('.top-nav').find('#0').addClass('active');

				/*if (last == 0) {
					$('.top-nav').find('#' + last).addClass('active');
				};*/
			}
			else if(prelast == 'show_news_homepage'){
				$('#news').addClass('selected');
				$('#news_footer').addClass('selected');				
			}			
		}		
		if(prelast == "news"){
			$('#news').addClass('selected');
			$('#news_footer').addClass('selected');	
		}


		$('a#' + last).addClass('selected');
		$('a#' + last + '-footer').addClass('selected');
	}else{
		$('#home').addClass('selected');
		$('#home-footer').addClass('selected');
	};
	var base_url = $('#base_url').val();
	$.ajax({
		url: base_url + 'getSetLanguageAjax',
		type: 'GET',
		dataType: 'json',
		success:function(data){
			$('.' + data.language).addClass('active');
		}


	});
	
	$('.dropdown').on('mouseenter', function(){
		$(this).addClass('open');
	});

	$('.dropdown').on('mouseleave', function(){
		$(this).removeClass('open');
	});

	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
	};

	$('#sendMail').click(function() 
	{
		base_url = $('#base_url').val();
		var myself = $('input[name="myself"]').prop('checked'),
			newText = $('#msg').val();
			newText = newText.replace(/\r?\n/g, '<br />');	
		// alert(url);
		$.ajax({
			type: "POST",
			url: base_url + "sendEmailController/sendEmail",
			data:
			{
				name: $('#name').val(),
				email: $('#email').val(),
				subject: $('#subject').val(),
				message: newText
			},
			dataType: "json",
			success: function(){
				resetForm($('#form-mail'));
				$("html, body").animate({scrollTop: 0}, 500);
				$('#mailSuccess').removeClass('hide');
				$('#mailSuccess').addClass('show');
				window.setTimeout(function() { 
					$("#mailSuccess").fadeOut();
					$('#mailSuccess').removeClass('show');
				}, 3500);
			},
			error: function(){
				//alert("Fail")
			}
		});
		return false;

	});
});
