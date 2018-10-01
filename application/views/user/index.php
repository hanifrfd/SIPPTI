<div class="row">

		<!-- START RESPONSIVE TABLES -->
		<div class="col-md-6">
				<div class="panel panel-default">

						<div class="panel-heading">
								<h3 class="panel-title">Data User</h3>
								<ul class="panel-controls" style="margin-top: 2px;">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
										<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
										<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
												<ul class="dropdown-menu">
														<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
												</ul>
										</li>
								</ul>
						</div>

						<div class="panel-body panel-body-table">
								<div class="table-responsive">
									<div class="panel-button">
											<a href='<?php echo base_url();?>C_user/add/' class="btn btn-info btn-sm pull-right"><span class="fa fa-edit"></span> Tambah data</a>
									</div>
										<table id="tableDataUser" class="table table-bordered  table-actions datatable">
											<thead>
													<tr>
															<th>No</th>
															<th>Username</th>
															<th>NIP</th>
															<th>Bidang</th>
															<th>Tipe</th>
															<th>Option</th>
													</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
								</div>

						</div>
				</div>

		</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div id="modalContent" class="modal-content">
				//content from ajax loaded here
			</div>
		</div>
</div>

<?php if ($this->session->flashdata('msg-insert')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL+"C_user/v_berhasil_insert");
		$("#ModalSuccess").modal();
	});
	</script>
<?php elseif ($this->session->flashdata('msg-del')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL+"C_user/v_success_delete");
		$("#ModalSuccess").modal();
	});
	</script>
<?php elseif ($this->session->flashdata('msg-update')) :
                                                                ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ModalSuccess").find(".modal-content").load(BASE_URL+"C_user/v_success_update");
		$("#ModalSuccess").modal();
	});
	</script>
<?php
                                                 else :
                                                 endif;?>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/datatable_user.js"></script>
