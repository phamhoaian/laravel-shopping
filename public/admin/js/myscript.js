$(document).ready(function() {
	$('#dataTables-example').DataTable({
			responsive: true
	});

	$('#btn-add-img').click(function(){
		$('#add_images').append('<div class="form-group"><input type="file" name="fImages[]"></div>');
	});
});

function delete_confirm($mgr) {
	if (window.confirm($mgr)) {
		return true;
	}
	return false;
}