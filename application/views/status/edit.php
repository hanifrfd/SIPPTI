<?php echo form_open('c_status/edit/'.$status['id_status'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $status['status']); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="keterangan" class="col-md-4 control-label">Keterangan</label>
		<div class="col-md-8">
			<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $status['keterangan']); ?>" class="form-control" id="keterangan" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>