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


<body>
<?php $domain =$this->session->userdata("domain");?>
	

	<div id="container">
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
                            <a href="<?php echo base_url();?>products" title=""><?php echo strtoupper($menu); ?></a>
                        </li>
                        <li class="current">
                            <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                        </li>
                    </ul>
					<ul class="crumb-buttons">
						<li>
							<a href="<?php echo base_url();?>product/add"><i class="icon-plus"></i><span>Create Product</span></a>
						</li>

					</ul>
				</div>

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3><?php echo strtoupper($subMenu) ?></h3>
						<span></span>
					</div>

				</div>

				<!--=== Page Content ===-->
				<!--=== Managed Tables ===-->

				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Managed Table</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="25">
									<thead>
										<tr>
											<th>ID</th>

											<th>Cover Img</th>
											<th>Type</th>
											<th>Category</th>
											<th>SubCat</th>
											<th>Name TH</th>
											<th>Name EN</th>
											<th>Enable</th>
											<th class="align-center">Edit</th>
											<th class="align-center">Del</th>
										</tr>
									</thead>

									
									<tbody>
										
										<?php  $i=1;foreach ($q as $r) { ?>
										
										<tr>
											<td><?php echo $i;?></td>
											<td> <img src='../images/product/<?php echo $r['cover_img'];?>' width="50"></td>
											<td><?php echo $r['type_code'];?></td>
											<td><?php echo $r['cat_code'];?></td>
											<td><?php echo $r['sub_cat_code'];?></td>
											<td><?php echo $r['name_th'];?></td>
											<td><?php echo $r['name_en'];?></td>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform" onchange="OnChangeCheckbox (this)" id="myCheckbox" <?php if($r['enable']==1){ echo "checked";}?>   value="<?php echo $r['ID'];?>" />
											</td>
											<td class="align-center"><a href="<?php echo base_url(); ?>product/edit/<?php echo $r['product_code']; ?>" title="Edit product"><i class="icon-edit-sign" style="font-size:20px;"></i></a></td>
											<td class="align-center"><a href="<?php echo base_url(); ?>product/del/<?php echo $r['product_code']; ?>" title="Edit product"><i class="icon-remove-sign" style="font-size:20px;"></i> </a></td>
										</tr>
										<?php $i++; }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /Normal -->

				
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var productid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "product/enable/product/1/" + productid;
		}
		else {
			window.location.href = base_url + "product/enable/product/0/" + productid;
		}
	}
</script>