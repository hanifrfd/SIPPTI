<div class="row">
		<!-- START RESPONSIVE TABLES -->
		<div class="col-md-10 col-md-push-1">
				<div class="panel panel-default">
					<button type="button" class="btn btn-info btn-md tambahButton push-up-10 push-down-10" style="margin-left:3%;" data-toggle="modal" data-target="#formModal">Tambah Pengajuan</button>
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
										<div class="panel-button">
												<!-- <a href='<?php echo base_url();?>C_pengajuanperbaikan/add/' class="btn btn-info btn-md pull-right"><span class="fa fa-edit"></span> Tambah Pengajuan</a> -->

										</div>
										<div class="row loading-pencarian"  style="display:none;" >
											<div class="col-md-2 col-md-offset-4">
											</div>
											<img src="<?php echo base_url();?>asset/img/loaders/default.gif" alt="">
										</div>
										<table id="tableDataPengajuan" class="table table-bordered  table-actions" style="display:none;">
											<thead>
					                <tr>
					                    <th>No</th>
					                    <th>Nama Unit</th>
					                    <th>Permasalahan</th>
					                    <th>Waktu</th>
					                    <th>Status</th>
					                    <th>Option</th>
					                </tr>
					            </thead>
					            <tbody>
					              <?php foreach ($all_pengajuan as $pengajuan): ?>
					                <tr>
					                  <td><?php echo $pengajuan['id_pengajuan'] ?></td>
					                  <td><?php echo $pengajuan['UnitKerja'] ?></td>
					                  <td><?php echo $pengajuan['Permasalahan'] ?></td>
					                  <td><?php echo $pengajuan['Waktu'] ?></td>

														<?php if ($pengajuan['id_status']==1): ?>
															<td><span class="label label-success"><?php echo $pengajuan['Status'] ?></span></td>
														<?php endif; ?>
														<?php if ($pengajuan['id_status']==2): ?>
															<td><span class="label label-default"><?php echo $pengajuan['Status'] ?></span></td>
														<?php endif; ?>
														<?php if ($pengajuan['id_status']==3): ?>
															<td><span class="label label-warning"><?php echo $pengajuan['Status'] ?></span></td>
														<?php endif; ?>
					                  <td>
															<select name="option" class="form-control" id="opsi">
															  <option value="">Pilih Opsi</option>
															  <option class="detailButton" data-toggle="modal" data-target="#formModal"   value="<?php echo $pengajuan['id_pengajuan'] ?>">Detail</option>
															  <option class="editButton"   data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>">Edit</option>
															  <option class="deleteButton" data-toggle="modal" data-target="#myModal"     value="<?php echo $pengajuan['id_pengajuan'];?>">Hapus</option>
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

<div id="myModal" class="modal fade" role="dialog" style="z-index:1002;">
		<div class="modal-dialog">
			<div id="modalContent" class="modal-content">
				//content from ajax loaded here
			</div>
		</div>
</div>
<div id="formModal" class="modal fade" role="dialog" style="z-index:1001;">

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

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/datatable_pengajuan.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$(document).on('click', '.tmbl-del', function(event) {
		var datas = $(".id_delete").val();
		var url = $(".url").val();

		// console.log(datas);
		$.ajax({
			url: url,
			type: 'post',
			data: {
				'id_delete': datas
			},
			success: function(data) {
					console.log(data);
   				$('#myModal').modal('toggle');
					// $('#formModal').modal('toggle');

					$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/successdel.php");
					$("#ModalSuccess").modal();

					$('#formModal').find("#modalkonten").load("http://localhost/CI/Skripsi/C_pengajuanperbaikan/edit/"+ data);
					$("#formModal").modal();
					// $('#formModal').modal('toggle');
			}
		});
	})

});
</script>
