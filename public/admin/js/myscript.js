$(document).ready(function() {
	$('#dataTables-example').DataTable({
			responsive: true
	});
});

function delete_confirm($mgr) {
	if (window.confirm($mgr)) {
		return true;
	}
	return false;
}