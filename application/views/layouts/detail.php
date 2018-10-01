<div class="row">
		<div class="col-md-6 col-sm-push-3 push-up-30">
      <div class="panel panel-default">
          <div class="panel-heading">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="panel-title tbtitle">Detail Pencarian</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3">
                <label for="">UnitKerja</label>
              </div>
              <div class="col-md-3 detUnit">
								<?php echo $detail_pengajuan['namaUnit']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Waktu Pengajuan</label>
              </div>
              <div class="col-md-3 detWaktu">
								<?php echo $detail_pengajuan['waktu']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Permasalahan</label>
              </div>
              <div class="col-md-3 detPermasalahan">
								<?php echo $detail_pengajuan['permasalahan']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Username Pelapor</label>
              </div>
              <div class="col-md-3 detPermasalahan">
								<?php echo $detail_pengajuan['username']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Status</label>
              </div>
              <div class="col-md-3 detStatus">
								<?php if ($detail_pengajuan['id_status']==1): ?>
									<h5><span class="label label-success"><?php echo $detail_pengajuan['status'] ?></span></h5>
								<?php endif; ?>
								<?php if ($detail_pengajuan['id_status']==2): ?>
									<h5><span class="label label-default"><?php echo $detail_pengajuan['status'] ?></span></h5>
								<?php endif; ?>
								<?php if ($detail_pengajuan['id_status']==3): ?>
									<h5><span class="label label-warning"><?php echo $detail_pengajuan['status'] ?></span></h5>
								<?php endif; ?>
              </div>
            </div>
						<div class="row">
              <div class="col-md-2">
                <label for="">Teknisi</label>
              </div>
              <div class="col-md-3">
              <?php foreach ($all_teknisi as $teknisi) {                
                echo ($teknisi['username']." ");                
                }?>              
              </div>
            </div>
            <div class="col-md-12">
              <h3 class="panel-title tbtitle">Perbaikan Yang Dilakukan</h3>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Permasalahan</th>
                          <th>Waktu</th>
                          <th>JenisPerbaikan</th>
                          <th>Laporan</th>
                          <th>Solusi</th>
                      </tr>
                  </thead>
                  <tbody class="tbdetail">
                  </tbody>
              </table>
            </div>
          </div>
      </div>

		</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var id_pengajuan = "<?php echo $id_pengajuan; ?>";
	$.ajax({
		url: BASE_URL + "API/get_detailpengajuan_byPengajuan/" + id_pengajuan,
		type: 'get',
		dataType: 'json',
		success: function(data) {
			// console.log(data);
			// $('.detUnit').html(data[0]['namaUnit']);
			// $('.detWaktu').html(data[0]['waktup']);
			// $('.detPermasalahan').html(data[0]['permasalahan']);
			// $('.detStatus').html(data[0]['status']);
			for (var i in data) {
				$('.tbdetail').append("<tr><td>" + data[i].id_laporan + "</td><td>" + data[i].permasalahan + "</td><td>" + data[i].waktul + "</td><td>" + data[i].jenisPerbaikan + "</td><td>" + data[i].laporan + "</td><td>" + data[i].solusi + "</td></tr>");
			}
		}
	});
	// $.ajax({
	// 	url: BASE_URL + "API/get_teknisipengajuan/" + id_pengajuan,
	// 	type: 'get',
	// 	dataType: 'json',
	// 	success: function(data) {
	// 		// console.log(data);
	// 		for (var i in data) {
	// 			$('.detTeknisi').append(data[i].username + " ");
	// 		}
	// 	}
	// });
});
</script>
