		<div class="s">

			<?php echo form_open('c_pengajuanperbaikan/edit/'.$pengajuanperbaikan['id_pengajuan'], array("class"=>"form-horizontal")); ?>
			<div class="panel panel-default">
					<div class="panel-heading" >
							<button type="button" class="close" data-dismiss="modal">&times;</button>	
							<h3 class="panel-title"><strong>INPUT</strong> PENGAJUAN</h3>
					</div>
					<input type="hidden"  value="" name="userid">
					<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Unit Kerja</label>
								<div class="col-md-6 col-xs-12">
									<select name="id_unitKerja" class="form-control" required>
										<?php
                        foreach ($all_unitkerja as $unitkerja) {
                            $selected = ($unitkerja['id_unitKerja'] == $pengajuanperbaikan['id_unitKerja']) ? ' selected="selected"' : "";

                            echo '<option value="'.$unitkerja['id_unitKerja'].'" '.$selected.'>'.$unitkerja['namaUnit'].'</option>';
                        }
                    ?>
									</select>
										<!-- <?php echo form_error('id_unitKerja', '<p style="color:#e51c23;">', '</p>'); ?> -->
								</div>
						</div>
							<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Permasalahan</label>
									<div class="col-md-6 col-xs-12">
										<textarea class="form-control" rows="5" name="permasalahan" required><?php echo($this->input->post('permasalahan') ? $this->input->post('permasalahan') : $pengajuanperbaikan['permasalahan']); ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Tanggal</label>
								<div class="col-md-6 col-xs-12">
									<input type="text" name="tanggal" class="form-control datepicker" value="<?php echo($pengajuanperbaikan['tanggal']); ?>" class="form-control" id="waktu" required />
									<?php echo form_error('tanggal', '<p style="color:#e51c23;">', '</p>'); ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Jam</label>
								<div class="col-md-6 col-xs-12">
									<!-- <input type="text" name="waktu" class="form-control datepicker" value="<?php echo($pengajuanperbaikan['jam']); ?>" class="form-control" id="waktu" /> -->
									<div class="input-group bootstrap-timepicker">
											<input type="text" class="form-control timepicker24" name="jam" value="<?php echo($pengajuanperbaikan['jam']); ?>" required />
											<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>

									</div>
									<!-- <input type="text" class="form-control datepicker" value="2014-08-04"> -->
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Status</label>
								<div class="col-md-6 col-xs-12">
									<select name="id_status" class="form-control " required>

										<?php
                        foreach ($all_statuss as $status) {
                            $selected = ($status['id_status'] == $pengajuanperbaikan['id_status']) ? ' selected="selected"' : "";

                            echo '<option value="'.$status['id_status'].'" '.$selected.'>'.$status['status'].'</option>';
                        }
                    ?>
									</select>

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Teknisi</label>
							</div>
							<?php foreach ($all_teknisi as $teknisi) {
                        ?>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Teknisi</label>
								<div class="col-md-6 col-xs-12">
									<input type="hidden"  value="<?php echo $teknisi['id_notif']; ?>" name="id_notif[]">
											<select name="id_teknisi[]" class="form-control" required>
											<?php

                            foreach ($all_user as $user) {
                                $selected = ($user['id_user'] == $teknisi['id_user']) ? ' selected="selected"' : "";
                                echo '<option value="'.$user['id_user'].'" '.$selected.'>'.$user['username'].'</option>';
                            } ?>

										</select>

									</div>
									<div class="input-group">
										<button type="button" class="btn btn-danger btn-md editteknisi" data-toggle="modal" data-target="#myModal" value="<?php echo $teknisi['id_notif']; ?>">Hapus</button>
									</div>
								</div>
							<?php
                    } ?>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label"></label>
								<div class="col-md-6 col-xs-12">
									<div class="input-group">
										<button type="button" class="btn btn-info btn-md " value="Tambah Teknisi" id="tambahteknisi">Tambah Teknisi</button>

									</div>
								</div>
							</div>

							<div id="adduser">
								</div>
					</div>
					<div class="panel-footer">
							<a href="<?php echo base_url()?>C_pengajuanperbaikan/add/" class="btn btn-warning btn-lg">Reset</a>
							<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>
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

<div class="hidden teknisit">

</div>


<script type="text/javascript">
	$(document).ready(function() {
		$("#tambahteknisi").click(function(e) {
		$('#adduser').append('<div class="form-group teknisi"><label class="col-md-3 col-xs-12 control-label">Teknisi</label><div class="col-md-6 col-xs-12"><select name="id_nonteknisi[]" class="form-control selectpicker nonteknisi-item" required><option value="">Pilih Teknisi</option></select></div><div class="input-group"><button type="button" value="Remove" class="hapusteknisi btn btn-danger btn-md">Hapus</button></div></div>');
		<?php foreach ($all_user as $alluser) {
                        ?>
			var option = '<?php echo "<option value=\'".$alluser["id_user"]."\'> ".$alluser["username"]."</option>" ?>';
			$('.nonteknisi-item').append(option);
		<?php
                    } ?>
	 });
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/kit/addteknisi.js"></script>
