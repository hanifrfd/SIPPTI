$(document).ready(function() {

	$('#tableDataPengajuan').DataTable({
		"order": [
			[0, "desc"]
		],
		// "columnDefs": [{
		// 	"width": "20%",
		// 	"targets": 2
		// }],
		"pageLength": 5
	});
	$('#tableDataPengajuan').show();

	$(document).on('change', '#opsi', function() {
		$("#opsi").val($("#target option:first").val());
	})

	$(document).on('click', '.tambahButton', function() {
		// console.log(data);
		var requrl = BASE_URL + 'C_pengajuanperbaikan/add';

		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				$('#modalkonten').html(data);
			}
		});
	})

	$(document).on('click', '.detailButton', function() {
		$('#modalkonten').empty();
		var data = $(this).val();
		var requrl = BASE_URL + 'C_pengajuanperbaikan/detail/' + data;
		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				// console.log(data);
				$('#modalkonten').html(data);
			},
			error: function (request, status, error) {
				$('#modalkonten').html('data tidak ditemukan');
			}
			
		});
	})

	$(document).on('click', '.editButton', function() {
		$('#modalkonten').empty();
		var data = $(this).val();
		// console.log(data);
		var requrl = BASE_URL + 'C_pengajuanperbaikan/edit/' + data;

		$.ajax({
			url: requrl,
			type: 'post',
			success: function(data) {
				$('#modalkonten').html(data);
			}
		});
	})

	$(document).on('click', '.deleteButton', function() {
		var data = $(this).val();
		// console.log(data);
		// alert(data);
		var requrl = BASE_URL + 'C_pengajuanperbaikan/delpengajuan/' + data;

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