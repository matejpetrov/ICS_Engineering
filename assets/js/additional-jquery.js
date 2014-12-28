$(document).ready(function(){
	var pathname=window.location.pathname;
	var array=pathname.split('/');
	var numEl=array.length-1;
	var last = array[numEl];
	if (last != "") {		
		$('#' + last).addClass('selected');
	}else{
		$('#home').addClass('selected');
	};
});