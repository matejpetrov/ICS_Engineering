$('.nav-menu li').click(function() {
	//$('.nav-menu li').removeClass('selected');
	var element = $(this).attr('class');
	//$(this).addClass('selected');
	alert(element);
	return false;
});	