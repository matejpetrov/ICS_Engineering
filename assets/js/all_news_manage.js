$(document).ready(function() {  

	$('a.delete-link').on('click', function(){
		$(this).parent().parent().addClass('toDelete');
		$(this).parent().parent().children('td').children('.news_main_image').addClass('toRemove');
	});
	
	$('#delete-cancel-btn').on('click', function(){
		$('.table-row').removeClass('toDelete');
		$('.news_main_image').removeClass('toRemove');
	});

	$('.modal-footer').on('click', '#delete-news-btn', function() {		
		var delete_id = $('.toDelete').attr('id');
		var base_url = $('#base_url').val();
		var news_image_url_news = $('.toRemove').attr('src');

		$('#modalDelete').modal('hide');
		

/*beforeSend: function() {
    $("span.mH").addClass("toDelete");
},*/

		$.ajax({
            url: base_url + "admin/delete_news",
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                id: delete_id,
                news_image_url: news_image_url_news
            },
            
            success: function(data) {
                if (data) {
                    $('.toDelete').fadeOut(1000, function() {
                        $('.toDelete').remove();
                    });					
                };
            },
            error: function(data) {
            	alert('There was an error');
            }
        });
        return false;

	});

	$('#modalDelete').on('hidden.bs.modal', function (e) {
	  $('.table-row').removeClass('toDelete');
	  $('.news_main_image').removeClass('toRemove');
	});
});