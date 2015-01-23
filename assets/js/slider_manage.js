jQuery(document).ready(function() {        


$( document ).ready(function() {            

    $("#file-input").fileinput(
    {
        'uploadUrl':'http://localhost/ICS_Engineering/admin/add_slider_images',
        'previewFileType':'image',
        'allowedFileExtensions':['jpg','png','gif'],
        'maxFileCount':3
    });

    $('#file-input').on('fileuploaded', function(event, data) {
        $('#modalAddImages').modal('hide');         
        var json = data.response;
        var append_text = "The JSON object is: " + json;
                                        
        $.each(json, function(index,jsonObject){
            new_image_url = jsonObject.new_image_url;
            new_image_id = jsonObject.new_image_id;
            $('#slider-images-container').prepend(                   
                '<span class="image-holder" ><img src="'+new_image_url+'" style="height: 100px;width: 240px;" /><div class="fix"><div class="icon-cancel"><i class="fa fa-times fa-2x" style="height: 20px;width: 25px;" ></i></div><div id="'+new_image_id+'" class="icon"><i class="fa fa-trash-o fa-2x" style="height: 20px;width: 25px;" ></i></div><div class="over" ></div></div></span>'
            );                  
        });        
        console.log('File uploaded triggered');
    });
});


$('#slider-images-container').on("mouseenter", "span.image-holder", function (){
    $(this).addClass('mH');
});

$('#slider-images-container').on("mouseleave", "span.image-holder", function (){
    $(this).removeClass('mH');
    $('.icon').removeAttr("style");
    $('.icon').removeClass('active');
});


    /*$('#slider-images-container').mouseenter(function() {
        $(this).addClass('mH');
    }).mouseleave(function() {
        $(this).removeClass('mH');
        $('.icon').removeAttr("style");
        $('.icon').removeClass('active');
    });*/


$('.fix').on({
    mouseenter: function() {
        $(this).css('background-color', '#E60000');
    },
    mouseleave: function() {
        $(this).css('background-color', '#aa0000');
    }
}, '.active');
$('.fix').on({
    mouseenter: function() {
        $(this).css('background-color', '#737373');
    },
    mouseleave: function() {
        $(this).css('background-color', '#444444');
    }
}, '[class="icon"]');

$('#slider-images-container').on("click", ".icon", function (){
    $(this).animate({
        left: "140px",
        backgroundColor: "#aa0000"
    }, {
        complete: function() {
            $(this).addClass('active');
        }
    });
});
$('#slider-images-container').on("click", ".icon-cancel", function (){
    $('.icon').removeClass('active');
    $('.icon').animate({
        left: "180px",
        backgroundColor: "#444444"
    }, {
        complete: function() {
            $(this).removeClass('active');
        }
    });
});
$('#slider-images-container').on('click', '.active', function() {
    var base_url = $('#base_url').val();
    $.ajax({
        url: base_url + "admin/deleteImageInSlider",
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            id: $(this).attr("id")
        },
        beforeSend: function() {
            $("span.mH").addClass("toDelete");
        },
        success: function(data) {
            if ('success' in data) {
                $('.toDelete').fadeOut(1000, function() {
                    $('.toDelete').remove();
                });
            };
        },
        error: function(data) {}
    });
    return false;
});


$('#modalAddImages').on('hidden.bs.modal', function (e) {
    $('#file-input').fileinput('clear');  
});

});