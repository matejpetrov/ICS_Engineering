$(document).ready(function() {
	verify.init();
});
var verify = {
	init:function(){
		$('#form-complete').on('submit',this.verifyPassword);
	},
	verifyPassword:function(e){
		$("div").find('p').remove('p');
		var password = $('#password').val(),
			confirm = $('#confirm-password').val();
		if (password.length<6 || password.length>32 ) {
			p = $('<p class="message message-error">Password must be between<br>6 and 32 characters</p>')
			$('#password').parent().append(p);
			return false;
		}else if(password != confirm) {
			p = $('<p class="message message-error">Passwords don\'t match</p>')
			$('#confirm-password').parent().append(p);
			return false;
		}else{
			return true;
		};
	}
}