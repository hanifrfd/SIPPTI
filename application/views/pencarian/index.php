<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS styles -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>asset/css/theme-default.css" />
	<!-- JS Libs -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap-3.3.7.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-ui.min.js"></script>	
	<script type="text/javascript">
		var BASE_URL = "<?php echo base_url();?>";
	</script>

</head>

<body>

	<div class="login-container lightmode">

		<div class="col-md-3 pull-right" style="margin-top:30px;">
			<a href='<?php echo base_url();?>C_User' class='btn btn-info btn-lg'><span class="fa fa-user"></span> Login</a>
			<!-- <button type="button" class="btn btn-info btn-md tambahButton" data-toggle="modal" data-target="#formModal">Tambah
				Pengajuan</button> -->
		</div>

		<div class="row form-pencarian animated fadeInDown" style="margin-top:110px;">
			<div class="col-md-2 col-md-offset-3">
			</div>
			<img class="loading" src="<?php echo base_url();?>asset/img/loaders/default.gif" alt="" style="display:none;">
			<img src="<?php echo base_url();?>asset/img/logo/logo.png" class="img-responsive" alt="logo" width="250" height="250">			
			<div class="row">
				<div class="col-md-5" style="margin-left:33%;">
					<div class="col-md-10">
						<h5>Pencarian Pengajuan Perbaikan</h5>
						<select name="id_unitKerja" class="form-control select" data-live-search="true" id="pencarian">
							<option value="">Pilih Unit Kerja</option>
							<?php
                    foreach ($all_unitkerja as $unitkerja) {
                        $selected = ($unitkerja['id_unitKerja'] == $this->input->post('id_unitKerja')) ? ' selected="selected"' : "";

                        echo '<option value="'.$unitkerja['id_unitKerja'].'" '.$selected.'>'.$unitkerja['namaUnit'].'</option>';
                    }
                ?>
							<span class="help-block"></span>
						</select>
					</div>
					<!-- <div class="col-md-2">
							<button type="submit" class="btn btn-success btn-md " value="Submit" >Submit</button>
						</div> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 center" style="margin-left:43%; margin-top:2%;">
					<button type="button" class="btn btn-danger btn-lg tambahButton" data-toggle="modal" data-target="#formModal">Buat
						Pengajuan Baru</button>
				</div>
			</div>
		</div>
		<div class="row hasil-pencarian" style="margin-top:110px; display:none;">
			<div class="col-md-6 col-md-offset-3">
				<div class="row">
					<div class="">

					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title tbtitle">Hasil Pencarian</h3>
						<ul class="panel-controls">
							<a href='#' class='btn btn-info btn-sm haskembali'>Kembali</a>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>UnitKerja</th>
									<th>Permasalahan</th>
									<th>Waktu</th>
									<th>Status</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody class="tbpengajuan">
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">


			</div>
		</div>
		<div class="row detail-pencarian" style="margin-top:110px; display:none;">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title tbtitle">Detail Pencarian</h3>
						<ul class="panel-controls">
							<a href='#' class='btn btn-info btn-sm detkembali' data-value='" + data[i].id_pengajuan + "'>Kembali</a>
						</ul>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<label for="">UnitKerja</label>
							</div>
							<div class="col-md-3 detUnit">

							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="">Waktu Pengajuan</label>
							</div>
							<div class="col-md-3 detWaktu">

							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="">Permasalahan</label>
							</div>
							<div class="col-md-3 detPermasalahan">

							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="">Status</label>
							</div>
							<div class="col-md-3 detStatus">

							</div>
						</div>
						<div class="col-md-12">
							<h3 class="panel-title tbtitle">Perbaikan Yang Dilakukan</h3>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Permasalahan</th>
										<th>Waktu</th>
										<th>JenisPerbaikan</th>
										<th>Laporan</th>
										<th>Solusi</th>
									</tr>
								</thead>
								<tbody class="tbdetail">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row loading-pencarian" style="margin-top:300px; display:none;">
			<div class="col-md-2 col-md-offset-4">
			</div>
			<img src="<?php echo base_url();?>asset/img/loaders/default.gif" alt="">
		</div>
		<div id="formModal" class="modal fade" role="dialog" style="z-index:1001;">

			<div id="modalkonten">
				//content from ajax loaded here
			</div>
		</div>
		<div id="ModalSuccess" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				</div>
			</div>
		</div>
		<?php if ($this->session->flashdata('msg-insert')) : ?>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#ModalSuccess").find(".modal-content").load(BASE_URL + "application/layouts/successinsert.php");
				$("#ModalSuccess").modal();
			});
		</script>
		<?php endif;?>
	</div>
	<!-- END PAGE CONTENT WRAPPER -->

	<!-- END PAGE CONTAINER -->

	<!-- START PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap.min.js"></script> -->
	<!-- END PLUGINS -->

	<!-- START THIS PAGE PLUGINS-->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/morris/raphael-min.js"></script> -->
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/icheck/icheck.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/owl/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-select.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/pencarian.js"></script>
	<!-- END THIS PAGE PLUGINS-->

	<!-- START TEMPLATE -->
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/actions.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/datatables/jquery.dataTables.min.js"></script>

	<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/demo_dashboard.js"></script> -->
	<!-- END TEMPLATE -->
	<!-- END SCRIPTS -->

</body>

</html>
