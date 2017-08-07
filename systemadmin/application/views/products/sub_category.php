<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/lodash.compat.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="assets/js/libs/html5shiv.js"></script>
<![endif]-->

<!-- Smartphone Touch Events -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.move.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.swipe.js"></script>

<!-- General -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

<!-- Page specific plugins -->
<!-- Charts -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/blockui/jquery.blockUI.min.js"></script>

<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<!-- App -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.form-components.js"></script>

<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
</script>

<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>

<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url();?>dashboard">DASHBOARD</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>product" title=""><?php echo strtoupper($menu); ?></a>
						</li>
						<li class="">
							<a href="<?php echo base_url();?>product/category" title=""><?php echo strtoupper($subMenu) ?></a>
						</li>
						<li class="current">
							<a href="#" title=""><?php echo strtoupper($subCat) ?></a>
						</li>
					</ul>

					<ul class="crumb-buttons">
						<li>
							<a data-toggle="modal" href="#createProductType" ><i class="icon-plus"></i><span>Create Sub Category</span></a>
						</li>

					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>
							<?php echo str_replace('-',' ',strtoupper($typeCode)) ?> ::  <?php echo str_replace('-',' ',strtoupper($catCode)) ?>
                        </h3>
					</div>

					
					
				</div>
				<!-- /Page Header -->

				<div class="row">
					<!--=== Simple Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> LIST</h4>
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
											<th>Category Code</th>
											<th>Sub Category TH</th>
											<th>Sub Category EN</th>
											<th>Enable</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1;foreach($q as $r){ ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $r['cat_code'];?></td>
											<td><?php echo $r['sub_th'];?></td>
											<td><?php echo $r['sub_en'];?></td>
											<td style="text-align: center">
												<div class="make-switch switch-mini" data-on="success" data-off="danger">
												<input type="checkbox" onchange="OnChangeCheckbox (this)" id="myCheckbox" <?php if($r['enable']==1){ echo "checked";}?>   value="<?php echo $r['id'];?>" />
												</div>
											</td>
											<td style="text-align: center">
												<a data-toggle="modal" href="#editCat<?php echo $i;?>" ><i class="icon-edit-sign" style="font-size: 20px"></i><span></span></a>
												<div class="modal fade" id="editCat<?php echo $i;?>">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<form class="form-horizontal row-border" id="validate-1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>product/updateSubCategory">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title">Update category.</h4>
																</div>
																<div class="modal-body">
																	<div class="form-group">
																		<label class="col-md-3 control-label">Sub Category EN<span class="required">*</span></label>
																		<div class="col-md-9">
																			<input type="text" name="sub_en" value="<?php echo $r['sub_en'];?>" class="form-control required">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-md-3 control-label">Sub Category TH<span class="required">*</span></label>
																		<div class="col-md-9">
																			<input type="text" name="sub_th" value="<?php echo $r['sub_th'];?>" class="form-control required">
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="id" value="<?php echo $r['id'];?>">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-primary" >Save changes</button>
																</div>
															</form>
														</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->

											</td>
											<td style="text-align: center">
												<div class="make-switch switch-mini" data-on="success" data-off="danger">
												<input type="checkbox" onchange="OnChangeCheckboxDel (this)" id="myCheckbox"  value="<?php echo $r['id'];?>" />
												</div>
											</td>
										</tr>
										<?php $i++;} ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!-- /Simple Table -->
					</div>

				</div>
			</div>
			<!-- /.container -->
		</div>

		<div class="modal fade" id="createProductType">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form class="form-horizontal row-border" id="validate-1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>product/createSubCategory">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Create Category.</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="col-md-3 control-label">Sub Category Code<span class="required">*</span></label>
								<div class="col-md-9">
									<input type="text" name="sub_cat_code" class="form-control required">
									<p class="help-block">Do not put a space.</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Sub Category EN<span class="required">*</span></label>
								<div class="col-md-9">
									<input type="text" name="sub_en" class="form-control required">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Sub Category TH<span class="required">*</span></label>
								<div class="col-md-9">
									<input type="text" name="sub_th" class="form-control required">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="type_code" value="<?php echo $typeCode?>">
							<input type="hidden" name="cat_code" value="<?php echo $catCode?>">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" >Save changes</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "product/enable/product_sub_categories/1/" + slid;
		}
		else {
			window.location.href = base_url + "product/enable/product_sub_categories/0/" + slid;
		}
	}
</script>
<script type="text/javascript">
	function OnChangeCheckboxDel (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "product/delSubCategory/1/" + slid;
		}
		else {
			window.location.href = base_url + "product/delSubCategory/0/" + slid;
		}
	}
</script>