$(document).ready(function() {
	$.ajax({
		url: BASE_URL + 'API/get_pengajuan_ByUser',
		type: 'get',
		dataType: 'json',

		success: function(data) {
			console.log(data);
			// $('.list-group-contact').html('aoakds');
			for (var i = 0; i < data.length; i++) {
				$('#notifpengajuan').append('<a href="' + BASE_URL + 'C_laporanperbaikan/index" class="list-group-item notif"><span class="contacts-title">Unit Kerja : ' + data[i]['UnitKerja'] + '</span><p>Permasalahan : ' + data[i]['Permasalahan'] + '</p></a>');
				// $('#notifpengajuan').append('<button type="button" class="btn btn-danger btn-md detailButton" ">'+ data[i]['Permasalahan'] + '</button>');
			}
		}
	});

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

	$.ajax({
		url: BASE_URL + 'API/get_jumNotif_ByUser',
		type: 'get',

		success: function(data) {
			console.log(data);
			// $('.list-group-contact').html('aoakds');
			if (data != 0) {
				$('.notif-tmbl').after('<div class="informer informer-danger jum_notifbaru">' + data + '</div>');
				$('.judul-notif').after('<div class="pull-right"><span class="label label-danger">' + data + ' pengajuan baru</span></div>')
			}
		}
	});

	$(".notif").click(function() {
		$.ajax({
			url: BASE_URL + 'C_user/clear_notif',
			type: 'get',
			success: function(data) {
				console.log(data);
			}
		});
	});

});