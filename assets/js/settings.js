var settings ={
	init:function(e){
		$('#profile-info').on('submit',this.changeName);
		$('#password').on('submit',this.changePassword);
		$('#name').on('click',function(){
			$(this).select();
		});
		$('#surname').on('click',function(){
			$(this).select();
		});
	},
	
	changeName:function(e){
		e.preventDefault();
		var name = $('#name').val(),
		surname = $('#surname').val();
		$.ajax({
			url: $('#profile-info').attr('action'),
			type: $('#profile-info').attr('method'),
			dataType: 'json',
			beforeSend:function(){
				$('.alert.alert-danger').removeClass('alert alert-danger').text('');
			},
			data: $('#profile-info').serialize(),
			success:function(data){
				if ('success' in data) {
					$('#profile-info-alert').addClass('alert alert-success').text(data.success);
					$('.user-info').text(name);
					$('.user-info.last').text(surname);
				} else{
					$('#profile-info-alert').addClass('alert alert-danger').text(data.error);
				};
			}
		});
	},
	changePassword:function(e){
		e.preventDefault();
		$.ajax({
			url: $('#password').attr('action'),
			type: $('#password').attr('method'),
			dataType: 'json',
			beforeSend:function(){
				$('.has-error').removeClass('has-error');
				$('.alert.alert-danger').removeClass('alert alert-danger');
			},
			data: $('#password').serialize(),
			success:function(data){
				if ('success' in data) {
					$('#password-alert').addClass('alert alert-success').text(data.success);
				} else{
					$('#password-alert').addClass('alert alert-danger').text(data.error);
					if ('id' in data) {
						$('#' + data.id).parent().addClass('has-error');
						if (data.id === 'pass-conf') {
							$('#pass-new').parent().addClass('has-error');
						};
					}else{
						$('#password-alert').parent().parent().each(function(){
							$(this).find('.has-feedback').addClass('has-error');
						});
					};
				};
			}

		});
	}
}
$(document).ready(function() {
	settings.init();
});