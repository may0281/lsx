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
                            <a href="<?php echo base_url();?>product" title=""><?php echo strtoupper($menu); ?></a>
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
						<h3><?php if($action == 'createType'){ echo 'Create Type'; }else { echo 'Update Type';} ?> <?php echo strtoupper($q['type_code']) ?></h3>

						<span></span>
					</div>
					<ul class="page-stats">
						<li>
							Create By : <?php echo $q['create_by'];?> <br>
							Create Date : <?php echo $q['create_date'];?>
						</li>
						<li>
							Update By : <?php echo $q['update_by'];?> <br>
							Update Date : <?php echo $q['update_date'];?>
						</li>
					</ul>
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
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>product/<?php echo $action;?>">
									<div class="form-group">
										<label class="col-md-3 control-label">Product Code<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="type_code" class="form-control required" <?php echo ($action == 'updateType') ? 'disabled' : ''; ?> value="<?php echo $q['type_code']; ?>">
											<p class="help-block">Do not put a space.</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Name EN<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="type_en" class="form-control required" value="<?php echo $q['type_en']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Name TH<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="type_th" class="form-control required" value="<?php echo $q['type_th']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Short Description EN<span class="required">*</span></label>
										<div class="col-md-9">
											<textarea class="form-control required" name="short_description_en"><?php echo $q['short_description_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Short Description TH<span class="required">*</span></label>
										<div class="col-md-9">
											<textarea class="form-control required" name="short_description_th"><?php echo $q['short_description_th']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Description EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="description_en"><?php echo $q['description_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Description TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="description_th"><?php echo $q['description_th']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"> Information EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="information_en"><?php echo $q['information_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Information TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="information_th"><?php echo $q['information_th']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"> Installation EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="installation_en"><?php echo $q['installation_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Installation TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="installation_th"><?php echo $q['installation_th']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Maintenance EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="maintenance_en"><?php echo $q['maintenance_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Maintenance TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="maintenance_th"><?php echo $q['maintenance_th']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Caution EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="caution_en"><?php echo $q['caution_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Caution TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="caution_th"><?php echo $q['caution_th']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Certificate EN</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="certificate_en"><?php echo $q['certificate_en']; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"> Certificate TH</label>
										<div class="col-md-9">
											<textarea  rows="15"  class="form-control wysiwyg" name="certificate_th"><?php echo $q['certificate_th']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">URL<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="url" class="form-control required" value="<?php echo $q['url']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">File Upload:</label>
										<div class="col-md-9">
											<?php if($action == 'updateType'){ ?>
												<input type="hidden" name="oldCoverImg" value="<?php echo $q['img']; ?>">
												<input type="hidden" name="type_code" value="<?php echo $q['type_code']; ?>">
											<?php }?>
											<input type="file" name="coverimg" class="form-control <?php echo ($action == 'createType') ? 'required' : ''; ?> "  data-style="fileinput">
											<p class="help-block">Images only (image/jpg,png) <br> Size (350x370) px.</p>
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" >Save changes</button>
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
	</script>