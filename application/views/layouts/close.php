<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Konfirmasi</h4>
</div>

<div class="modal-body">



		<h3> Apakah anda yakin ingin menutup pengajuan ? </h3>

	</div>

	<div class="modal-footer">
		<?php echo form_open($url_del, array("class"=>"form-horizontal")); ?>
			<button type="submit" class="btn btn-success btn-md " value="Submit" >Ya</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
			<input  type="hidden" name="id_delete" class="id_delete" value="<?php echo $id_delete;?>">
		<?php echo form_close(); ?>

</div>
