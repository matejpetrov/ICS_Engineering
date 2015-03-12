function enableAudioConferenceEdit(){

    var btnText = $("#edit-audio-conference-content").html();
    var isEnabled = $("#btnSubmitAudioConference").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitAudioConference").prop("disabled", false);                
        $("#edit-audio-conference-content").html("Cancel");
        CKEDITOR.instances.editorAudioConferenceEnglish.setReadOnly (false);
        CKEDITOR.instances.editorAudioConferenceMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitAudioConference").prop("disabled", true);             
        $("#edit-audio-conference-content").html("Edit audio conference content");
        CKEDITOR.instances.editorAudioConferenceEnglish.setReadOnly (true);
        CKEDITOR.instances.editorAudioConferenceMacedonian.setReadOnly (true);
    }

}


function update_audio_conference_AJAX(){

    var base_url = $("#base_url").val();    
    var audio_conference_english = CKEDITOR.instances.editorAudioConferenceEnglish.getData();
    var audio_conference_macedonian = CKEDITOR.instances.editorAudioConferenceMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_audio_conference_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitAudioConference").button('loading');             

        },
        data: {
            editorAudioConferenceEnglish: audio_conference_english,
            editorAudioConferenceMacedonian: audio_conference_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitAudioConference").button('reset');             
                setTimeout(function(){$("#btnSubmitAudioConference").prop("disabled", true);},1);
                $("#edit-audio-conference-content").html("Edit audio conference content");
                CKEDITOR.instances.editorAudioConferenceEnglish.setReadOnly (true);
                CKEDITOR.instances.editorAudioConferenceMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}


function enableCourtRecordingSystemsEdit(){

    var btnText = $("#edit-court-recording-systems-content").html();
    var isEnabled = $("#btnSubmitCourtRecordingSystems").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitCourtRecordingSystems").prop("disabled", false);                
        $("#edit-court-recording-systems-content").html("Cancel");
        CKEDITOR.instances.editorCourtRecordingSystemsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorCourtRecordingSystemsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitCourtRecordingSystems").prop("disabled", true);             
        $("#edit-court-recording-systems-content").html("Edit court recording systems content");
        CKEDITOR.instances.editorCourtRecordingSystemsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorCourtRecordingSystemsMacedonian.setReadOnly (true);
    }

}


function update_court_recording_system_AJAX(){

    var base_url = $("#base_url").val();    
    var court_recording_systems_english = CKEDITOR.instances.editorCourtRecordingSystemsEnglish.getData();
    var court_recording_systems_macedonian = CKEDITOR.instances.editorCourtRecordingSystemsMacedonian.getData();

    $.ajax({
        url: base_url + "staticPagesAdminController/update_court_recording_systems_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitCourtRecordingSystems").button('loading');             

        },
        data: {
            editorCourtRecordingSystemsEnglish: court_recording_systems_english,
            editorCourtRecordingSystemsMacedonian: court_recording_systems_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitCourtRecordingSystems").button('reset');             
                setTimeout(function(){$("#btnSubmitCourtRecordingSystems").prop("disabled", true);},1);
                $("#edit-court-recording-systems-content").html("Edit court recording systems content");
                CKEDITOR.instances.editorCourtRecordingSystemsEnglish.setReadOnly (true);
                CKEDITOR.instances.editorCourtRecordingSystemsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;
}

function enableSecureCommunicationsEdit(){

    var btnText = $("#edit-secure-communications-content").html();
    var isEnabled = $("#btnSubmitSecureCommunications").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitSecureCommunications").prop("disabled", false);                
        $("#edit-secure-communications-content").html("Cancel");
        CKEDITOR.instances.editorSecureCommunicationsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorSecureCommunicationsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitSecureCommunications").prop("disabled", true);             
        $("#edit-secure-communications-content").html("Edit secure communications content");
        CKEDITOR.instances.editorSecureCommunicationsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorSecureCommunicationsMacedonian.setReadOnly (true);
    }
}

function update_secure_communications_AJAX(){

    var base_url = $("#base_url").val();    
    var secure_communications_english = CKEDITOR.instances.editorSecureCommunicationsEnglish.getData();
    var secure_communications_macedonian = CKEDITOR.instances.editorSecureCommunicationsMacedonian.getData();

    $.ajax({
        url: base_url + "staticPagesAdminController/update_secure_communications_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitSecureCommunications").button('loading');             

        },
        data: {
            editorSecureCommunicationsEnglish: secure_communications_english,
            editorSecureCommunicationsMacedonian: secure_communications_macedonian
        },
        
        success: function(data) {
            if (data) {                
                $("#btnSubmitSecureCommunications").button('reset');             
                setTimeout(function(){$("#btnSubmitSecureCommunications").prop("disabled", true);},1);
                $("#edit-secure-communications-content").html("Edit secure communications content");
                CKEDITOR.instances.editorSecureCommunicationsEnglish.setReadOnly (true);
                CKEDITOR.instances.editorSecureCommunicationsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;
}