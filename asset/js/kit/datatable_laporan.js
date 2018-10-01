$(document).ready(function() {

	$('#tableDataPengajuan').DataTable({
		"order": [
			[0, "desc"]
		],
		"pageLength": 5
	});
	$('#tableDataPengajuan').show();
	$('#tableDataLaporan').DataTable({
		"order": [
			[0, "desc"]
		],
		"pageLength": 5
	});
	$('#tableDataLaporan').show();

	$(document).on('click', '.tambahButton', function(event) {
		var data = $(this).val();
		// console.log(data);
		var requrl = BASE_URL + 'C_laporanperbaikan/add/' + data;

		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				$('#modalkonten').html(data);
			}
		});
	})
	$(document).on('click', '.editButton', function(event) {
		var data = $(this).val();
		// console.log(data);
		var requrl = BASE_URL + 'C_laporanperbaikan/edit/' + data;

		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				$('#modalkonten').html(data);
			}
		});
	})
	$(document).on('click', '.deleteButton', function(event) {
		var data = $(this).val();
		console.log(data);
		// alert(data);
		var requrl = BASE_URL + 'C_laporanperbaikan/remove/' + data;

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


	$(document).on('click', '.detailButton', function(event) {
		var data = $(this).val();

		var requrl = BASE_URL + 'C_pengajuanperbaikan/detail/' + data;

		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				console.log(data);
				$('#modalkonten').html(data);
			}
		});
	})

});