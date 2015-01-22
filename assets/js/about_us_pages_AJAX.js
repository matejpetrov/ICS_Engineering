//file where we will implement the functions for sending AJAX calls to the server and change the DOM content upon success.

function update_about_us_AJAX(){

	var base_url = $("#base_url").val();	
	var about_us_english = CKEDITOR.instances.editorAboutUsEnglish.getData();
	var about_us_macedonian = CKEDITOR.instances.editorAboutUsMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_about_us_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorAboutUsEnglish: about_us_english,
            editorAboutUsMacedonian: about_us_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitAboutUs").prop("disabled", true);				
				$("#edit-about-us-content").html("Edit about us content");
				CKEDITOR.instances.editorAboutUsEnglish.setReadOnly (true);
				CKEDITOR.instances.editorAboutUsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;

}


function update_mission_AJAX(){

	var base_url = $("#base_url").val();	
	var mission_english = CKEDITOR.instances.editorMissionEnglish.getData();
	var mission_macedonian = CKEDITOR.instances.editorMissionMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_mission_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorMissionEnglish: mission_english,
            editorMissionMacedonian: mission_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitMission").prop("disabled", true);				
				$("#edit-mission-content").html("Edit mission content");
				CKEDITOR.instances.editorMissionEnglish.setReadOnly (true);
				CKEDITOR.instances.editorMissionMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;

}


function update_vision_AJAX(){

	var base_url = $("#base_url").val();	
	var vision_english = CKEDITOR.instances.editorVisionEnglish.getData();
	var vision_macedonian = CKEDITOR.instances.editorVisionMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_vision_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorVisionEnglish: vision_english,
            editorVisionMacedonian: vision_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitVision").prop("disabled", true);				
				$("#edit-vision-content").html("Edit vision content");
				CKEDITOR.instances.editorVisionEnglish.setReadOnly (true);
				CKEDITOR.instances.editorVisionMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;

}


function update_structure_AJAX(){

	var base_url = $("#base_url").val();	
	var structure_english = CKEDITOR.instances.editorStructureEnglish.getData();
	var structure_macedonian = CKEDITOR.instances.editorStructureMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_structure_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorStructureEnglish: structure_english,
            editorStructureMacedonian: structure_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitStructure").prop("disabled", true);				
				$("#edit-structure-content").html("Edit structure content");
				CKEDITOR.instances.editorStructureEnglish.setReadOnly (true);
				CKEDITOR.instances.editorStructureMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;


}


function update_partners_AJAX(){

	var base_url = $("#base_url").val();	
	var partners_english = CKEDITOR.instances.editorPartnersEnglish.getData();
	var partners_macedonian = CKEDITOR.instances.editorPartnersMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_partners_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorPartnersEnglish: partners_english,
            editorPartnersMacedonian: partners_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitPartners").prop("disabled", true);				
				$("#edit-partners-content").html("Edit partners content");
				CKEDITOR.instances.editorPartnersEnglish.setReadOnly (true);
				CKEDITOR.instances.editorPartnersMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;


}



function update_corporate_info_AJAX(){

	var base_url = $("#base_url").val();	
	var corporate_info_english = CKEDITOR.instances.editorCorporateInfoEnglish.getData();
	var corporate_info_macedonian = CKEDITOR.instances.editorCorporateInfoMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_corporate_info_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorCorporateInfoEnglish: corporate_info_english,
            editorCorporateInfoMacedonian: corporate_info_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitCorporateInfo").prop("disabled", true);				
				$("#edit-corporate-info-content").html("Edit corporate info content");
				CKEDITOR.instances.editorCorporateInfoEnglish.setReadOnly (true);
				CKEDITOR.instances.editorCorporateInfoMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;

}
