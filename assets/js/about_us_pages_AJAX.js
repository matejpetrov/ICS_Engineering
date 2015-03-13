//file where we will implement the functions for sending AJAX calls to the server and change the DOM content 
//upon success for the about us pages.

function enableAboutUsEdit(){

    var btnText = $("#edit-about-us-content").html();
    var isEnabled = $("#btnSubmitAboutUs").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitAboutUs").prop("disabled", false);             
        $("#edit-about-us-content").html("Cancel");        
        CKEDITOR.instances.editorAboutUsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorAboutUsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitAboutUs").prop("disabled", true);              
        $("#edit-about-us-content").html("Edit about us content");

        var oldContentEnglish = $("#editorAboutUsEnglishOld").val();
        var oldContentMacedonian = $("#editorAboutUsMacedonianOld").val();

        CKEDITOR.instances.editorAboutUsEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorAboutUsMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorAboutUsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorAboutUsMacedonian.setReadOnly (true);
    }

}


function update_about_us_AJAX(){

    var base_url = $("#base_url").val();    
    var about_us_english = CKEDITOR.instances.editorAboutUsEnglish.getData();
    var about_us_macedonian = CKEDITOR.instances.editorAboutUsMacedonian.getData();
    var text = $("#btnSubmitAboutUs").text();

    $.ajax({
        url: base_url + "staticPagesAdminController/update_about_us_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitAboutUs").button('loading');
        },
        data: {
            editorAboutUsEnglish: about_us_english,
            editorAboutUsMacedonian: about_us_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitAboutUs").button('reset');
                setTimeout(function(){$("#btnSubmitAboutUs").prop("disabled", true);},1);
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


function enableMissionEdit(){

    var btnText = $("#edit-mission-content").html();
    var isEnabled = $("#btnSubmitMission").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitMission").prop("disabled", false);             
        $("#edit-mission-content").html("Cancel");        
        CKEDITOR.instances.editorMissionEnglish.setReadOnly (false);
        CKEDITOR.instances.editorMissionMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitMission").prop("disabled", true);              
        $("#edit-mission-content").html("Edit mission/vision content");             
        
        var oldContentEnglish = $("#editorMissionEnglishOld").val();
        var oldContentMacedonian = $("#editorMissionMacedonianOld").val();

        CKEDITOR.instances.editorMissionEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorMissionMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorMissionEnglish.setReadOnly (true);
        CKEDITOR.instances.editorMissionMacedonian.setReadOnly (true);
    }

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
        beforeSend:function(){
            $("#btnSubmitMission").button('loading');
        },
        data: {
            editorMissionEnglish: mission_english,
            editorMissionMacedonian: mission_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitMission").button('reset');
                setTimeout(function(){$("#btnSubmitMission").prop("disabled", true);},1);
                $("#edit-mission-content").html("Edit mission/vision content");
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


function enablePartnersEdit(){

    var btnText = $("#edit-partners-content").html();
    var isEnabled = $("#btnSubmitPartners").prop("disabled");           

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitPartners").prop("disabled", false);                
        $("#edit-partners-content").html("Cancel");
        CKEDITOR.instances.editorPartnersEnglish.setReadOnly (false);
        CKEDITOR.instances.editorPartnersMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitPartners").prop("disabled", true);             
        $("#edit-partners-content").html("Edit partners content");     

        var oldContentEnglish = $("#editorPartnersEnglishOld").val();
        var oldContentMacedonian = $("#editorPartnersMacedonianOld").val();

        CKEDITOR.instances.editorPartnersEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorPartnersMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorPartnersEnglish.setReadOnly (true);
        CKEDITOR.instances.editorPartnersMacedonian.setReadOnly (true);
    }

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
        beforeSend:function(){
            $("#btnSubmitPartners").button('loading');
        },
        data: {
            editorPartnersEnglish: partners_english,
            editorPartnersMacedonian: partners_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitPartners").button('reset');
                setTimeout(function(){$("#btnSubmitPartners").prop("disabled", true);},1);
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

function enableCorporateInfoEdit(){

    var btnText = $("#edit-corporate-info-content").html();
    var isEnabled = $("#btnSubmitCorporateInfo").prop("disabled");          

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitCorporateInfo").prop("disabled", false);               
        $("#edit-corporate-info-content").html("Cancel");
        CKEDITOR.instances.editorCorporateInfoEnglish.setReadOnly (false);
        CKEDITOR.instances.editorCorporateInfoMacedonian.setReadOnly (false);
    }
    else{        

        $("#btnSubmitCorporateInfo").prop("disabled", true);                
        $("#edit-corporate-info-content").html("Edit company information content");          

        var oldContentEnglish = $("#editorCorporateInfoEnglishOld").val();
        var oldContentMacedonian = $("#editorCorporateInfoMacedonianOld").val();

        CKEDITOR.instances.editorCorporateInfoEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorCorporateInfoMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorCorporateInfoEnglish.setReadOnly (true);
        CKEDITOR.instances.editorCorporateInfoMacedonian.setReadOnly (true);
    }

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
        beforeSend:function(){
            $("#btnSubmitCorporateInfo").button('loading');
        },
        data: {
            editorCorporateInfoEnglish: corporate_info_english,
            editorCorporateInfoMacedonian: corporate_info_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitCorporateInfo").button('reset');
                setTimeout(function(){$("#btnSubmitCorporateInfo").prop("disabled", true);},1);
                $("#edit-corporate-info-content").html("Edit company information content");
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
