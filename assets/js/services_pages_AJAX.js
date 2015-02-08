function enableTelecommunicationEdit(){

    var btnText = $("#edit-telecommunication-content").html();
    var isEnabled = $("#btnSubmitTelecommunication").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitTelecommunication").prop("disabled", false);             
        $("#edit-telecommunication-content").html("Cancel");
        CKEDITOR.instances.editorTelecommunicationEnglish.setReadOnly (false);
        CKEDITOR.instances.editorTelecommunicationMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitTelecommunication").prop("disabled", true);              
        $("#edit-telecommunication-content").html("Edit telecommunication content");
        CKEDITOR.instances.editorTelecommunicationEnglish.setReadOnly (true);
        CKEDITOR.instances.editorTelecommunicationMacedonian.setReadOnly (true);
    }

}

function update_telecommunication_AJAX(){

    var base_url = $("#base_url").val();    
    var telecommunication_english = CKEDITOR.instances.editorTelecommunicationEnglish.getData();
    var telecommunication_macedonian = CKEDITOR.instances.editorTelecommunicationMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_services_telecommunication_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorTelecommunicationEnglish: telecommunication_english,
            editorTelecommunicationMacedonian: telecommunication_macedonian
        },
        
        success: function(data) {
            if (data) {
                $('.success').html(data);
                $("#btnSubmitTelecommunication").prop("disabled", true);              
                $("#edit-telecommunication-content").html("Edit telecommunication content");
                CKEDITOR.instances.editorTelecommunicationEnglish.setReadOnly (true);
                CKEDITOR.instances.editorTelecommunicationMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}





function enablePowerSupplyEdit(){

    var btnText = $("#edit-power-supply-content").html();
    var isEnabled = $("#btnSubmitPowerSupply").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitPowerSupply").prop("disabled", false);             
        $("#edit-power-supply-content").html("Cancel");
        CKEDITOR.instances.editorPowerSupplyEnglish.setReadOnly (false);
        CKEDITOR.instances.editorPowerSupplyMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitPowerSupply").prop("disabled", true);              
        $("#edit-power-supply-content").html("Edit power supply content");
        CKEDITOR.instances.editorPowerSupplyEnglish.setReadOnly (true);
        CKEDITOR.instances.editorPowerSupplyMacedonian.setReadOnly (true);
    }

}




function enableAudioVideoEdit(){

    var btnText = $("#edit-audio-video-content").html();
    var isEnabled = $("#btnSubmitAudioVideo").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitAudioVideo").prop("disabled", false);             
        $("#edit-audio-video-content").html("Cancel");
        CKEDITOR.instances.editorAudioVideoEnglish.setReadOnly (false);
        CKEDITOR.instances.editorAudioVideoMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitAudioVideo").prop("disabled", true);              
        $("#edit-audio-video-content").html("Edit audio/video content");
        CKEDITOR.instances.editorAudioVideoEnglish.setReadOnly (true);
        CKEDITOR.instances.editorAudioVideoMacedonian.setReadOnly (true);
    }

}


function enableDefenceSecurityEdit(){

    var btnText = $("#edit-defence-security-content").html();
    var isEnabled = $("#btnSubmitDefenceSecurity").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitDefenceSecurity").prop("disabled", false);             
        $("#edit-defence-security-content").html("Cancel");
        CKEDITOR.instances.editorDefenceSecurityEnglish.setReadOnly (false);
        CKEDITOR.instances.editorDefenceSecurityMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitDefenceSecurity").prop("disabled", true);              
        $("#edit-defence-security-content").html("Edit secure communication content");
        CKEDITOR.instances.editorDefenceSecurityEnglish.setReadOnly (true);
        CKEDITOR.instances.editorDefenceSecurityMacedonian.setReadOnly (true);
    }

}