<?php echo form_open('C_user/login', array("class"=>"form-horizontal")); ?>


<div class="form-group">
  <label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>Username</label>
  <div class="col-md-8">
    <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
    <span class="text-danger"><?php echo form_error('username');?></span>
  </div>
</div>
  <div class="form-group">
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Login</button>
    </div>
	</div>

<?php echo form_close(); ?>
