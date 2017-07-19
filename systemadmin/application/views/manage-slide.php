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
                            <a href="<?php echo base_url();?>blogs" title=""><?php echo strtoupper($menu); ?></a>
                        </li>
                        <li class="current">
                            <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                        </li>
                    </ul>
				</div>
				<!-- /Breadcrumbs line -->
				<?php $r = $q[0]; ?>
				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>
							<?php if($action == 'create_action'){?>
							Insert New Dashboard Picture Slide</h3>
							<?php }else{ ?>
							Update Dash Picture Slide
							<?php }?>
					</div>
					<ul class="page-stats">
						<li>
							Create By : <?php echo $r['create_by'];?> <br>
							Create Date : <?php echo $r['create_date'];?>
						</li>
						<li>
							Update By : <?php echo $r['update_by'];?> <br>
							Update Date : <?php echo $r['update_date'];?>
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
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-4" action="<?php echo base_url();?>dashboard/<?php echo $action;?>">
									<div class="form-group">
										<label class="col-md-3 control-label">Cover Image <span class="required">*</span></label>
										<div class="col-md-9">
											<?php if($action == 'edit_action'){ ?>
												<img src="../../../images/content/<?php echo $r['img'] ;?>" style="max-width: 500px; margin-bottom: 25px;">
												<input type="hidden" name="coverimg_old" value="<?php echo $r['img']?>">
											<?php } ?>
											<input type="file" name="coverimg" class="<?php if($action == 'create_action'){ echo 'required';} ?>" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<p class="help-block">Images only (image/jpg,png) : Size (2440x1578) px.</p>
											<label for="coverimg" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Text H1 [ TH ]<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="text_h1_th" class="form-control required" value="<?php echo $r['text_h1_th']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Text Normal Description [ TH ]</label>
										<div class="col-md-9">
											<input type="text" name="text_normal_th" class="form-control" value="<?php echo $r['text_normal_th']?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Text H1 [ EN ]<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="text_h1_en" class="form-control required" value="<?php echo $r['text_h1_en']?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Text Normal Description [ EN ]</label>
										<div class="col-md-9">
											<input type="text" name="text_normal_en" class="form-control" value="<?php echo $r['text_normal_en']?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Layout Style <span class="required">*</span></label>
										<div class="col-md-3">
											<label class="radio-inline">
												<input type="radio" class="uniform" name="type" value="fs-slide-1" <?php if($r['type'] == 'fs-slide-1' || $action == 'create_action'){ echo 'checked';} ?> >
												Text Style 1
												<img src="<?php echo base_url()?>assets/img/fs-slide-1.png">
											</label>
										</div>
										<div class="col-md-3">
											<label class="radio-inline">
												<input type="radio" class="form-control uniform required" name="type" value="fs-slide-2" <?php if($r['type'] == 'fs-slide-2'){ echo 'checked';} ?> >
												Text Style 2
												<img src="<?php echo base_url()?>assets/img/fs-slide-2.png">
											</label>
										</div>
										<div class="col-md-3">
											<label class="radio-inline">
												<input type="radio" class="form-control uniform" name="type" value="fs-slide-3" <?php if($r['type'] == 'fs-slide-3'){ echo 'checked';} ?> >
												Text Style 3
												<img src="<?php echo base_url()?>assets/img/fs-slide-3.png">
											</label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Link </label>
										<div class="col-md-9">
											<input type="text" name="url" class="form-control" value="<?php echo $r['url']?>" >
										</div>
									</div>

									<div class="form-actions">
										<input type="hidden" name='id' value="<?php echo $r['id']?>">
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
	</script>