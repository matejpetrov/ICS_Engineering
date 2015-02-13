
$(document).ready(function() {
	
	$("#news_title_english").focusout(function() {


		if($(this).val() == ""){
			$(this).parent().addClass("has-error");
			$("#news-title-english-notification").addClass("fa-times");
			$("#basic-addon1").removeClass("sr-only");			
		}

		else{
			$(this).parent().removeClass("has-error");
			$("#news-title-english-notification").removeClass("fa-times");
			$("#basic-addon1").addClass("sr-only");			
		}

	});

	$("#news_title_macedonian").focusout(function() {


		if($(this).val() == ""){
			$(this).parent().addClass("has-error");
			$("#news-title-macedonian-notification").addClass("fa-times");
			$("#basic-addon2").removeClass("sr-only");			
		}

		else{
			$(this).parent().removeClass("has-error");
			$("#news-title-macedonian-notification").removeClass("fa-times");
			$("#basic-addon2").addClass("sr-only");			
		}

	});

	var ckeditor_english = CKEDITOR.instances['editorEnglish'];

	ckeditor_english.on("focusout", function() {

		console.log("Focus out editor english");

		if($(this).html() == ""){			
			$("#basic-addon3").removeClass("sr-only");			
		}

		else{				
			$("#basic-addon3").addClass("sr-only");			
		}

	});

	$("#editorMacedonian").focusout(function() {

		console.log("Focus out editor macedonian");

		if($(this).html() == ""){			
			$("#basic-addon4").removeClass("sr-only");			
		}

		else{				
			$("#basic-addon4").addClass("sr-only");			
		}

	});


});