$(document).ready(function() {

	$(document).on('click', '.editteknisi', function(event) {
		var data = $(this).val();
		console.log(data);
		var requrl = BASE_URL + 'C_pengajuanperbaikan/delteknisi/' + data;

		$.ajax({
			url: requrl,
			type: 'get',
			data: {
				'id_delete': data
			},
			success: function(data) {
				$('#modalContent').html(data);
			}
		});
	})

});