$(document).ready(function(){
	var pathname=window.location.pathname;
	var array=pathname.split('/');
	var numEl=array.length-1;
	var last = array[numEl];
	var prelast = array[numEl-1];
	if (last != "") {

		if($.isNumeric(last)){

			if(prelast == 'about_us'){
				$('#about_us').addClass('selected');
				$('#about_us_footer').addClass('selected');
			}
			else{
				$('#services').addClass('selected');
				$('#services_footer').addClass('selected');
			}
		}


		$('#' + last).addClass('selected');
		$('#' + last + '-footer').addClass('selected');
	}else{
		$('#home').addClass('selected');
		$('#home-footer').addClass('selected');
	};

	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox')
		.removeAttr('checked').removeAttr('selected');
	};
	$('#sendMail').click(function() 
	{
		pathArray = window.location.href.split( '/' );
		protocol = pathArray[0];
		host = pathArray[2];
		base_url = protocol + '//' + host+'/'+pathArray[3]+'/';
		var newText = $('#msg').val(); //value
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
