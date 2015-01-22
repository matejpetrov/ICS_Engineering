jQuery(document).ready(function() {
	$('#username').focusout(function(){
		$('#user-notification').removeClass().addClass('fa fa-spinner fa-spin');
		var base_url = $('#base_url').val();
		$.ajax({
			url: base_url + 'admin/checkUsername',
			type: 'post',
			dataType: 'json',
			data: {
				username: $('#username').val()
			},
			beforeSend:function(){
				$('#user-notification').parent().parent().removeClass('has-success');
				$('#user-notification').parent().parent().removeClass('has-error');
			},
			success: function(data){
				if (data.result == 'ok') {
					$('#user-notification').removeClass('fa-spinner fa-spin').addClass('fa-check');
					$('#user-notification').parent().parent().addClass('has-success');
				} else{
					$('#user-notification').removeClass('fa-spinner fa-spin').addClass('fa-times');
					$('#user-notification').parent().parent().addClass('has-error');
				};
			}

		});
	});
	$('#email').focusout(function(){
		$('#email-notification').removeClass().addClass('fa fa-spinner fa-spin');
		var base_url = $('#base_url').val();
		$.ajax({
			url: base_url + 'admin/checkMail',
			type: 'post',
			dataType: 'json',
			data: {
				email: $('#email').val()
			},
			beforeSend:function(){
				$('#email-notification').parent().parent().removeClass('has-success');
				$('#email-notification').parent().parent().removeClass('has-error');
			},
			success: function(data){
				if (data.result == 'ok') {
					$('#email-notification').removeClass('fa-spinner fa-spin').addClass('fa-check');
					$('#email-notification').parent().parent().addClass('has-success');
				} else{
					$('#email-notification').removeClass('fa-spinner fa-spin').addClass('fa-times');
					$('#email-notification').parent().parent().addClass('has-error');

				};
			}

		});
	});
});