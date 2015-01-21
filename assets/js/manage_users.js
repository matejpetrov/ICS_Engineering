jQuery(document).ready(function() {  
	var base_url = $('#base_url').val();
	$('button#delete-user').on('click', function(){
		$(this).parent().parent().addClass('toDelete');
	});
	
	$('#delete-cancel-btn').on('click', function(){
		$('.table-row').removeClass('toDelete');
	});

	$('button#changeRole').on('click', function(){
		$(this).parent().parent().addClass('toChange');
		$.ajax({
			url: base_url + 'admin/changeRole',
			type: 'post',
			dataType: 'json',
			data: {
				id: $('.toChange').attr('id'),
			},

			success:function(data) {
				$('.table-row.toChange').children('#role').text(data.role);
				$('.table-row').removeClass('toChange');
			}
		});	
		return false;		
	});	

	$('.modal-footer').on('click', '#delete-user-confirm', function() {		
		var delete_id = $('.toDelete').attr('id');

		$('#modalDelete').modal('hide');


/*beforeSend: function() {
    $("span.mH").addClass("toDelete");
},*/

$.ajax({
	url: base_url + "admin/deleteUser",
	type: 'POST',
	dataType: 'json',
	cache: false,
	data: {
		id: delete_id,
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
	});
});