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
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/blockui/jquery.blockUI.min.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

	<!-- Noty -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>



	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

	<!-- Demo JS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>

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
						<li class="current">
							<a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
						</li>
					</ul>

					<ul class="crumb-buttons">
						<li>
							<a href="<?php echo base_url('product/type/add') ?>" ><i class="icon-plus"></i><span>Create Product Type</span></a>
						</li>

					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>
							<?php echo strtoupper($subMenu) ?>
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
								<table class="table table-hover" data-display-length="30">
									<thead>
										<tr>
											<th>#</th>
											<th>TYPE TH</th>
											<th>TYPE EN</th>
											<th>URL</th>
											<th>Image</th>
											<th>Enable</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1;foreach($q as $r){ ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $r['type_th'];?></td>
											<td><?php echo $r['type_en'];?></td>
											<td><?php echo $r['url'];?></td>
											<td><img src="../../images/product/<?php echo $r['img'];?>" width="200px" ></td>
											<td>
												<div class="make-switch switch-mini" data-on="success" data-off="danger">
												<input type="checkbox" onchange="OnChangeCheckbox (this)" id="myCheckbox" <?php if($r['enable']==1){ echo "checked";}?>   value="<?php echo $r['id'];?>" />
												</div>
											</td>
											<td>
												<a href="<?php echo base_url('product/type/update/'.$r['type_code'])?>" ><i class="icon-edit" style="font-size: 20px"></i><span></span></a>
											</td>
											<td>
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

<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "product/enable/product_type/1/" + slid;
		}
		else {
			window.location.href = base_url + "product/enable/product_type/0/" + slid;
		}
	}
</script>
<script type="text/javascript">
	function OnChangeCheckboxDel (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "product/delProductType/1/" + slid;
		}
		else {
			window.location.href = base_url + "product/delProductType/0/" + slid;
		}
	}
</script>