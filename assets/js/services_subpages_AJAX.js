//file where we will implement the functions for sending AJAX calls to the server and change the DOM content 
//upon success for the services pages.


function enableServicesEdit(){

    var btnText = $("#edit-services-content").html();
    var isEnabled = $("#btnSubmitServices").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitServices").prop("disabled", false);                
        $("#edit-services-content").html("Cancel");
        CKEDITOR.instances.editorServicesEnglish.setReadOnly (false);
        CKEDITOR.instances.editorServicesMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitServices").prop("disabled", true);             
        $("#edit-services-content").html("Edit services content");
        CKEDITOR.instances.editorServicesEnglish.setReadOnly (true);
        CKEDITOR.instances.editorServicesMacedonian.setReadOnly (true);
    }

}

function update_services_AJAX(){

	var base_url = $("#base_url").val();	
	var services_english = CKEDITOR.instances.editorServicesEnglish.getData();
	var services_macedonian = CKEDITOR.instances.editorServicesMacedonian.getData();


	$.ajax({
        url: base_url + "staticPagesAdminController/update_services_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorServicesEnglish: services_english,
            editorServicesMacedonian: services_macedonian
        },
        
        success: function(data) {
            if (data) {                
                $("#btnSubmitServices").prop("disabled", true);				
				$("#edit-services-content").html("Edit services content");
				CKEDITOR.instances.editorServicesEnglish.setReadOnly (true);
				CKEDITOR.instances.editorServicesMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
        	$('.success').html('There was an error');        	
        }
    });
    return false;

}


function enableEngineeringEdit(){

    var btnText = $("#edit-engineering-content").html();
    var isEnabled = $("#btnSubmitEngineering").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitEngineering").prop("disabled", false);             
        $("#edit-engineering-content").html("Cancel");
        CKEDITOR.instances.editorEngineeringEnglish.setReadOnly (false);
        CKEDITOR.instances.editorEngineeringMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitEngineering").prop("disabled", true);              
        $("#edit-engineering-content").html("Edit engineering content");                
        CKEDITOR.instances.editorEngineeringEnglish.setReadOnly (true);
        CKEDITOR.instances.editorEngineeringMacedonian.setReadOnly (true);
    }

}

function update_engineering_AJAX(){

    var base_url = $("#base_url").val();    
    var engineering_english = CKEDITOR.instances.editorEngineeringEnglish.getData();
    var engineering_macedonian = CKEDITOR.instances.editorEngineeringMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_engineering_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorEngineeringEnglish: engineering_english,
            editorEngineeringMacedonian: engineering_macedonian
        },
        
        success: function(data) {
            if (data) {                
                $("#btnSubmitEngineering").prop("disabled", true);             
                $("#edit-engineering-content").html("Edit engineering content");
                CKEDITOR.instances.editorEngineeringEnglish.setReadOnly (true);
                CKEDITOR.instances.editorEngineeringMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;


}

function enableSystemIntegrationEdit(){

    var btnText = $("#edit-system-integration-content").html();
    var isEnabled = $("#btnSubmitSystemIntegration").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitSystemIntegration").prop("disabled", false);               
        $("#edit-system-integration-content").html("Cancel");
        CKEDITOR.instances.editorSystemIntegrationEnglish.setReadOnly (false);
        CKEDITOR.instances.editorSystemIntegrationMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitSystemIntegration").prop("disabled", true);                
        $("#edit-system-integration-content").html("Edit vision content");              
        CKEDITOR.instances.editorSystemIntegrationEnglish.setReadOnly (true);
        CKEDITOR.instances.editorSystemIntegrationMacedonian.setReadOnly (true);
    }

}


function update_system_integration_AJAX(){

    var base_url = $("#base_url").val();    
    var system_integration_english = CKEDITOR.instances.editorSystemIntegrationEnglish.getData();
    var system_integration_macedonian = CKEDITOR.instances.editorSystemIntegrationMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_system_integration_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorSystemIntegrationEnglish: system_integration_english,
            editorSystemIntegrationMacedonian: system_integration_macedonian
        },
        
        success: function(data) {
            if (data) {                
                $("#btnSubmitSystemIntegration").prop("disabled", true);             
                $("#edit-system-integration-content").html("Edit system integration content");
                CKEDITOR.instances.editorSystemIntegrationEnglish.setReadOnly (true);
                CKEDITOR.instances.editorSystemIntegrationMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}


function enableConsultingEdit(){

    var btnText = $("#edit-consulting-content").html();
    var isEnabled = $("#btnSubmitConsulting").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitConsulting").prop("disabled", false);              
        $("#edit-consulting-content").html("Cancel");
        CKEDITOR.instances.editorConsultingEnglish.setReadOnly (false);
        CKEDITOR.instances.editorConsultingMacedonian.setReadOnly (false);          
    }
    else{
        $("#btnSubmitConsulting").prop("disabled", true);               
        $("#edit-consulting-content").html("Edit consulting content");              
        CKEDITOR.instances.editorConsultingEnglish.setReadOnly (true);
        CKEDITOR.instances.editorConsultingMacedonian.setReadOnly (true);
    }

}

function update_consulting_AJAX(){

    var base_url = $("#base_url").val();    
    var consulting_english = CKEDITOR.instances.editorConsultingEnglish.getData();
    var consulting_macedonian = CKEDITOR.instances.editorConsultingMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_consulting_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            editorConsultingEnglish: consulting_english,
            editorConsultingMacedonian: consulting_macedonian
        },
        
        success: function(data) {
            if (data) {                
                $("#btnSubmitConsulting").prop("disabled", true);             
                $("#edit-consulting-content").html("Edit consulting content");
                CKEDITOR.instances.editorConsultingEnglish.setReadOnly (true);
                CKEDITOR.instances.editorConsultingMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}