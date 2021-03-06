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
							<a href="<?php echo base_url();?>about">about</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>blog" title=""><?php echo strtoupper($menu); ?></a>
						</li>

					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3><?php echo strtoupper($menu); ?></h3>
					
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
									<!--=== Validation Example 1 ===-->
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> Address Head Office</h4>
											</div>
											<div class="widget-content">
												<form class="form-horizontal row-border"  method="post" action='<?php echo base_url();?>about/updateAddress'>
													<div class="form-group">
														<?php
														$sql ="select * from company_description where types = 'address_head_office'  limit 1";
														$query = $this->db->query($sql);
														$result = $query->result_array();
														foreach($result as $value){ ?>
															<label class="col-md-1 control-label">Address <br>[ TH ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_th" class="form-control wysiwyg"><?php echo $value['content_th'];?></textarea>
															</div>
															<label class="col-md-1 control-label">Address <br>[ EN ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_en" class="form-control wysiwyg"><?php echo $value['content_en'];?></textarea>
															</div>
														<?php } ?>
													</div>

													<div class="form-actions">
														<input type="hidden" name="types" value="address_head_office">
														<input type="submit" value="UPDATE" class="btn btn-primary pull-right">
													</div>
												</form>
											</div>
										</div>
										<!-- /Validation Example 1 -->
									</div>
								</div>

								<div class="row">
									<!--=== Validation Example 1 ===-->
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> Address Warehouse</h4>
											</div>
											<div class="widget-content">
												<form class="form-horizontal row-border"  method="post" action='<?php echo base_url();?>about/updateAddress'>
													<div class="form-group">
														<?php
														$sql ="select * from company_description where types = 'address_ware_house'  limit 1";
														$query = $this->db->query($sql);
														$result = $query->result_array();
														foreach($result as $value){ ?>
															<label class="col-md-1 control-label">Address <br>[ TH ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_th" class="form-control wysiwyg"><?php echo $value['content_th'];?></textarea>
															</div>
															<label class="col-md-1 control-label">Address <br>[ EN ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_en" class="form-control wysiwyg"><?php echo $value['content_en'];?></textarea>
															</div>
														<?php } ?>
													</div>

													<div class="form-actions">
														<input type="hidden" name="types" value="address_ware_house">
														<input type="submit" value="UPDATE" class="btn btn-primary pull-right">
													</div>
												</form>
											</div>
										</div>
										<!-- /Validation Example 1 -->
									</div>
								</div>

								<div class="row">
									<!--=== Validation Example 1 ===-->
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> About Us Column 1</h4>
											</div>
											<div class="widget-content">
												<form class="form-horizontal row-border"  method="post" action='<?php echo base_url();?>about/updateAddress'>
													<div class="form-group">
														<?php
														$sql ="select * from company_description where types = 'about_column_1'  limit 1";
														$query = $this->db->query($sql);
														$result = $query->result_array();
														foreach($result as $value){ ?>
															<label class="col-md-1 control-label">Column 1 <br>[ TH ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_th" class="form-control wysiwyg"><?php echo $value['content_th'];?></textarea>
															</div>
															<label class="col-md-1 control-label"> Column 1 <br>[ EN ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_en" class="form-control wysiwyg"><?php echo $value['content_en'];?></textarea>
															</div>
														<?php } ?>
													</div>

													<div class="form-actions">
														<input type="hidden" name="types" value="about_column_1">
														<input type="submit" value="UPDATE" class="btn btn-primary pull-right">
													</div>
												</form>
											</div>
										</div>
										<!-- /Validation Example 1 -->
									</div>
								</div>

								<div class="row">
									<!--=== Validation Example 1 ===-->
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> About Us Column 2</h4>
											</div>
											<div class="widget-content">
												<form class="form-horizontal row-border"  method="post" action='<?php echo base_url();?>about/updateAddress'>
													<div class="form-group">
														<?php
														$sql ="select * from company_description where types = 'about_column_2'  limit 1";
														$query = $this->db->query($sql);
														$result = $query->result_array();
														foreach($result as $value){ ?>
															<label class="col-md-1 control-label">Column 1 <br>[ TH ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_th" class="form-control wysiwyg"><?php echo $value['content_th'];?></textarea>
															</div>
															<label class="col-md-1 control-label"> Column 1 <br>[ EN ]</label>
															<div class="col-md-5">
																<textarea rows="10" name="content_en" class="form-control wysiwyg"><?php echo $value['content_en'];?></textarea>
															</div>
														<?php } ?>
													</div>

													<div class="form-actions">
														<input type="hidden" name="types" value="about_column_2">
														<input type="submit" value="UPDATE" class="btn btn-primary pull-right">
													</div>
												</form>
											</div>
										</div>
										<!-- /Validation Example 1 -->
									</div>
								</div>

								<div class="row">
									<!--=== Validation Example 1 ===-->
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
												<h4><i class="icon-reorder"></i> Our Promise</h4>
											</div>
											<div class="widget-content">
												<form class="form-horizontal row-border"  method="post" action='<?php echo base_url();?>about/updatePromise'>
													<?php
													$sql ="select * from company_description where types = 'our_promise'  limit 1";
													$query = $this->db->query($sql);
													$result = $query->result_array();
													foreach($result as $value){ ?>
													<div class="form-group">
														<label class="col-md-1 control-label">Content <br>[ TH ]</label>
														<div class="col-md-5">
															<textarea rows="10" name="content_th" class="form-control wysiwyg"><?php echo $value['content_th'];?></textarea>
														</div>
														<label class="col-md-1 control-label">Address <br>[ EN ]</label>
														<div class="col-md-5">
															<textarea rows="10" name="content_en" class="form-control wysiwyg"><?php echo $value['content_en'];?></textarea>
														</div>
													</div>
														<div class="form-group">
														<label class="col-md-1 control-label">Content </label>
														<div class="col-md-5">
															<input type="text"  name="author" class="form-control" value="<?php echo $value['author'];?>">
														</div>
														<label class="col-md-1 control-label">position</label>
														<div class="col-md-5">
															<input type="text"  name="position" class="form-control" value="<?php echo $value['position'];?>">
														</div>
													</div>
													<?php } ?>

													<div class="form-actions">
														<input type="submit" value="UPDATE" class="btn btn-primary pull-right">
													</div>
												</form>
											</div>
										</div>
										<!-- /Validation Example 1 -->
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