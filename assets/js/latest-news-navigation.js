$(document).ready(function() {
	
	$(".latest_news_table").on('click', 'tr', function(event) {
		event.preventDefault();
		
		var base_url = $("#base_url").val();
		var url = $("#get_news_url").val();

		var news_url = $(this).attr('id');

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			cache: false,
			beforeSend:function(){
				$('.news-container').find('#loading').addClass('loading-news');
			},
			data: {
				news_url: news_url
			},
		})
		.done(function(data) {			
			if(data){
				//change the content and change the url, to represent the currently displayed news. 				 
				$(".current_news_title").find("h1").html(data.title);
				$(".current_news_image").attr({src: base_url + data.news_image_url});								
				$(".current_news_content").html(data.content).append('<div style="height: 50px;"></div>');		

				var pathname = window.location.pathname;

				var pathname_array = pathname.split('/');								

				window.history.pushState("", "", window.location.href.replace(pathname_array[pathname_array.length - 1], data.news_url));

				put_padding();
				$('.news-container').find('#loading').removeClass('loading-news');

			}			
		})
		.fail(function() {
			//display a view that contains an error message that the news cannot be loaded. 
			console.log("error");
		})		
		
		//console.log("The url is " + url);

	});

	function put_padding(){

		$('img:not([class])').css('padding-right', '20px');
		$('img:not([class])').addClass('img-responsive');

	}	

});