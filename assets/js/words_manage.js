var wordsSend = {
	init:function(){
		$('#delete-en').on('click',{lang:'en'},this.deleteWords);
		$('#delete-mk').on('click',{lang:'mk'},this.deleteWords);
		
		$('#add-en').on('click',{lang:'en',lang_id:0},this.addWords);
		$('#add-mk').on('click',{lang:'mk',lang_id:1},this.addWords);
		
		$('#check-all-en').on('click',{lang:'en'},this.checkAll);
		$('#check-all-mk').on('click',{lang:'mk'},this.checkAll);
		
		$('#uncheck-all-en').on('click',{lang:'en'},this.uncheckAll);
		$('#uncheck-all-mk').on('click',{lang:'mk'},this.uncheckAll);
		
		$('#modal-en').on('shown.bs.modal', function () {
			$('#modal-en').find('#words').focus();
			$('#modal-en').find('#words').addClass('active');
		});
		$('#modal-mk').on('shown.bs.modal', function () {
			$('#modal-mk').find('#words').focus();
			$('#modal-mk').find('#words').addClass('active');
		});
	},

	deleteWords:function(param) {
		var base_url = $('#base_url').val(),
		word = [];
		$('#' + param.data.lang).find('input[class="'+ param.data.lang +'"]:checked').each( function() {
			word.push($(this).val());
		});
		$.ajax({
			url: base_url + 'admin_images_controller/deleteWords',
			type: 'post',
			dataType: 'text',
			data: {words: word},
			success:function(data) {
				$.each(word, function(index, val) {
					$('input[value="'+ val +'"]:checked').parent().fadeOut();
				});
			}
		});
	},

	addWords:function(param){
		var base_url = $('#base_url').val(),
		words = $('#modal-'+param.data.lang).find('#words').val();
		words = words.replace(/\r?\n/g, ';');

		$.ajax({
			url: base_url + 'admin_images_controller/addWords',
			type: 'post',
			dataType: 'json',
			data: {
				words: words,
				lang:param.data.lang_id
			},
			success:function(data) {
				console.log(data);
				$('#modal-' + param.data.lang).modal('hide');
				var a; 
				$.each(data, function(index, val) {
					a=$('<li></li>').text(val);
					a.prepend('<input class="'+ param.data.lang +'" type="checkbox" value="'+ index +'" />');
					$('#' + param.data.lang).append(a);
				});
				$('#words').val('');
			}
		});	
	},
	checkAll:function(param) {
		console.log('checkAll');
		$('#' + param.data.lang).find('input[class="'+ param.data.lang +'"]').each( function() {
			$(this).prop('checked', true);
		});
	},
	uncheckAll:function(param){
		$('#' + param.data.lang).find('input[class="'+ param.data.lang +'"]:checked').each( function() {
			$(this).prop('checked', false);
		});
	}
}

$(document).ready(function() {
	wordsSend.init();
});