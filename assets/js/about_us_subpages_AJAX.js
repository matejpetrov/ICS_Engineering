var global;

$(document).ready(function() {
    
    global = $("#page").val();

});

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

        var oldContentEnglish = $("#editorTelecommunicationEnglishOld").val();
        var oldContentMacedonian = $("#editorTelecommunicationMacedonianOld").val();

        CKEDITOR.instances.editorTelecommunicationEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorTelecommunicationMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorTelecommunicationEnglish.setReadOnly (true);
        CKEDITOR.instances.editorTelecommunicationMacedonian.setReadOnly (true);
    }    

}

function update_telecommunication_AJAX(){

    var base_url = $("#base_url").val();    
    var telecommunication_english = CKEDITOR.instances.editorTelecommunicationEnglish.getData();
    var telecommunication_macedonian = CKEDITOR.instances.editorTelecommunicationMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_telecommunication_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitTelecommunication").button('loading');
        },
        data: {
            editorTelecommunicationEnglish: telecommunication_english,
            editorTelecommunicationMacedonian: telecommunication_macedonian,
            page: global
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitTelecommunication").button('reset');
                setTimeout(function(){$("#btnSubmitTelecommunication").prop("disabled", true);},1);
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
            
        var oldContentEnglish = $("#editorPowerSupplyEnglishOld").val();
        var oldContentMacedonian = $("#editorPowerSupplyMacedonianOld").val();

        CKEDITOR.instances.editorPowerSupplyEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorPowerSupplyMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorPowerSupplyEnglish.setReadOnly (true);
        CKEDITOR.instances.editorPowerSupplyMacedonian.setReadOnly (true);
    }

}


function update_power_supply_AJAX(){

    var base_url = $("#base_url").val();    
    var power_supply_english = CKEDITOR.instances.editorPowerSupplyEnglish.getData();
    var power_supply_macedonian = CKEDITOR.instances.editorPowerSupplyMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_power_supply_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitPowerSupply").button('loading');
        },
        data: {
            editorPowerSupplyEnglish: power_supply_english,
            editorPowerSupplyMacedonian: power_supply_macedonian,
            page: global
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitPowerSupply").button('reset');
                setTimeout(function(){$("#btnSubmitPowerSupply").prop("disabled", true);},1);
                $("#edit-power-supply-content").html("Edit power supply content");
                CKEDITOR.instances.editorPowerSupplyEnglish.setReadOnly (true);
                CKEDITOR.instances.editorPowerSupplyMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

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

        var oldContentEnglish = $("#editorAudioVideoEnglishOld").val();
        var oldContentMacedonian = $("#editorAudioVideoMacedonianOld").val();

        CKEDITOR.instances.editorAudioVideoEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorAudioVideoMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorAudioVideoEnglish.setReadOnly (true);
        CKEDITOR.instances.editorAudioVideoMacedonian.setReadOnly (true);
    }

}


function update_audio_video_AJAX(){

    var base_url = $("#base_url").val();    
    var audio_video_english = CKEDITOR.instances.editorAudioVideoEnglish.getData();
    var audio_video_macedonian = CKEDITOR.instances.editorAudioVideoMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_audio_video_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitAudioVideo").button('loading');
        },
        data: {
            editorAudioVideoEnglish: audio_video_english,
            editorAudioVideoMacedonian: audio_video_macedonian,
            page: global
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitAudioVideo").button('reset');              
                setTimeout(function(){$("#btnSubmitAudioVideo").prop("disabled", true);},1);
                $("#edit-audio-video-content").html("Edit audio/video content");
                CKEDITOR.instances.editorAudioVideoEnglish.setReadOnly (true);
                CKEDITOR.instances.editorAudioVideoMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

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

        var oldContentEnglish = $("#editorDefenceSecurityEnglishOld").val();
        var oldContentMacedonian = $("#editorDefenceSecurityMacedonianOld").val();

        CKEDITOR.instances.editorDefenceSecurityEnglish.setData(oldContentEnglish);
        CKEDITOR.instances.editorDefenceSecurityMacedonian.setData(oldContentMacedonian);

        CKEDITOR.instances.editorDefenceSecurityEnglish.setReadOnly (true);
        CKEDITOR.instances.editorDefenceSecurityMacedonian.setReadOnly (true);
    }

}


function update_defence_security_AJAX(){

    var base_url = $("#base_url").val();    
    var defence_security_english = CKEDITOR.instances.editorDefenceSecurityEnglish.getData();
    var defence_security_macedonian = CKEDITOR.instances.editorDefenceSecurityMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_defence_security_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitDefenceSecurity").button('loading');
        },
        data: {
            editorDefenceSecurityEnglish: defence_security_english,
            editorDefenceSecurityMacedonian: defence_security_macedonian,
            page: global
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitDefenceSecurity").button('reset');
                setTimeout(function(){$("#btnSubmitDefenceSecurity").prop("disabled", true);},1);
                $("#edit-defence-security-content").html("Edit security communication content");
                CKEDITOR.instances.editorDefenceSecurityEnglish.setReadOnly (true);
                CKEDITOR.instances.editorDefenceSecurityMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}