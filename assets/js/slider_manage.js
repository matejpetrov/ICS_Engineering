jQuery(document).ready(function() {
    $('span.image-holder').mouseenter(function() {
        $(this).addClass('mH');
    }).mouseleave(function() {
        $(this).removeClass('mH');
        $('.icon').removeAttr("style");
        $('.icon').removeClass('active');
    });
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
    $('.icon').click(function() {
        $(this).animate({
            left: "140px",
            backgroundColor: "#aa0000"
        }, {
            complete: function() {
                $(this).addClass('active');
            }
        });
    });
    $('.icon-cancel').click(function() {
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
    $('.fix').on('click', '.active', function() {
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
});