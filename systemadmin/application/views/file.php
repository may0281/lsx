	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/lodash.compat.min.js"></script>

	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/libs/html5shiv.js"></script>
	<![endif]-->
	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/event.swipe/jquery.event.swipe.js"></script>
	<!-- General -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/excanvas.min.js"></script>
	<![endif]-->
	<!-- Noty -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>
	<!-- Forms -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script>
	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>
<script>
	$(document).ready(function(){
		"use strict";
		App.init();
		Plugins.init();
		FormComponents.init();
	});
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootbox/bootbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>
	<div id="content">
			<div class="container">
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">File Upload</a>
						</li>
					</ul>
					<ul class="crumb-buttons">
						<li>
							<a data-toggle="modal" href="#uploadfile" ><i class="icon-plus"></i><span>Upload File</span></a>
						</li>
					</ul>
					<div class="modal fade" id="uploadfile">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<form class="form-horizontal row-border" id="validate-1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>file/upload">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Upload File</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="col-md-3 control-label">File Upload:</label>
											<div class="col-md-9">
												<input type="file" name="file" class="form-control required"  data-style="fileinput">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" >Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="page-header">
					<div class="page-title">
						<h3>File Upload</h3>
					
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="widget">
							<div class="widget-content">
								<div class="row">
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> Managed User</h4>
												<div class="toolbar no-padding">
													<div class="btn-group">
														<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
													</div>
												</div>
											</div>
											<div class="widget-content">
												<table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="30">
													<thead>
													<tr>
														<th>#</th>
														<th>File name</th>
														<th>Url</th>
														<th>Del</th>
													</tr>
													</thead>
													<tbody>
														<?php
														$serverUrl = explode('systemadmin',base_url());
														$i=1;foreach ($files as $r) {
														if($r == '.' or $r == '..' or $r == '.DS_Store'){}else{
														?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $r?></td>
															<td><a href="<?php echo $serverUrl[0].'upload/'.$r;?>" target="_blank"><?php echo $serverUrl[0].'upload/'.$r;?></a></td>
															<td><a href="<?php echo base_url(); ?>file/delete/<?php echo $r; ?>" title="Del"><i class="icon-remove-sign" style="font-size:20px;"></i> </a></td>
														</tr>
														<?php $i++; } }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
