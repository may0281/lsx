<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
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

	<!-- Page specific plugins -->
	<!-- Charts -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/excanvas.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.growraf.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/blockui/jquery.blockUI.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fullcalendar/fullcalendar.min.js"></script>

	<!-- Noty -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.time.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootbox/bootbox.min.js"></script>

	<!-- Demo JS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/pages_calendar.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/charts/chart_filled_blue.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/charts/chart_simple.js"></script>
	<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">User</a>
						</li>
											
					</ul>
					<ul class="crumb-buttons">
						<li>
							<a data-toggle="modal" href="#myModal1" ><i class="icon-plus"></i><span>Create User</span></a>
						</li>

					</ul>
					<div class="modal fade" id="myModal1">
						<div class="modal-dialog">
							<div class="modal-content">
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>user/createUser">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">เปลี่ยนรหัสผ่าน</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Username :</label>
										<div class="col-md-9">
											<input type="text" name="Username" class="form-control required" placeholder="Example : user@mail.com">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Name :</label>
										<div class="col-md-9">
											<input type="text" name="Name" class="form-control required" placeholder="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Role :</label>
										<div class="col-md-9">
											<select name="role" class="form-control required">
												<option value="admin">Admin</option>
												<option value="blog">Blog</option>
												<option value="product">Product</option>

											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Password <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="password" name="pass1" class="form-control required" minlength="5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Confirm Password <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="password" name="cpass1" class="form-control required" minlength="5" equalTo="[name='pass1']">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary" >Save changes</button>
								</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Dashboard</h3>
					
					</div>
				</div>
				<!-- /Page Header -->
				 <!-- /.row -->
				<!-- /Blue Chart -->
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
														<th>ID</th>
														<th>Enable</th>
														<th>Username</th>
														<th>Name</th>
														<th>Role</th>
														<th>Del</th>
													</tr>
													</thead>
													<tbody>
													<?php  $i=1;foreach ($q as $r) { ?>

													<tr>
														<td><?php echo $i;?></td>
														<td class="checkbox-column">
															<input type="checkbox" class="uniform" onchange="OnChangeCheckbox (this)" id="myCheckbox" <?php if($r['Enable']==1){ echo "checked";}?>   value="<?php echo $r['ID'];?>" />
														</td>
														<td><?php echo $r['Username'];?></td>
														<td><?php echo $r['Name'];?></td>
														<td><?php echo $r['role'];?></td>
														<td><a href="<?php echo base_url(); ?>user/del/<?php echo $r['ID']; ?>" title="Del">Del </a></td>
											</tr>
											<?php $i++; }?>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>


							</div>
						</div> <!-- /.widget .box -->
					</div> <!-- /.col-md-6 -->
					<!-- /Feeds (with Tabs) -->
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var id = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "user/enable/1/" + id;
		}
		else {
			window.location.href = base_url + "user/enable/0/" + id;
		}
	}
</script>