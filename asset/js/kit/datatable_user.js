$(document).ready(function() {
	var tabel_datapengajuan = $('#tableDataUser').DataTable({
		"ajax": {
			"url": BASE_URL + "API/get_user_all",
			"dataSrc": ""

		},
		"columns": [{
				"data": "id_user",
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{
				"data": "username"
			},
			{
				"data": "Nip"
			},
			{
				"data": "Bidang"
			},
			{
				"data": "tipe_user"
			},
			{
				"data": "id_user"
			}
		],
		'columnDefs': [{
				'targets': 5,
				'searchable': false,
				'orderable': false,
				'className': 'dt-body-center',

				'render': function(data) {
					return '<a href=' + BASE_URL + 'C_user/edit/' + data + ' class="btn btn-info btn-sm">Ubah</a><button type="button"class="btn btn-danger btn-sm deleteButton" data-toggle="modal" data-target="#myModal" value="' + data + '">Hapus</button>';
				}
			},
			{
				"width": "10%",
				"targets": 3
			},
			{
				"width": "20%",
				"targets": 4
			},
		]
	});



	$(document).on('click', '.deleteButton', function(event) {
		var data = $(this).val();
		// console.log(data);
		var requrl = BASE_URL + 'C_user/v_deleteuser';

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

});