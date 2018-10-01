<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
<div class="row">
	<div class="col-md-6 col-sm-push-3 push-up-30">
	
		<?php echo form_open('C_user/addpengajuan', array("class"=>"form-horizontal")); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="panel-title"><strong>TAMBAH</strong> PENGAJUAN</h3>
				<div class="waktus"></div>
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
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label">Permasalahan</label>
					<div class="col-md-6 col-xs-12">
						<!-- <input type="text" name="permasalahan" value="<?php echo $this->input->post('permasalahan'); ?>" class="form-control" id="permasalahan" /> -->
						<textarea class="form-control" rows="5" name="permasalahan" required><?php echo $this->input->post('permasalahan'); ?></textarea>
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit">Submit</button>
				</div>
			</div>
			<input type="hidden" name="waktu" class="waktu" value="">
			<input type="hidden" name="id_user" value="10">
			<?php echo form_close(); ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			var time = moment().format('YYYY-MM-DD hh:mm:ss');
			$('.waktu').val(time);			
		});
	</script>
