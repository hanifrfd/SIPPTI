<?php echo form_open('c_unitkerja/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="namaUnit" class="col-md-4 control-label">NamaUnit</label>
		<div class="col-md-8">
			<input type="text" name="namaUnit" value="<?php echo $this->input->post('namaUnit'); ?>" class="form-control" id="namaUnit" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>