var checkUser = {
	init:function(){
		$('#username').focusout(this.checkUsername);

	},
	checkUsername:function(){
		$('#user-notification').removeClass().addClass('fa fa-spinner fa-spin');
		var base_url = $('#base_url').val();
		$.ajax({
			url: base_url + 'admin/checkUsernameAjax',
			type: 'post',
			dataType: 'json',
			data: {
				username: $('#username').val()
			},
			beforeSend:function(){
				$('#username').parent().removeClass('has-success');
				$('#username').parent().removeClass('has-error');
				$('#username').parent().find('.message-success').removeClass('message-success');
				$('#username').parent().find('.message-error').removeClass('message-error');
			},
			success: function(data){
				if (data.result == 'ok') {
					$('#user-notification').removeClass('fa-spinner fa-spin').addClass('fa-check');
					$('#username').parent().addClass('has-success');
					$('#username').parent().find('.message').addClass('message-success').text("Username available");
				} else{
					$('#user-notification').removeClass('fa-spinner fa-spin').addClass('fa-times');
					$('#username').parent().addClass('has-error');
					$('#username').parent().find('.message').addClass('message-error').text(data.result);
				};
			}

		});
}
};

var checkMail = {
	init:function () {
		$('#email').focusout(this.checkMail);
	},

	checkMail:function(){
		$('#email-notification').removeClass().addClass('fa fa-spinner fa-spin');
		var base_url = $('#base_url').val();
		$.ajax({
			url: base_url + 'admin/checkMailAjax',
			type: 'post',
			dataType: 'json',
			data: {
				email: $('#email').val()
			},
			beforeSend:function(){
				$('#email').parent().removeClass('has-success');
				$('#email').parent().removeClass('has-error');
				$('#email').parent().find('.message-success').removeClass('message-success');
				$('#email').parent().find('.message-error').removeClass('message-error');
			},
			success: function(data){
				if (data.result == 'ok') {
					$('#email-notification').removeClass('fa-spinner fa-spin').addClass('fa-check');
					$('#email').parent().addClass('has-success');
					$('#email').parent().find('.message').addClass('message-success').text("E-mail available");

				} else{
					$('#email-notification').removeClass('fa-spinner fa-spin').addClass('fa-times');
					$('#email').parent().addClass('has-error');
					$('#email').parent().find('.message').addClass('message-error').text(data.result);

				};
			}

		});
}
};

var checkName = {
	init:function() {
		$('#name').focusout(this.checkName);
	},
	checkName:function() {
		$('#name').parent().find('.message-error').removeClass('message-error');
				$('#name').parent().removeClass('has-error');

		if ($('#name').val() == '') {
			$('#name').parent().addClass('has-error');

			$('#name').parent().find('.message').addClass('message-error').text('Name required');
		};
	}
};

var checkSurname = {
	init:function() {
		$('#surname').focusout(this.checkSurname);
	},
	checkSurname:function() {
		$('#surname').parent().find('.message-error').removeClass('message-error');
				$('#surname').parent().removeClass('has-error');

		if ($('#surname').val() == '') {
			$('#surname').parent().addClass('has-error');
			$('#surname').parent().find('.message').addClass('message-error').text('Surname required');
		};
	}

};

$(document).ready(function() {
	checkUser.init();
	checkMail.init();
	checkName.init();
	checkSurname.init();
});