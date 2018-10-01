<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
<div class="row">
	<div class="col-md-6 col-sm-push-3 push-up-30">

		<?php echo form_open('c_pengajuanperbaikan/add', array("class"=>"form-horizontal")); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="panel-title"><strong>TAMBAH</strong> PENGAJUAN</h3>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label">Unit Kerja</label>
					<div class="col-md-6 col-xs-12">
						<select name="id_unitKerja" class="form-control select" data-live-search="true" required="true">
							<option value="">Pilih Unit Kerja</option>
							<?php
                                        foreach ($all_unitkerja as $uk) {
                                            echo '<option value="'.$uk['id_unitKerja'].'" '.$selected.'>'.$uk['namaUnit'].'</option>';
                                        }
                                        ?>
						</select>

						<!-- <?php echo form_error('id_unitKerja', '<p style="color:#e51c23;">', '</p>'); ?> -->
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label">Permasalahan</label>
					<div class="col-md-6 col-xs-12">
						<!-- <input type="text" name="permasalahan" value="<?php echo $this->input->post('permasalahan'); ?>" class="form-control" id="permasalahan" /> -->
						<textarea class="form-control" rows="5" name="permasalahan" required><?php echo $this->input->post('permasalahan'); ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label">Pilih Teknisi</label>
					<div class="col-md-6 col-xs-12"><input type="text" class="form-control" id="teknisiSearch" placeholder="Pencarian teknisi"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label"></label>
					<div class="col-md-3 col-xs-12">
						<table id="tableDataTeknisi" class="table table-striped table-bordered table-actions" style="display:none;">
							<thead>
								<tr>
									<th></th>
									<th>Username</th>
									<th>Bidang</th>
									<th>Pengajuan Baru</th>
									<th>Sedang Dikerjakan</th>
									<th>Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($all_teknisi as $teknisi): ?>
								<tr>
									<td>
										<?php echo $teknisi['id_user'] ?>
									</td>
									<td>
										<?php echo $teknisi['username'] ?>
									</td>
									<td>
										<?php echo $teknisi['Bidang'] ?>
									</td>
									<td>
										<?php echo $teknisi['baru'] ?>
									</td>
									<td>
										<?php echo $teknisi['sedang'] ?>
									</td>
									<td>
										<?php echo $teknisi['selesai'] ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>


				<div class="panel-footer">
					<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit">Submit</button>
				</div>
			</div>
			<input type="hidden" name="waktu" class="waktu" value="">
			<?php echo form_close(); ?>
		</div>
	</div>





	<script type="text/javascript">
		$(document).ready(function () {
			var time = moment().format('YYYY-MM-DD hh:mm:ss');
			$('.waktu').val(time);

			var table = $('#tableDataTeknisi').DataTable({
				'paging': false,
				'bFilter': false,
				'ordering': false,
				'searching': true,
				'dom': 't',

				columnDefs: [{
					'targets': 0,
					'searchable': false,
					'orderable': false,
					'className': 'dt-body-center',
					'render': function (data) {
						return '<input type="checkbox" class="select" name="teknisi[]" value="' + data + '">';
					}
				}],
				initComplete: function () {
					$('div.toolbar').html(
						'<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>');
				}
			});
			$('#tableDataTeknisi').show();
			$('#teknisiSearch').keyup(function () {
				table.search($(this).val()).draw();
			});

		});

	</script>
	<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/kit/addteknisi.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/datatable_pengajuan.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-select.js"></script>
