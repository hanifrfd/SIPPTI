<div class="row">

		<!-- START RESPONSIVE TABLES -->
		<div class="col-md-10 col-md-push-1">
				<div class="panel panel-default">

						<div class="panel-heading">
								<h3 class="panel-title">Data Pengajuan</h3>
								<ul class="panel-controls" style="margin-top: 2px;">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
										<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
										<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
												<ul class="dropdown-menu">
														<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
												</ul>
										</li>
								</ul>
						</div>

						<div class="panel-body panel-body-table">
								<div class="table-responsive">
										<table id="tableDataPengajuan" class="table table-bordered  table-actions datatable" style="display:none;">
											<thead>
													<tr>
															<th>No</th>
															<th>Unit Kerja</th>
															<th>Permasalahan</th>
															<th>Waktu</th>
															<th>Status</th>
															<th>Option</th>
													</tr>
											</thead>
											<tbody>
					              <?php foreach ($pengajuan as $pengajuan): ?>
					                <tr>
					                  <td><?php echo $pengajuan['id_notif'] ?></td>
					                  <td><?php echo $pengajuan['UnitKerja'] ?></td>
					                  <td><?php echo $pengajuan['Permasalahan'] ?></td>
					                  <td><?php echo $pengajuan['Waktu'] ?></td>
														<?php if ($pengajuan['id_status']==1): ?>
															<td><h5><span class="label label-success"><?php echo $pengajuan['Status'] ?></span></h5></td>
														<?php endif; ?>
														<?php if ($pengajuan['id_status']==2): ?>
															<td><h5><span class="label label-default"><?php echo $pengajuan['Status'] ?></span></h5></td>
														<?php endif; ?>
														<?php if ($pengajuan['id_status']==3): ?>
															<td><h5><span class="label label-warning"><?php echo $pengajuan['Status'] ?></span></h5></td>
														<?php endif; ?>
					                  <td>
															<?php if ($pengajuan['Status'] != 'Pengajuan Selesai') {
    ?>																
																<select name="option" class="form-control" id="opsi">
																  <option value="">Pilih Opsi</option>
																  <option class="detailButton" data-toggle="modal" data-target="#formModal"   value="<?php echo $pengajuan['id_pengajuan'] ?>">Detail</option>
																  <option class="tambahButton"   data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>">Tambah Laporan</option>
																	<span class="help-block"></span>
																</select>
															<?php
} else {
        ?>
																<button type="button"class="btn btn-info btn-sm detailButton" data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>">Detail</span>
															<?php
    } ?>
					                  </td>
					                </tr>
					              <?php endforeach; ?>
					            </tbody>
										</table>
								</div>
						</div>
				</div>

		</div>
		<div class="col-md-10 col-md-push-1">
				<div class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title">Data Perbaikan</h3>
								<ul class="panel-controls" style="margin-top: 2px;">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
										<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
										<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
												<ul class="dropdown-menu">
														<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
												</ul>
										</li>
								</ul>
						</div>

						<div class="panel-body panel-body-table">
								<div class="table-responsive">
										<!-- <div class="panel-button">
												<a href='<?php echo base_url();?>C_laporanperbaikan/add/' class="btn btn-info btn-sm pull-right"><span class="fa fa-edit"></span> Tambah data</a>
										</div> -->
										<table id="tableDataLaporan" class="table table-bordered  table-actions datatable" style="display:none;">
											<thead>
													<tr>
															<th>No</th>
															<th>Unit Kerja</th>
															<th>Permasalahan</th>
															<th>Laporan</th>
															<th>Solusi</th>
															<th>Waktu</th>
															<th>Option</th>
													</tr>
											</thead>
											<tbody>
					              <?php foreach ($laporan as $laporan): ?>
					                <tr>
					                  <td><?php echo $laporan['id_laporan'] ?></td>
					                  <td><?php echo $laporan['UnitKerja'] ?></td>
					                  <td><?php echo $laporan['permasalahan'] ?></td>
														<td><?php echo $laporan['laporan'] ?></td>
														<td><?php echo $laporan['solusi'] ?></td>
					                  <td><?php echo $laporan['Waktu'] ?></td>
					                  <td>
															<!-- <button type="button"class="btn btn-info btn-sm editButton" data-toggle="modal" data-target="#formModal" value="<?php echo $laporan['id_laporan'] ?>"><span class="fa fa-edit"></span></button>
															<button type="button"class="btn btn-danger btn-sm deleteButton" data-toggle="modal" data-target="#myModal" value="<?php echo $laporan['id_laporan'] ?>"><span class="fa fa-trash-o"></span></button> -->
															<select name="option" class="form-control" id="opsi">
															  <option value="">Pilih Opsi</option>
															  <option class="detailButton" data-toggle="modal" data-target="#formModal"   value="<?php echo $laporan['id_pengajuan'] ?>">Detail</option>
															  <option class="editButton"   data-toggle="modal" data-target="#formModal" value="<?php echo $laporan['id_laporan'] ?>">Edit</option>
															  <option class="deleteButton" data-toggle="modal" data-target="#myModal"     value="<?php echo $laporan['id_laporan'];?>">Hapus</option>
																<span class="help-block"></span>
															</select>
					                  </td>
					                </tr>
					              <?php endforeach; ?>
					            </tbody>
										</table>
								</div>

						</div>
				</div>

		</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div id="modalContent" class="modal-content">
				//content from ajax loaded here
			</div>
		</div>
</div>

<div id="formModal" class="modal fade" role="dialog">

			<div id="modalkonten">
				//content from ajax loaded here
			</div>

</div>



<?php if ($this->session->flashdata('msg-insert')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/successinsert.php");
		$("#ModalSuccess").modal();
	});
	</script>
<?php elseif ($this->session->flashdata('msg-del')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/successdel.php");
		$("#ModalSuccess").modal();
	});
	</script>
<?php elseif ($this->session->flashdata('msg-update')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/successupdate.php");
		$("#ModalSuccess").modal();
	});
	</script>
<?php
                                                 else :
                                                 endif;?>


<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/datatable_laporan.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('change', '#opsi', function(event) {
			$("#opsi").val($("#target option:first").val());
		})
	});
</script>
