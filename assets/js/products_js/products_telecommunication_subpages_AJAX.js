function enableFixedAccessEdit(){

    var btnText = $("#edit-fixed-access-content").html();
    var isEnabled = $("#btnSubmitFixedAccess").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitFixedAccess").prop("disabled", false);                
        $("#edit-fixed-access-content").html("Cancel");
        CKEDITOR.instances.editorFixedAccessEnglish.setReadOnly (false);
        CKEDITOR.instances.editorFixedAccessMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitFixedAccess").prop("disabled", true);             
        $("#edit-fixed-access-content").html("Edit fixed access content");
        CKEDITOR.instances.editorFixedAccessEnglish.setReadOnly (true);
        CKEDITOR.instances.editorFixedAccessMacedonian.setReadOnly (true);
    }

}

function update_fixed_access_AJAX(){

    var base_url = $("#base_url").val();    
    var fixed_access_english = CKEDITOR.instances.editorFixedAccessEnglish.getData();
    var fixed_access_macedonian = CKEDITOR.instances.editorFixedAccessMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_fixed_access_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitFixedAccess").button('loading');
        },
        data: {
            editorFixedAccessEnglish: fixed_access_english,
            editorFixedAccessMacedonian: fixed_access_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitFixedAccess").button('reset');
                setTimeout(function(){$("#btnSubmitFixedAccess").prop("disabled", true);},1);
                $("#edit-fixed-access-content").html("Edit fixed access content");
                CKEDITOR.instances.editorFixedAccessEnglish.setReadOnly (true);
                CKEDITOR.instances.editorFixedAccessMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
return false;

}


function enableTransportEdit(){

    var btnText = $("#edit-transport-content").html();
    var isEnabled = $("#btnSubmitTransport").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitTransport").prop("disabled", false);                
        $("#edit-transport-content").html("Cancel");
        CKEDITOR.instances.editorTransportEnglish.setReadOnly (false);
        CKEDITOR.instances.editorTransportMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitTransport").prop("disabled", true);             
        $("#edit-transport-content").html("Edit transport content");
        CKEDITOR.instances.editorTransportEnglish.setReadOnly (true);
        CKEDITOR.instances.editorTransportMacedonian.setReadOnly (true);
    }

}

function update_transport_AJAX(){

    var base_url = $("#base_url").val();    
    var transport_english = CKEDITOR.instances.editorTransportEnglish.getData();
    var transport_macedonian = CKEDITOR.instances.editorTransportMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_transport_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitTransport").button('loading');
        },
        data: {
            editorTransportEnglish: transport_english,
            editorTransportMacedonian: transport_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitTransport").button('reset');
                setTimeout(function(){$("#btnSubmitTransport").prop("disabled", true);},1);
                $("#edit-transport-content").html("Edit transport content");
                CKEDITOR.instances.editorTransportEnglish.setReadOnly (true);
                CKEDITOR.instances.editorTransportMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}



function enableSolutionsEdit(){

    var btnText = $("#edit-solutions-content").html();
    var isEnabled = $("#btnSubmitSolutions").prop("disabled");

    if(isEnabled && btnText != "Cancel"){
        $("#btnSubmitSolutions").prop("disabled", false);                
        $("#edit-solutions-content").html("Cancel");
        CKEDITOR.instances.editorSolutionsEnglish.setReadOnly (false);
        CKEDITOR.instances.editorSolutionsMacedonian.setReadOnly (false);
    }
    else{
        $("#btnSubmitSolutions").prop("disabled", true);             
        $("#edit-solutions-content").html("Edit solutions content");
        CKEDITOR.instances.editorSolutionsEnglish.setReadOnly (true);
        CKEDITOR.instances.editorSolutionsMacedonian.setReadOnly (true);
    }

}


function update_solutions_AJAX(){

    var base_url = $("#base_url").val();    
    var solutions_english = CKEDITOR.instances.editorSolutionsEnglish.getData();
    var solutions_macedonian = CKEDITOR.instances.editorSolutionsMacedonian.getData();


    $.ajax({
        url: base_url + "staticPagesAdminController/update_solutions_content",
        type: 'POST',
        dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#btnSubmitSolutions").button('loading');
        },
        data: {
            editorSolutionsEnglish: solutions_english,
            editorSolutionsMacedonian: solutions_macedonian
        },
        success: function(data) {
            if (data) {                
                $("#btnSubmitSolutions").button('reset');
                setTimeout(function(){$("#btnSubmitSolutions").prop("disabled", true);},1);
                $("#edit-solutions-content").html("Edit solutions content");
                CKEDITOR.instances.editorSolutionsEnglish.setReadOnly (true);
                CKEDITOR.instances.editorSolutionsMacedonian.setReadOnly (true);
            };
        },
        error: function(data) {
            $('.success').html('There was an error');           
        }
    });
    return false;

}