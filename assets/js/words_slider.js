var word = {
	wordShow:function(){
		var fx = Math.floor(Math.random() * 5) + 0;
		//console.log(fx);
		switch(fx){
			case 0:
			this.moveFromRight();
			break;
			case 1:
			this.moveFromLeft();
			break;
			case 2:
			this.moveFromTop();
			break;
			case 3:
			this.moveFromBottom();
			break;
			case 4:
			this.fadeIn();
			break;
		}
	},
	retrieveWord:function(){
		var base_url = $('#base_url').val();
		return $.ajax({
			url: base_url + 'getWord',
			type: 'GET',
			dataType: 'text',
		});	
	},
	destroy:function(){
		$('.cameraContent.cameracurrent').find('div').fadeOut(function() {
			$(this).remove();	
		});
	},
	moveFromRight:function(){
		var recievedWord,
		top = Math.floor(Math.random() * (70-5+1)+ 5) ,
		left = Math.floor(Math.random() * (50-15+1) + 15),
		div=$('<div class=\'wordRight\'></div>');
		this.retrieveWord().done(function(result){
			recievedWord = result;
			div.text(recievedWord);
			$('.cameraContent.cameracurrent').append(div);
			$('.cameraContent.cameracurrent').find('.wordRight').css('top', top + '%');
			$('.cameraContent.cameracurrent').find('.wordRight').delay(500).animate({left:left + '%'});
		});
	},
	moveFromLeft:function(){
		var recievedWord,
		top = Math.floor(Math.random() * (70-5+1)+ 5) ,
		right = Math.floor(Math.random() * (50-15+1) + 15),
		div=$('<div class=\'wordLeft\'></div>');
		this.retrieveWord().done(function(result){
			recievedWord = result;
			div.text(recievedWord);
			$('.cameraContent.cameracurrent').append(div);
			$('.cameraContent.cameracurrent').find('.wordLeft').css('top', top + '%');
			$('.cameraContent.cameracurrent').find('.wordLeft').delay(500).animate({right:right + '%'});
		});
	},
	moveFromTop:function(){
		var recievedWord,
		bottom = Math.floor(Math.random() * (85-23+1) + 23),
		right = Math.floor(Math.random() * (58-15+1) + 15),
		div=$('<div class=\'wordTop\'></div>');
		this.retrieveWord().done(function(result){
			recievedWord = result;
			div.text(recievedWord);
			$('.cameraContent.cameracurrent').append(div);
			$('.cameraContent.cameracurrent').find('.wordTop').css('right', right + '%');
			$('.cameraContent.cameracurrent').find('.wordTop').delay(500).animate({bottom:bottom + '%'});
		});
	},
	moveFromBottom:function(){
		var recievedWord,
		top = Math.floor(Math.random() * (70-5+1)+ 5) ,
		right = Math.floor(Math.random() * (58-15+1) + 15),
		div=$('<div class=\'wordBottom\'></div>');
		this.retrieveWord().done(function(result){
			recievedWord = result;
			div.text(recievedWord);
			$('.cameraContent.cameracurrent').append(div);
			$('.cameraContent.cameracurrent').find('.wordBottom').css('right', right + '%');
			$('.cameraContent.cameracurrent').find('.wordBottom').delay(500).animate({top:top + '%'});
		});
	},
	fadeIn:function(){
		var recievedWord,
		top = Math.floor(Math.random() * (70-5+1)+ 5) ,
		right = Math.floor(Math.random() * (58-15+1) + 15),
		div=$('<div class=\'wordFade\'></div>');
		this.retrieveWord().done(function(result){
			recievedWord = result;
			div.text(recievedWord);
			$('.cameraContent.cameracurrent').append(div);
			$('.cameraContent.cameracurrent').find('.wordFade').css('top', top + '%');
			$('.cameraContent.cameracurrent').find('.wordFade').css('right', right + '%');
			$('.cameraContent.cameracurrent').find('.wordFade').delay(500).animate({opacity:'1'});
		});
	}
};