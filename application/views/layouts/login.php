<!DOCTYPE html>
<html lang="en" class="body-full-height">

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSS styles -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
			<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>asset/css/theme-default.css"/>
	    <!-- JS Libs -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="<?php echo base_url();?>asset/js/kit/addteknisi.js"></script>
			<script type="text/javascript">
				var BASE_URL = "<?php echo base_url();?>";
			</script>
	</head>

	<body>

    <div class="login-container lightmode">
			<div class="col-md-3 pull-right" style="margin-top:30px;">
				<a href='<?php echo base_url();?>C_User/beranda' class='btn btn-info btn-lg' ><span class="fa fa-search"></span> Pencarian Pengajuan</a>
			</div>
        <div class="login-box animated fadeInDown">

            <div class="login-logo"></div>
            <div class="login-body">
                <div class="login-title"><strong>Log In</strong></div>
                <?php echo form_open('C_user/login', array("class"=>"form-horizontal")); ?>

                <div class="form-group">
                    <div class="col-md-12">
                        <input name="username" type="text" class="form-control" placeholder="Username"  required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input name="password" type="password" class="form-control" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
											<a href="<?php echo base_url();?>C_user/add" class="btn btn-success btn-block">Daftar</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info btn-block">Log In</button>
                    </div>
                </div>


              <?php echo form_close(); ?>


            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; Sistem Informasi Pengajuan Perbaikan
                </div>
                <div class="pull-right">
                    <!-- <a href="#">About</a> |
                    <a href="#">Privacy</a> |
                    <a href="#">Contact Us</a> -->
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
		<div id="ModalSuccess" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
					</div>
				</div>
		</div>

		<?php if ($this->session->flashdata('msg-insert')) :
                                                                        ?>
			<script type="text/javascript">
			$(document).ready(function() {
				$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/successregister.php");
				$("#ModalSuccess").modal();
			});
			</script>
		<?php endif; ?>
		<?php if ($this->session->flashdata('err-insert')) :
                                                                        ?>
			<script type="text/javascript">
			$(document).ready(function() {
				$("#ModalSuccess").find(".modal-content").load(BASE_URL +"application/views/layouts/errorinsert.php");
				$("#ModalSuccess").modal();
			});
			</script>
		<?php endif; ?>
    <!-- END PAGE CONTAINER -->

		<!-- START PLUGINS -->
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap.min.js"></script>
		<!-- END PLUGINS -->

		<!-- START THIS PAGE PLUGINS-->
		<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/icheck/icheck.min.js'></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>asset/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/owl/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- END THIS PAGE PLUGINS-->

		<!-- START TEMPLATE -->
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/actions.js"></script>

		<!-- END TEMPLATE -->
		<!-- END SCRIPTS -->

	</body>
</html>
