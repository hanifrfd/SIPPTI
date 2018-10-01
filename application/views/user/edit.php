<div class="row">
		<div class="col-md-8 col-md-push-2">

			<?php echo form_open('c_user/edit/'.$user['id_user'], array("class"=>"form-horizontal")); ?>
			<div class="panel panel-default">
					<div class="panel-heading" >
							<h3 class="panel-title"><strong>Edit</strong> User</h3>
					</div>
					<input type="hidden"  value="" name="userid">
					<div class="panel-body">
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Tipe User</label>
									<div class="col-md-6 col-xs-12">

										<select name="tipe_user" class="form-control select">
											<option value="">select</option>
											<?php
                                            $tipe_user_values = array(
                                                'Admin'=>'admin',
                                                'Teknisi'=>'teknisi',
                                            );

                                            foreach ($tipe_user_values as $value => $display_text) {
                                                $selected = ($value == $user['tipe_user']) ? ' selected="selected"' : "";

                                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                            }
                                            ?>
										</select>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Bidang</label>
									<div class="col-md-6 col-xs-12">

										<select name="Bidang" class="form-control select">
											<option value="">select</option>
											<?php
                                            $Bidang_values = array(
                                                'Hardware'=>'hardware',
                                                'Software'=>'software',
                                            );

                                            foreach ($Bidang_values as $value => $display_text) {
                                                $selected = ($value == $user['Bidang']) ? ' selected="selected"' : "";

                                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                            }
                                            ?>
										</select>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">User</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="username" value="<?php echo($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" class="form-control" id="username" />
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Password</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="password" value="<?php echo($this->input->post('password') ? $this->input->post('password') : $user['password']); ?>" class="form-control" id="password" />
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Nip</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="Nip" value="<?php echo($this->input->post('Nip') ? $this->input->post('Nip') : $user['Nip']); ?>" class="form-control" id="Nip" />
										</div>
								</div>
					</div>
					<div class="panel-footer">
							<a href="<?php echo base_url()?>C_pengajuanperbaikan/add/" class="btn btn-warning btn-lg">Reset</a>
							<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>
					</div>
			</div>
	<?php echo form_close(); ?>
		</div>
</div>
