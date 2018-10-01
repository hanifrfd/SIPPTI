<!-- START WIDGETS -->
<div class="row">
	<div class="col-md-3">

		<!-- START WIDGET MESSAGES -->
		<div class="widget widget-default widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-bullhorn	"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $baru;?></div>
				<div class="widget-title">Pengajuan Baru</div>
				<!-- <div class="widget-subtitle">In your mailbox</div> -->
			</div>

		</div>
		<!-- END WIDGET MESSAGES -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET REGISTRED -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
			<div class="widget-item-left">
				<span class="fa fa-cogs" style="color:#c5c1c9"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $sedang;?></div>
				<div class="widget-title">Sedang Dikerjakan</div>
			</div>
			<!-- <div class="widget-controls">
				<a href="#" class="widget-control-right widget-refresh" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-refresh"></span></a>

			</div> -->
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>

	<div class="col-md-3">

		<!-- START WIDGET REGISTRED -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
			<div class="widget-item-left">
				<span class="fa fa-check" style="color:#1adb81;"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $selesai;?></div>
				<div class="widget-title">Selesai Dikerjakan</div>
			</div>
			<!-- <div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
			</div> -->
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>

</div>

<div class="row">
	<div class="col-md-12">
			<div class="panel panel-default">

					<div class="panel-heading">
							<h3 class="panel-title">Data Pengajuan</h3>
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
								<table id="tableDataPengajuan" class="table table-bordered  table-actions" style="display:none;">
									<thead>
											<tr>
													<th>No</th>
													<th>Nama Unit</th>
													<th>Permasalahan</th>
													<th>Waktu</th>
													<th>Status</th>
													<th>Option</th>
											</tr>
									</thead>
									<tbody>
										<?php foreach ($all_pengajuan as $pengajuan): ?>
											<tr>
												<td><?php echo $pengajuan['id_pengajuan'] ?></td>
												<td><?php echo $pengajuan['UnitKerja'] ?></td>
												<td><?php echo $pengajuan['Permasalahan'] ?></td>
												<td><?php echo $pengajuan['Waktu'] ?></td>
												<?php if ($pengajuan['id_status']==1): ?>
													<td><h5><span class="label label-success"><?php echo $pengajuan['Status'] ?></span></h5></td>
												<?php endif; ?>
												<?php if ($pengajuan['id_status']==2): ?>
													<td><h5><span class="label label-default"><?php echo $pengajuan['Status'] ?></span></h5></td>
												<?php endif; ?>
												<?php if ($pengajuan['id_status']==3): ?>
													<td><h5><span class="label label-warning"><?php echo $pengajuan['Status'] ?></span></h5></td>
												<?php endif; ?>
												<td>
													<button type="button"class="btn btn-info btn-sm detailButton" data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>">Detail</span>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

							</div>

					</div>
			</div>

	</div>
</div>
<div class="row">
	<div class="col-md-5" >
	    <div class="panel panel-default">

	        <div class="panel-heading">
	            <h3 class="panel-title">Grafik Jumlah Perbaikan Per Bulan</h3>
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
	          <div id="chart-container">
	            <!-- <canvas id="chart-pengajuan-bulan"></canvas> -->
							<canvas id="chart-pengajuan-bulan" class="chart"></canvas>
	          </div>
	        </div>
	    </div>
	</div>
	<div class="col-md-5">
	    <div class="panel panel-default">

	        <div class="panel-heading">
	            <h3 class="panel-title">Grafik Jumlah Perbaikan Per Unit</h3>
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
	          <div id="chart-container">
	            <canvas id="chart-pengajuan-unitkerja"></canvas>
	          </div>
	        </div>
	    </div>

</div>
</div>



<div id="formModal" class="modal fade" role="dialog" style="z-index:1001;">

			<div id="modalkonten">
				//content from ajax loaded here
			</div>

</div>


<!-- END WIDGETS -->

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/datatable_dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kit/chart_dashboard.js"></script>
