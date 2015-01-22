jQuery(document).ready(function() {
	var current,
	owl = $('#owl-news'),
	allLoaded = false,
	done = true,
	lock = false,
	tempLength = 6,
	base_url = $('#base_url').val(),
	loading = "<div class=\"loading\"><img src=\"http://localhost/ICS_Engineering/assets/images/camera-loader.gif\" /></div>";
	owl.owlCarousel({
		items : 3,
		navigation : true,
		rewindNav : false,
		pagination : false,
		lazyLoad : true,
		navigationText : ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		afterAction : afterAction
	});

	function afterAction() {
		length = this.owl.owlItems.length;
		current = this.owl.currentItem + 3;
		
		if (current == (length) && !(allLoaded) && (done) && !(lock)) {
			owl.data('owlCarousel').addItem(loading);
			owl.data('owlCarousel').jumpTo(length-5);
			owl.data('owlCarousel').goTo(current-2);
			lock=true;
		}

		if (current == (length) && !(allLoaded) && (done) && (lock)) {					
			$.ajax({
				url: base_url + 'staticPagesController/get_all_news_homepage',
				cache:false,
				type: 'post',
				dataType: 'json',
				beforeSend:function() {
					done = false;
				},
				data: 
				{
					offset: (length-1)
				},
				success:function(data) {
					allLoaded = data.allLoaded;
					owl.data('owlCarousel').removeItem(tempLength);
					owl.data('owlCarousel').addItem(data.data);
					owl.data('owlCarousel').jumpTo(tempLength-2);
					tempLength = length;	
				}
			}).done(function(){
				done = true;
				lock = false;

			});
		};
	};
});