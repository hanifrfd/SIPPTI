<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap/bootstrap-datetimepicker.css" />
<div class="row">
		<div class="col-md-6 col-sm-push-3 push-up-30">

			<?php echo form_open('c_laporanperbaikan/edit/'.$laporanperbaikan['id_laporan'], array("class"=>"form-horizontal")); ?>
			<div class="panel panel-default">
					<div class="panel-heading" >
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="panel-title"><strong>EDIT</strong> LAPORAN</h3>
					</div>
					<input type="hidden"  value="" name="userid">
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Jenis Perbaikan</label>
							<div class="col-md-6 col-xs-12">
								<select name="jenisPerbaikan" class="form-control" required>
									<option value="">Pilih Jenis Perbaikan</option>
									<?php
                    $jenisPerbaikan_values = array(
                        'Hardware'=>'Hardware',
                        'Software'=>'Software',
                    );

                    foreach ($jenisPerbaikan_values as $value => $display_text) {
                        $selected = ($value == $laporanperbaikan['jenisPerbaikan']) ? ' selected="selected"' : "";

                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                    }
                    ?>
								</select>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Laporan</label>
							<div class="col-md-6 col-xs-12">
									<textarea class="form-control" rows="5" name="laporan" required><?php echo($this->input->post('laporan') ? $this->input->post('laporan') : $laporanperbaikan['laporan']); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Solusi</label>
							<div class="col-md-6 col-xs-12">
									<textarea class="form-control" rows="5" name="Solusi" required><?php echo($this->input->post('Solusi') ? $this->input->post('Solusi') : $laporanperbaikan['Solusi']); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Tanggal</label>
							<div class="col-md-6 col-xs-12">
								<div class='input-group date' id='datetimepicker2' >
									<input type="text" name="tanggal" class="form-control datepicker" value="<?php echo($laporanperbaikan['tanggal']); ?>" class="form-control" id="waktu" required />
									<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
									</span>
								 </div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Jam</label>
							<div class="col-md-6 col-xs-12">

								<div class="input-group date" id="datetimepicker3">
										<input type="text" class="form-control timepicker24" name="jam" value="<?php echo($laporanperbaikan['jam']); ?>" required />
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>

								</div>

							</div>
						</div>
					</div>
					<div class="panel-footer">
							<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>
					</div>
			</div>

		</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>asset/js/kit/addteknisi.js"></script>
<script type="text/javascript">
					$(function () {
							$('#datetimepicker1').datetimepicker({
				format: 'DD/MM/YYYY HH:mm',

									locale : 'en'
							});
					});
			</script>

	<script type="text/javascript">
					$(function () {
							$('#datetimepicker2').datetimepicker({
				format: 'YYYY/MM/DD',

									locale : 'en'
							});
					});
			</script>

	<script type="text/javascript">
					$(function () {
							$('#datetimepicker3').datetimepicker({
				format: 'LT',

									locale : 'id'
							});
					});
			</script>
