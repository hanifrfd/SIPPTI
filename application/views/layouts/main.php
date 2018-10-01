<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS styles -->
	<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>asset/css/theme-default.css" />

	<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>asset/css/datatables/select.dataTables.min.css" />	
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/chart/Chart.min.js"></script>
	<script type="text/javascript">
		var BASE_URL = "<?php echo base_url();?>";

	</script>
</head>

<body>
	<div class="page-container">

		<!-- START PAGE SIDEBAR -->
		<div class="page-sidebar">
			<!-- START X-NAVIGATION -->
			<ul class="x-navigation">
				<li class="xn-logo">
					<a href="index.html">SI-PPTI</a>
					<a href="#" class="x-navigation-control"></a>
				</li>
				<li class="xn-title">Username :
					<?php echo $this->session->userdata('username'); ?>
				</li>
				<li class="active">
					<a href="<?php echo base_url();?>C_pengajuanperbaikan/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
				</li>
				<li class="xn">
					<a href="<?php echo base_url();?>C_pengajuanperbaikan"><span class="fa fa-file-o"></span> <span class="xn-text">Pengajuan</span></a>
				</li>
				<li class="xn">
					<a href="<?php echo base_url();?>C_laporanperbaikan"><span class="fa fa-table"></span> <span class="xn-text">Perbaikan</span></a>
				</li>
			</ul>
			<!-- END X-NAVIGATION -->
		</div>
		<!-- END PAGE SIDEBAR -->
		<!-- PAGE CONTENT -->
		<div class="page-content">

			<!-- START X-NAVIGATION VERTICAL -->
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
				<!-- TOGGLE NAVIGATION -->
				<li class="xn-icon-button">
					<a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
				</li>
				<!-- END TOGGLE NAVIGATION -->

				<!-- SIGN OUT -->
				<li class="xn-icon-button pull-right">
					<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
				</li>
				<!-- END SIGN OUT -->
				<li class="xn-icon-button pull-right">
					<a href="#"><span class="fa fa-comments notif-tmbl"></span></a>

					<!-- <div class="informer informer-danger jum_notifbaru"></div> -->
					<div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
						<div class="panel-heading">
							<h3 class="panel-title judul-notif"><span class="fa fa-comments"></span> Notif Pengajuan</h3>
							
							<!-- <div class="pull-right">
													<span class="label label-danger"><jumlah class="jum_notifbaru"></jumlah> pengajuan baru</span>
											</div> -->
						</div>
						<div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
							<div id="notifpengajuan">								
							</div>
						</div>
						<div class="panel-footer text-center">
							<a href="<?php echo base_url();?>C_laporanperbaikan/index">Show all messages</a>
						</div>
					</div>
				</li>

			</ul>
			<!-- END X-NAVIGATION VERTICAL -->

			<!-- START BREADCRUMB -->
			<ul class="breadcrumb">
				<!-- <li><a href="#">Home</a></li>
					<li class="active">Dashboard</li> -->
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap" style="padding-bottom: 5%;">

				<?php	if (isset($_view) && $_view) {
    $this->load->view($_view);
}
                    ?>
				<div class="col-md-4">

				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->

	<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
		<div class="mb-container">
			<div class="mb-middle">
				<div class="mb-title"><span class="fa fa-sign-out"></span> Keluar</div>
				<div class="mb-content">
					<p>Apakah anda yakin untuk keluar?</p>
				</div>
				<div class="mb-footer">
					<div class="pull-right">
						<a href="<?php echo base_url(); ?>C_User/logout" class="btn btn-success btn-lg">Ya</a>
						<button class="btn btn-default btn-lg mb-control-close">Tidak</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="ModalSuccess" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>
	<div id="formModal" class="modal fade" role="dialog" style="z-index:1001;">

		<div id="modalkonten">
			//content from ajax loaded here
		</div>

	</div>

	<!-- START PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- END PLUGINS -->

	<!-- START THIS PAGE PLUGINS-->
	<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/icheck/icheck.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/owl/owl.carousel.min.js"></script>


	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>

	<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-file-input.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-select.js"></script>

	<!-- END THIS PAGE PLUGINS-->

	<!-- START TEMPLATE -->

	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/actions.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/datatables/dataTables.select.min.js"></script>

	<!-- END TEMPLATE -->
	<!-- END SCRIPTS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/main.js"></script>

</body>

</html>
