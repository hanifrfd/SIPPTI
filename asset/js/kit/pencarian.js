$(document).ready(function() {	
	var UnitKerja;

	$(document).on('change', '#pencarian', function(event) {
		// alert($(this).find(":selected").val() + ' selected val');
		$('.form-pencarian').hide();
		$('.tbpengajuan').empty();
		UnitKerja = $(this).find(":selected").val() + ' selected val';

		$.ajax({
			url: BASE_URL + "API/get_pencarian/" + UnitKerja,
			type: 'get',
			success: function(data) {
				var status;
				// status = data[0]['id_status'];
				// alert(status);

				for (var i in data) {
					if (data[i]['id_status'] == '1') {
						status = "<h5><span class='label label-success'>" + data[i]['Status'] + "</span></h5>";
					} else if (data[i]['id_status'] == '2') {
						status = "<h5><span class='label label-default'>" + data[i]['Status'] + "</span></h5>";
					} else if (data[i]['id_status'] == '3') {
						status = "<h5><span class='label label-warning'>" + data[i]['Status'] + "</span></h5>";
					}
					$('.tbpengajuan').append("<tr><td>" + data[i].id_pengajuan + "</td><td>" + data[i].UnitKerja + "</td><td>" + data[i].Permasalahan + "</td><td>" + data[i].Waktu + "</td><td>" + status + "</td><td><a href='#' class='btn btn-info btn-sm detailButton' data-value='" + data[i].id_pengajuan + "'>Detail</a></td></tr>");
				}
			}
		});
		$(".loading-pencarian").show();
		setTimeout(function() {
			$(".loading-pencarian").hide();
			$('.hasil-pencarian').show().slideDown("slow");
		}, 1500);

	})

	$(document).on('click', '.tambahButton', function(event) {
		// var data = $(this).val();
		// // console.log(data);
		var requrl = BASE_URL + 'C_user/addpengajuan/';

		$.ajax({
			url: requrl,			
			success: function(data) {
				$('#modalkonten').html(data);
			}
		});
	})
	
	$(document).on('click', '.detailButton', function(event) {
		var id_pengajuan = $(this).attr('data-value');
		// alert(id_pengajuan);
		$('.hasil-pencarian').hide();
		$(".loading-pencarian").show();
		$('.form-pencarian').hide();

		$('.detUnit').empty();
		$('.detWaktu').empty();
		$('.detPermasalahan').empty();
		$('.tbdetail').empty();
		$.ajax({
			url: "http://localhost/CI/Skripsi/API/get_detailpengajuan_byPengajuan/" + id_pengajuan,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				for (var i in data) {
					$('.tbdetail').append("<tr><td>" + data[i].id_laporan + "</td><td>" + data[i].permasalahan + "</td><td>" + data[i].waktul + "</td><td>" + data[i].jenisPerbaikan + "</td><td>" + data[i].laporan + "</td><td>" + data[i].solusi + "</td></tr>");
				}

			}
		});
		$.ajax({
			url: "http://localhost/CI/Skripsi/API/get_detailpengajuan/" + id_pengajuan,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				$('.detUnit').html(data[0]['namaUnit']);
				$('.detWaktu').html(data[0]['waktu']);
				$('.detPermasalahan').html(data[0]['permasalahan']);
				if (data[0]['id_status'] == '1') {
					$('.detStatus').html("<h5><span class='label label-success'>" + data[0]['status'] + "</span></h5>");
				} else if (data[0]['id_status'] == '2') {
					$('.detStatus').html("<h5><span class='label label-default'>" + data[0]['status'] + "</span></h5>");
				} else if (data[0]['id_status'] == '3') {
					$('.detStatus').html("<h5><span class='label label-warning'>" + data[0]['status'] + "</span></h5>");
				}
			}
		});


		setTimeout(function() {
			$(".loading-pencarian").hide();
			$('.detail-pencarian').show();
		}, 500);
	})

	

	$(document).on('click', '.detkembali', function(event) {
		$('.detail-pencarian').hide();
		$(".loading-pencarian").show();

		setTimeout(function() {
			$(".loading-pencarian").hide();
			$('.hasil-pencarian').show();
		}, 500);

	})
	$(document).on('click', '.haskembali', function(event) {
		$('.hasil-pencarian').hide();
		$(".loading-pencarian").show();

		setTimeout(function() {
			$(".loading-pencarian").hide();
			$('.form-pencarian').show();
		}, 500);

	})
});