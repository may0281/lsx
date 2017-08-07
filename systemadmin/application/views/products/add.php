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

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url();?>assets/sample.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tagsinput/jquery.tagsinput.min.js"></script>

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
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Insert New Product</h3>
						<span></span>
					</div>
				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<div class="row">
					<!--=== Validation Example 1 ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i></h4>

							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>product/add_action">
									<div class="form-group">
										<label class="col-md-3 control-label">Product Type <span class="required">*</span></label>
										<div class="col-md-9">
											<select name="type_code" id="type_code" class="form-control required">
												<option value="">Please select one.</option>
												<?php foreach ($type as $t) {?>
												<option value="<?php echo $t['type_code']; ?>"><?php echo $t['type_en']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Category
											<i id="cat_spin" class="fa fa-spinner fa-spin hide"  style="font-size:24px"></i>
										</label>
										<div class="col-md-9">
											<select name="cat_code" id="cat_code" class="form-control" cat-values=""></select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Category
											<i id="sub_cat_spin" class="fa fa-spinner fa-spin hide"  style="font-size:24px"></i>
										</label>
										<div class="col-md-9">
											<select name="sub_cat_code" id="sub_cat_code" class="form-control" sub-cat-values=""></select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">SKU <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="sku" class="form-control required" placeholder="AS11111AA22">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Product Name [TH] <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="name_th" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description [TH] :</label>
										<div class="col-md-9"><textarea  name="desc_th" id="editor1"></textarea></div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Product Name [EN] <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="name_en" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Description [EN] :</label>
										<div class="col-md-9"><textarea  name="desc_en" id="editor2"></textarea></div>
									</div>

                                    <div class="form-group">
										<label class="col-md-3 control-label">Price <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="price" class="form-control required" placeholder="Price">
										</div>
										<div class="col-md-4">
											<input type="text" name="sale_price" class="form-control required" placeholder="Sale Price">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tags:</label>
										<div class="col-md-9"><input type="text" id="tags2"  name="tags" class="tags" value=""></div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Cover Image <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="coverimg" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<p class="help-block">Images only (image/*) Size 396X396 px</p>
											<label for="coverimg" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									<div class="form-group">

										<label class="col-md-3 control-label">Original Size <span class="required">*</span></label>
										<!-- ..........1.......... -->
										<div class="col-md-4">
											<input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">
											<p class="help-block">Images only (image/*)</p>
											<label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">PDF <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="pdf" class="required"  data-style="fileinput" data-inputsize="medium">
											<p class="help-block">Images only (image/*)</p>
											<label for="pdf" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="SUBMIT" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
						<!-- /Validation Example 1 -->
					</div>
				</div>
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
    <script>
		initSample();

		$('#type_code').change(function () {
			$('#warning-context').html('');
			var typeCode = $('#type_code option:selected').val();
			getCategory(typeCode)
		});

		$('#cat_code').change(function () {
			$('#warning-context').html('');
			var type_code = document.forms["validate-1"]["type_code"].value;
			var category = $('#cat_code option:selected').val();
			getSubCategory(type_code,category);
		});

		function getCategory(value) {
			var base_url = window.location.origin;
			var i = 0;
			$.ajax({
				url: base_url + "/systemadmin/product/api-category/" + value,
				dataType: "json",
				beforeSend: function () {
					$('#cat_spin').removeClass('hide');
					i++;
				},
				success: function (result) {
					console.log(result);
						var select = $('#cat_code');
						var cat_values = $("#cat_code").attr("cat-values");
						select.empty().append('<option value="" > Select All </option>');
						for (var j = 0; j < result.length; j++) {
							var data_obj = result[j];
							var selected = null;
							if(data_obj['cat_code'] == cat_values)
							{
								selected = 'selected';
							}
							select.append("<option value='" + data_obj['cat_code'] + "' " + selected + " >" +
								data_obj['cat_en'] + "</option>");
						}
				},
				complete: function () {
					i--;
					if (i <= 0) {
						$('#cat_spin').addClass('hide');
					}
				}

			});
		}

		function getSubCategory(typeCode,catCode) {
			var base_url = window.location.origin;
			var i = 0;
			$.ajax({
				url: base_url + "/systemadmin/product/api-sub-category/" + typeCode + '/' + catCode,
				dataType: "json",
				beforeSend: function () {
					$('#sub-cat_spin').removeClass('hide');
					i++;
				},
				success: function (result) {
					console.log(result);
					var select = $('#sub_cat_code');
					var sub_cat_values = $("#sub_cat_code").attr("sub-cat-values");
					select.empty().append('<option value="" > Select All </option>');
					for (var j = 0; j < result.length; j++) {
						var data_obj = result[j];
						var selected = null;
						if(data_obj['sub_cat_code'] == sub_cat_values)
						{
							selected = 'selected';
						}
						select.append("<option value='" + data_obj['sub_cat_code'] + "' " + selected + " >" +
							data_obj['sub_en'] + "</option>");
					}
				},
				complete: function () {
					i--;
					if (i <= 0) {
						$('#sub-cat_spin').addClass('hide');
					}
				}

			});
		}
	</script>