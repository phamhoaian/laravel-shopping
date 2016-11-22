$(document).ready(function() {
	$('#dataTables-example').DataTable({
			responsive: true
	});

	$('#btn-add-img').click(function(){
		$('#add_images').append('<div class="form-group"><input type="file" name="fProductDetail[]"></div>');
	});

	$('.btn-del-img').on('click', function(){
		var url = baseURL + '/admin/product/del_img/'; 
		var _token = $('form[name="frmEditProduct"]').find('input[name="_token"]').val();
		var image_id = $(this).parent().find("img").attr("image_id");
		var image = $(this).parent().find("img").attr("src");
		$.ajax({
			url: url + image_id,
			type: 'GET',
			cache: false,
			dataType: "json",
			data: {
				"_token": _token,
				"image_id": image_id,
				"image_path": image
			},
			success: function($data){
				if ($data.response)
				{
					$("#" + image_id).remove();
				}
			}
		});
	});
});

function delete_confirm($mgr) {
	if (window.confirm($mgr)) {
		return true;
	}
	return false;
}