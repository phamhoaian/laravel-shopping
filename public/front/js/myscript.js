$(document).ready(function(){
	$('.btn-cart-update').click(function(){
		var rowid = $(this).attr('id');
		var qty = $(this).parents().find('.qty').val();
		var token = $("input[name='_token']").val();
		$.ajax({
			url: baseURL + '/cart-update/' + rowid + '/' + qty,
			type: 'GET',
			cache: false,
			dataType: "json",
			data: {
				'rowid': rowid,
				'qty': qty,
				'token': token
			},
			success: function(data){
				if (data.response)
				{
					window.location = baseURL + '/cart';
				}
			}
		});
	});
});