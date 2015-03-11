$(document).ready(function() {
	var offset = 220;
	var duration = 500;
	$("#go-up").removeClass();
	$("#go-up").addClass("go-up-logo-static");
	$(window).scroll(function() {
		if ($(this).scrollTop() > offset) {
			$("#go-up").removeClass();
			$("#go-up").addClass("go-up-logo");
		} else {
			$("#go-up").removeClass();
			$("#go-up").addClass("go-up-logo-static");
		}
	});

	$('.back-to-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop : 0
		}, duration);
		return false;
	});
}); 