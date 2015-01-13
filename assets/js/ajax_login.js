$(document).ready(function(){
	$('#loginBtn').click(function () 
	{
		var base_url = $('#base_url').val();
		$.ajax({
			type: "POST",
			cache:false,
			url: base_url + "admin/login",
			data:
			{
				username: $('#username').val(),
				password: $('#password').val()
			},
			beforeSend:function(){
				$('.has-error').removeClass('has-error');
			},
			dataType: "json",
			success: function(data){
				if('error' in data){
					$('#' + data.id).addClass('has-error');
					$('#error').addClass('alert alert-danger');

					$('#error').text(data.error);
					$('#password').val('');
				}
				else{
					location.href = base_url + "admin/loginSuccess";
				}
			},
			error: function(data){
			}
		});
		return false;
	});
});