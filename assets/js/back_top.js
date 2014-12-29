jQuery(document).ready(function() {
	var offset = 220;
	var duration = 500;
	$("#go-up").removeClass();
	$("#go-up").addClass("go-up-logo-static");
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			$("#go-up").removeClass();
			$("#go-up").addClass("go-up-logo");
		} else {
			$("#go-up").removeClass();
			$("#go-up").addClass("go-up-logo-static");
		}
	});

	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({
			scrollTop : 0
		}, duration);
		return false;
	});
}); 