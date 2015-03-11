
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


	$("#save-news-btn").on("click", function(event){

		if($("#news_title_english").val() == ""){

			if($("#news_title_english").parent().hasClass("has-error") == false){
				$("#news_title_english").parent().addClass("has-error");
				$("#news-title-english-notification").addClass("fa-times");
				$("#basic-addon1").removeClass("sr-only");
			}			

			event.preventDefault();
			console.log("The button is clicked, but nothing happens");

			console.log("Content of English Editor: " + "Matej");

		}

		if($("#news_title_macedonian").val() == ""){

			if($("#news_title_macedonian").parent().hasClass("has-error") == false){
				$("#news_title_macedonian").parent().addClass("has-error");
				$("#news-title-macedonian-notification").addClass("fa-times");
				$("#basic-addon2").removeClass("sr-only");
			}			

			var ckeditor_english = CKEDITOR.instances['editorEnglish'].getData();

			event.preventDefault();			

		}

		var ckeditor_english = CKEDITOR.instances['editorEnglish'].getData();		
		var ckeditor_macedonian = CKEDITOR.instances['editorMacedonian'].getData();		

		if( !(ckeditor_english.length > 0) ){
			$("#basic-addon3").removeClass("sr-only");
			console.log("Content of english editor must not be empty");
			event.preventDefault();	
		}

		if( !(ckeditor_macedonian.length > 0) ){
			$("#basic-addon4").removeClass("sr-only");
			console.log("Content of macedonian editor must not be empty");
			event.preventDefault();	
		}


	});


});