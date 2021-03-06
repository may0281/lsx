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
                            <a href="<?php echo base_url();?>blog" title=""><?php echo strtoupper($menu); ?></a>
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
						<h3>Edit Blog</h3>
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
                            <?php $value = $blog[0] ?>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>blog/edit_action">
									<div class="form-group">
										<label class="col-md-2 control-label">Category <span class="required">*</span></label>
										<div class="col-md-10">
											<select name="CatID" class="form-control required">
												<option value=""></option>
												<?php foreach ($category as $r) {?>
												<option value="<?php echo $r['id']; ?>" <?php echo ($r['id']==$value['CatID']) ? 'selected="selected" ' : ''   ?> ><?php echo $r['catEN']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Cover Image <span class="required">*</span></label>
										<div class="col-md-10">
                                            <img src="../../../images/blog/<?php echo $value['CoverImage']?>" style="max-width: 300px">
											<br><br>
                                            <input type="file" name="coverimg" class="" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<p class="help-block">Images only (image/*) <br>  Size : [990X715] px</p>
											<label for="coverimg" class="has-error help-block" generated="true" style="display:none;"></label>
                                            <input type="hidden" name="coverimg_old" value="<?php echo $value['CoverImage']?>">
										</div>
									</div>
<!--                                    <div class="form-group">-->
<!--                                        <label class="col-md-2 control-label">Gallery </label>-->
<!--                                        <div class="col-md-10">-->
<!--                                            --><?php //$i=1;foreach ($gallery as $g) { ?>
<!--                                                <div class="col-md-3">-->
<!--                                                    <img src="../../../images/blog/--><?php //echo $g['Image'];?><!--" width='200'>-->
<!--                                                    <label class="checkbox"><input type="checkbox" name="del[]" value="--><?php //echo $g['ID']."&".$g['Image'];?><!--" class=""> Delete </label>-->
<!--                                                </div>-->
<!--                                                --><?php //if($i==4 or $i==8 or $i==12 or $i==16){?><!--<div style="clear:both"></div>--><?php //} ?>
<!--                                                --><?php //$i++; } ?>
<!--                                        </div>-->
<!--                                        <div style="clear:both;height:20px;"></div>-->
<!--                                        <label class="col-md-2 control-label">Add more </label>-->
<!--                                        <div class="col-md-10">-->
<!--                                            <input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">-->
<!--                                            <p class="help-block">Images only (image/*)</p>-->
<!--                                            <label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>-->
<!--                                        </div>-->
<!--                                    </div>-->
									<div class="form-group">
										<label class="col-md-2 control-label">Tags:</label>
										<div class="col-md-10"><input type="text" id="tags2"  name="tags" class="tags" value="<?php echo $value['tags'] ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Blog Name [TH] <span class="required">*</span></label>
										<div class="col-md-10">
											<input type="text" name="NameTH" class="form-control required" value="<?php echo $value['NameTH'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Short Description [TH] :</label>
										<div class="col-md-10"><textarea rows="5" name="shortDescTH" class="form-control"><?php echo $value['shortDescTH'] ?></textarea></div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description [TH] :</label>
                                        <div class="col-md-10"><textarea  name="DescriptionTH" id="editor1"><?php echo $value['DescriptionTH'] ?></textarea></div>
                                    </div>

                                    <div class="form-group">
										<label class="col-md-2 control-label">Blog Name [EN] <span class="required">*</span></label>
										<div class="col-md-10">
											<input type="text" name="NameEN" class="form-control required" value="<?php echo $value['NameEN'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Short Description [EN] :</label>
										<div class="col-md-10"><textarea rows="5" name="shortDescEN" class="form-control"><?php echo $value['shortDescEN'] ?></textarea></div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description [EN] :</label>
                                        <div class="col-md-10"><textarea rows="10" name="DescriptionEN" id="editor2" class="form-control"><?php echo $value['DescriptionEN'] ?></textarea></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Video</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Video" class="form-control" value="<?php echo $value['Video'] ?>">
                                            <p class="help-block">Example (https://www.youtube.com/watch?v=ATzTsija1I4)</p>
                                        </div>
                                    </div>
									<div class="form-actions">
                                        <input type="hidden" name="ID" value="<?php echo $value['ID']; ?>">
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