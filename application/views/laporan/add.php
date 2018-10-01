<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
<div class="row">
		<div class="col-md-6 col-sm-push-3 push-up-30">

			<?php echo form_open('c_laporanperbaikan/add/'.$pengajuanperbaikan['id_pengajuan'], array("class"=>"form-horizontal")); ?>
			<div class="panel panel-default">
					<div class="panel-heading" >
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="panel-title"><strong>INPUT</strong> LAPORAN</h3>
					</div>
					<input type="hidden"  value="" name="userid">
					<div class="panel-body">
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Unit Kerja</label>
										<div class="col-md-6 col-xs-12">
                      <h5> <?php echo $pengajuanperbaikan['namaUnit'] ?></h5>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Permasalahan</label>
										<div class="col-md-6 col-xs-12">
											<h5> <?php echo $pengajuanperbaikan['permasalahan'];?></h5>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Teknisi</label>
										<div class="col-md-6 col-xs-12">
											<?php foreach ($all_teknisi as $teknisi): ?>
											<h5> <?php echo $teknisi['username'];?></h5>	<br>
											<?php endforeach; ?>
										</div>
								</div>

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
                            $selected = ($value == $this->input->post('jenisPerbaikan')) ? ' selected="selected"' : "";

                            echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                        }
                        ?>
										</select>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Laporan</label>
										<div class="col-md-6 col-xs-12">
												<textarea class="form-control" rows="5" name="laporan" required><?php echo $this->input->post('laporan'); ?></textarea>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Solusi</label>
										<div class="col-md-6 col-xs-12">
												<textarea class="form-control" rows="5" name="Solusi" required><?php echo $this->input->post('Solusi'); ?></textarea>
										</div>
								</div>



					</div>
					<div class="panel-footer">
							<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>
					</div>
			</div>
			<input type="hidden" name="waktu" class="waktu" value="">
	<?php echo form_close(); ?>
		</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var time = moment().format('YYYY-MM-DD hh:mm:ss');
		$('.waktu').val(time);
	});
</script>
