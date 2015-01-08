$(document).ready(function(){
	$('#loginBtn').click(function () 
	{
		var base_url = $('#base_url').val();
		// var address= base_url + "admin/login";
		// alert(address);
		$.ajax({
			type: "POST",
			cache:false,
			url: base_url + "admin/login",
			data:
			{
				username: $('#username').val(),
				password: $('#password').val()
			},
			dataType: "html",
			success: function(data){
				$('#loginBtn').before(data);
			},
			error: function(){
				// alert("Fail");
			}
		});
		return false;
	});
});