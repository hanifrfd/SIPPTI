$(document).ready(function() {
	$('#tableDataPengajuan').DataTable({
		"order": [
			[0, "desc"]
		],
		"pageLength": 3
	});
	$('#tableDataPengajuan').show();
	// var tabel_datapengajuan = $('#tableDataPengajuan').DataTable({
	// 	"ajax": {
	// 		"url": BASE_URL + "API/get_pengajuan_all",
	// 		"dataSrc": ""
	// 	},
	// 	"columns": [{
	// 			"data": "id_pengajuan",
	// 			render: function(data, type, row, meta) {
	// 				return meta.row + meta.settings._iDisplayStart + 1;
	// 			}
	// 		},
	// 		{
	// 			"data": "UnitKerja"
	// 		},
	// 		{
	// 			"data": "Permasalahan"
	// 		},
	// 		{
	// 			"data": "Waktu"
	// 		},
	// 		{
	// 			"data": "Status"
	// 		},
	// 		{
	// 			"data": "id_pengajuan"
	// 		}
	// 	],
	// 	'columnDefs': [{
	// 		'targets': 5,
	// 		'searchable': false,
	// 		'orderable': false,
	// 		'className': 'dt-body-center',
	// 		'render': function(data) {
	// 			return '<a href=' + BASE_URL + 'C_laporanperbaikan/add/' + data + ' class="btn btn-info btn-sm">Detail</a>';
	// 		}
	// 	}],
	// 	'order': [0, 'desc'],
	// 	"pageLength": 5
	// });

	$(document).on('click', '.deleteButton', function(event) {
		var data = $(this).val();
		// console.log(data);
		var requrl = BASE_URL + 'C_laporanperbaikan/v_deletelaporan';

		$.ajax({
			url: requrl,
			type: 'post',
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