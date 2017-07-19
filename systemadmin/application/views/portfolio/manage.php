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

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/tagsinput/jquery.tagsinput.min.js"></script>

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
                            <a href="<?php echo base_url();?>portfolio" title=""><?php echo strtoupper($menu); ?></a>
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
						<h3><?php echo strtoupper($subMenu); ?></h3>
						<span></span>
					</div>
				</div>
				<?php if($action == 'edit_action'){$r = $q[0];} ?>
				<div class="row">
					<!--=== Validation Example 1 ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i></h4>

							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>portfolio/<?php echo $action?>">
									<div class="form-group">
										<label class="col-md-2 control-label">Project Name [TH] <span class="required">*</span></label>
										<div class="col-md-10">
											<input type="text" name="name_th" value="<?php echo $r['name_th'] ?>" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Project Name [EN] <span class="required">*</span></label>
										<div class="col-md-10">
											<input type="text" name="name_en" value="<?php echo $r['name_en'] ?>" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Cover Image <span class="required">*</span></label>
										<div class="col-md-10">
											<?php if($action == 'edit_action'){ ?>
												<img src="../../../images/portfolio/<?php echo $r['img'] ;?>" style="max-width: 500px; margin-bottom: 25px;">
												<input type="hidden" name="coverimg_old" value="<?php echo $r['img']?>">
											<?php } ?>
											<input type="file" name="coverimg" class="<?php if($action == 'create_action'){ echo 'required';} ?>" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<p class="help-block">Images only (image/*) <br> Size : [865x615] px</p>
											<label for="coverimg" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Gallery </label>
										<div class="col-md-10">
											<?php $i=1;foreach ($gallery as $g) { ?>
												<div class="col-md-3">
													<img src="../../../images/portfolio/<?php echo $g['img'];?>" width='200'>
													<label class="checkbox"><input type="checkbox" name="del[]" value="<?php echo $g['id']."&".$g['img'];?>" class=""> Delete </label>
												</div>
												<?php if($i==4 or $i==8 or $i==12 or $i==16){?><div style="clear:both"></div><?php } ?>
												<?php $i++; } ?>
										</div>
										<div style="clear:both;height:20px;"></div>
										<label class="col-md-2 control-label">Gallery <span class="required">*</span></label>
										<div class="col-md-4">
											 <input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">
											<p class="help-block">Images only (image/*) <br> Size : [1140x600] px</p>
											<label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">Tags:</label>
										<div class="col-md-10"><input type="text" id="tags2"  name="tags" value="<?php echo $r['tags'] ?>" class="tags" value=""></div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">ABOUT THIS PROJECT [TH] :</label>
										<div class="col-md-10"><textarea rows="5" name="challenge_th" class="form-control"><?php echo $r['challenge_th']; ?></textarea></div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">ABOUT THIS PROJECT [EN] :</label>
										<div class="col-md-10"><textarea rows="5" name="challenge_en" class="form-control"><?php echo $r['challenge_en'] ?></textarea></div>
									</div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Url</label>
                                        <div class="col-md-10">
                                            <input type="text" name="url" value="<?php echo $r['url'] ?>" class="form-control">
                                        </div>
                                    </div>
									<div class="form-actions">
										<?php if($action == 'edit_action'){ ?>
											<input type="hidden" name="id" value="<?php echo $r['id'] ?>">
										<?php }?>
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