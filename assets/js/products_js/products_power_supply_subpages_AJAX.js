function enableDcPowerSystemsEdit(){

    var btnText = $("#edit-dc-power-systems-content").html();
    var isEnabled = $("#btnDcPowerSystemsAccess").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnDcPowerSystemsAccess").prop("disabled", false);                
        $("#edit-dc-power-systems-content").html("Cancel");
        CKEDITOR.instances.editorDcPowerSystemsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorDcPowerSystemsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnDcPowerSystemsAccess").prop("disabled", true);             
        $("#edit-dc-power-systems-content").html("Edit DC power systems content");
        CKEDITOR.instances.editorDcPowerSystemsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorDcPowerSystemsMacedonian.setReadOnly (true);
    }

}

function update_dc_power_systems_AJAX(){

    var base_url = $("#base_url").val();    
    var dc_power_systems_english = CKEDITOR.instances.editorDcPowerSystemsEnglish.getData();
    var dc_power_systems_macedonian = CKEDITOR.instances.editorDcPowerSystemsMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_dc_power_systems_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnDcPowerSystemsAccess").button('loading');
        },
        data: {
            editorDcPowerSystemsEnglish: dc_power_systems_english,
            editorDcPowerSystemsMacedonian: dc_power_systems_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnDcPowerSystemsAccess").button('reset');
                setTimeout(function(){$("#btnDcPowerSystemsAccess").prop("disabled", true);},1);
                $("#edit-dc-power-systems-content").html("Edit DC power systems content");
                CKEDITOR.instances.editorDcPowerSystemsEnglish.setReadOnly (true);
                CKEDITOR.instances.editorDcPowerSystemsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}


function enableUpsEdit(){

    var btnText = $("#edit-ups-content").html();
    var isEnabled = $("#btnSubmitUps").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitUps").prop("disabled", false);                
        $("#edit-ups-content").html("Cancel");
        CKEDITOR.instances.editorUpsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorUpsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitUps").prop("disabled", true);             
        $("#edit-ups-content").html("Edit ups content");
        CKEDITOR.instances.editorUpsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorUpsMacedonian.setReadOnly (true);
    }

}


function update_ups_AJAX(){

    var base_url = $("#base_url").val();    
    var ups_english = CKEDITOR.instances.editorUpsEnglish.getData();
    var ups_macedonian = CKEDITOR.instances.editorUpsMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_ups_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitUps").button('loading');
        },
        data: {
            editorUpsEnglish: ups_english,
            editorUpsMacedonian: ups_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitUps").button('reset');
                setTimeout(function(){$("#btnSubmitUps").prop("disabled", true);},1);
                $("#edit-ups-content").html("Edit ups content");
                CKEDITOR.instances.editorUpsEnglish.setReadOnly (true);
                CKEDITOR.instances.editorUpsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}



function enableMonitoringEdit(){

    var btnText = $("#edit-monitoring-content").html();
    var isEnabled = $("#btnSubmitMonitoring").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitMonitoring").prop("disabled", false);                
        $("#edit-monitoring-content").html("Cancel");
        CKEDITOR.instances.editorMonitoringEnglish.setReadOnly (false);
        CKEDITOR.instances.editorMonitoringMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitMonitoring").prop("disabled", true);             
        $("#edit-monitoring-content").html("Edit ups content");
        CKEDITOR.instances.editorMonitoringEnglish.setReadOnly (true);
        CKEDITOR.instances.editorMonitoringMacedonian.setReadOnly (true);
    }

}


function update_monitoring_AJAX(){

    var base_url = $("#base_url").val();    
    var monitoring_english = CKEDITOR.instances.editorMonitoringEnglish.getData();
    var monitoring_macedonian = CKEDITOR.instances.editorMonitoringMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_monitoring_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitMonitoring").button('loading');             
        },
        data: {
            editorMonitoringEnglish: monitoring_english,
            editorMonitoringMacedonian: monitoring_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitMonitoring").button('reset');             
                setTimeout(function(){$("#btnSubmitMonitoring").prop("disabled", true);},1);
                $("#edit-monitoring-content").html("Edit monitoring content");
                CKEDITOR.instances.editorMonitoringEnglish.setReadOnly (true);
                CKEDITOR.instances.editorMonitoringMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}



function enableDataCenterEdit(){

    var btnText = $("#edit-data-center-content").html();
    var isEnabled = $("#btnSubmitDataCenter").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitDataCenter").prop("disabled", false);                
        $("#edit-data-center-content").html("Cancel");
        CKEDITOR.instances.editorDataCenterEnglish.setReadOnly (false);
        CKEDITOR.instances.editorDataCenterMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitDataCenter").prop("disabled", true);             
        $("#edit-data-center-content").html("Edit ups content");
        CKEDITOR.instances.editorDataCenterEnglish.setReadOnly (true);
        CKEDITOR.instances.editorDataCenterMacedonian.setReadOnly (true);
    }

}

function update_data_center_AJAX(){

    var base_url = $("#base_url").val();    
    var data_center_english = CKEDITOR.instances.editorDataCenterEnglish.getData();
    var data_center_macedonian = CKEDITOR.instances.editorDataCenterMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_data_center_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitDataCenter").button('loading');             

        },
        data: {
            editorDataCenterEnglish: data_center_english,
            editorDataCenterMacedonian: data_center_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitDataCenter").button('reset');             
                setTimeout(function(){$("#btnSubmitDataCenter").prop("disabled", true);},1);
                $("#edit-data-center-content").html("Edit data center content");
                CKEDITOR.instances.editorDataCenterEnglish.setReadOnly (true);
                CKEDITOR.instances.editorDataCenterMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}