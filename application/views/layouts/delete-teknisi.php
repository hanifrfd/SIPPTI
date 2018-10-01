<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Konfirmasi</h4>
</div>

<div class="modal-body">



		<h3> Apakah anda yakin ingin menghapus data ? </h3>

	</div>

	<div class="modal-footer">
    <!-- <a href="<?php echo $url_del; ?>" class="btn btn-success btn-md">Ya</a> -->
		<!-- <button type="submit" class="btn tmbl-del btn-success btn-md " value="Submit" >Ya</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
		<input  type="hidden" class="id_delete" name="id_delete" value="<?php echo $id_del;?>">
		<input  type="hidden" class="url" value="<?php echo $url_del;?>"> -->

		<?php echo form_open($url_del, array("class"=>"form-horizontal")); ?>
			<button type="submit" class="btn btn-success btn-md " value="Submit" >Ya</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
			<input  type="hidden" name="id_delete" class="id_delete" value="<?php echo $id_del;?>">
		<?php echo form_close(); ?>


</div>
