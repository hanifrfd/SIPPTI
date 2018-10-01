<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
<div class="row">
		<div class="col-md-6 col-sm-push-3 push-up-30">

			<?php echo form_open('c_pengajuanperbaikan/add', array("class"=>"form-horizontal")); ?>
			<div class="panel panel-default">
					<div class="panel-heading" >
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="panel-title"><strong>INPUT</strong> PENGAJUAN</h3>
					</div>

					<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Unit Kerja</label>
								<div class="col-md-6 col-xs-12">
										<select name="id_unitKerja" class="form-control" required="true">
											<option value="">Pilih Unit Kerja</option>
											<?php
                      foreach ($all_unitkerja as $unitkerja) {
                          $selected = ($unitkerja['id_unitKerja'] == $this->input->post('id_unitKerja')) ? ' selected="selected"' : "";

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
													<!-- <input type="text" name="permasalahan" value="<?php echo $this->input->post('permasalahan'); ?>" class="form-control" id="permasalahan" /> -->
													<textarea class="form-control" rows="5" name="permasalahan" required><?php echo $this->input->post('permasalahan'); ?></textarea>
									</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Pilih Teknisi</label>

								<!-- <div class="col-md-6 col-xs-12">
									<div class="input-group">
										<button type="button" class="btn btn-info btn-md " value="Tambah Teknisi" id="tambahteknisi">Tambah Teknisi</button>
										<?php echo form_error('id_teknisi[]', '<p style="color:#e51c23;">', '</p>'); ?>
									</div>

								</div> -->
								<div class="col-md-6 col-xs-12">
								<select name="cteknisi[]" class="form-control cteknisi">
									<option value="">Pilih Teknisi</option>
									<?php foreach ($all_user as $alluser) {
                          ?>
									<?php echo "<option value='".$alluser["id_user"]."'> ".$alluser["username"]."</option>" ;
                      }?>
								</select>
								<div class="input-group tteknisi">
									<button type="button" class="btn btn-info btn-md" value="Tambah Teknisi" id="tambahteknisi">Tambah Teknisi</button>
								</div>
								</div>
							</div>

							<div id="adduser"></div>
							<div class="form-group">

							</div>
					<div class="panel-footer">
							<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>
					</div>
			</div>
		<input type="hidden" name="waktu" class="waktu" value="">
	<?php echo form_close(); ?>
		</div>
</div>

<div class="hidden addt">
	<div class="form-group teknisi">
		<label class="col-md-3 col-xs-12 control-label">Teknisi</label>
		<div class="col-md-6 col-xs-12">

			<select name="id_teknis[]" class="form-control" required>
				<option value="">Pilih Teknisi</option>
				<?php foreach ($all_user as $alluser) {
                          ?>
				<?php echo "<option value='".$alluser["id_user"]."' class='nteknisi'> ".$alluser["username"]."</option>" ;
                      }?>
			</select>

		</div>
		<div class="input-group">
			<button type="button" value="Remove" class="hapusteknisi btn btn-danger btn-md">Hapus</button>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		var time = moment().format('YYYY-MM-DD hh:mm:ss');
		$('.waktu').val(time);

		// $("#tambahteknisi").click(function(e) {
		// 	$('#adduser').append($('.addt').html());
	 	// });
		$("#tambahteknisi").click(function(e) {
			if($("select[name*='cteknisi[]'").val().length != 0){
				$(".twarning").remove();
				var id_user = $("select[name*='cteknisi[]'").val();
				var username = $(".cteknisi option:selected").text();
				// alert (username);
				$('#adduser').append('<div class="form-group teknisi">	<label class="col-md-3 col-xs-12 control-label"></label>	<div class="col-md-6 col-xs-12"><input name="id_teknisi[]" value="'+ id_user +'" hidden></input><p class="form-control">'+ username +'</p></div><div class="input-group"><button type="button" value="Remove" class="hapusteknisi btn btn-danger btn-md">Hapus</button></div></div>');

					$(".cteknisi").val($("#target option:first").val());
			}
			else{
				$('.tteknisi').append('<p class="twarning" style="color:#e51c23;"> Pilih Teknisi</p>');
			}
	 	});
		$(".hapusteknisi").click(function(e) {
			 $(this).parent().remove();
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/kit/addteknisi.js"></script>
