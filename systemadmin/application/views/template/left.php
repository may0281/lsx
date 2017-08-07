<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard | lsx.co.th </title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


	<!-- Theme -->
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	
</head>

<body>
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo base_url();?>dashboard">
				
				<strong>Administrator</strong>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->
			<!-- Top Left Menu -->


			<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">

				<li>
					<a data-toggle="modal" href="#myModal0" ><i class="icon-plus"></i><span>เปลี่ยนรหัสผ่าน</span></a>
				</li>
				<li>
					<a href="<?php echo base_url();?>login/Logout"><i class="icon-plus"></i><span>Logout</span></a>
				</li>
			</ul>
			<!-- /Top Left Menu -->
		</div>

	</header> <!-- /.header -->
    <?php
	$path = array(
		0=> null,
		1=>null,
		2=>null,
		3=>null
	);

	$path = explode('/',$_SERVER["REQUEST_URI"]); ?>
    <div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav">
					<?php if($this->session->userdata('role') == 'admin'){ ?>
					<li class="<?php if($path[2]=='dashboard'){echo "current";} ?>">
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="icon-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
					<?php } ?>
                    <?php if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'product'){ ?>
                    <li class="<?php if($path[2]=='product'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-rocket"></i>
							 Products Management
						</a>
						<ul class="sub-menu">							
							<li class="<?php if(  $path[3]=='type'){echo "current";} ?>">
								<a href="<?php echo base_url();?>product/type">
								<i class="icon-angle-right"></i>
								Product Type
								</a>
							</li>
							<li class="<?php if(  $path[3]=='category'){echo "current";} ?>">
								<a href="<?php echo base_url();?>product/category">
								<i class="icon-angle-right"></i>
								Product Category
								</a>
							</li>
							<li class="<?php if($path[3]==''){echo "current";} ?>">
								<a href="<?php echo base_url();?>product">
								<i class="icon-angle-right"></i>
								Product List
								</a>
							</li>

						</ul>
					</li>
                    <?php } ?>
                    <?php if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'blog'){ ?>
                    <li class="<?php if($path[2]=='blog'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-th-list"></i>
							 Blog Management
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path[3]=='category'){echo "current";} ?>">
								<a href="<?php echo base_url();?>blog/category">
								<i class="icon-angle-right"></i>
								Category
								</a>
							</li>
							<li class="<?php if($path[3]==''){echo "current";} ?>">
								<a href="<?php echo base_url();?>blog">
								<i class="icon-angle-right"></i>
								Blog List

								</a>
							</li>
						</ul>
					</li>
                    <?php } ?>

                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                    <li class="<?php if($path[2]=='promotion'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-money"></i>
							 Promotion Management
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path[3]==''){echo "current";} ?>">
								<a href="<?php echo base_url();?>promotion">
								<i class="icon-angle-right"></i>
								Promotion List
								</a>
							</li>
						</ul>
					</li>
                    <?php } ?>

                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                        <li class="<?php if($path[2]=='landing'){echo "current open";} ?>">
                            <a href="javascript:void(0);">
                                <i class="icon-desktop"></i>
                                Landing Page
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($path[3]==''){echo "current";} ?>">
                                    <a href="<?php echo base_url();?>landing">
                                        <i class="icon-angle-right"></i>
                                        Landing List
                                    </a>
                                </li>
                            </ul>
                        </li>

						<li class="<?php if($path[2]=='portfolio'){echo "current";} ?>">
							<a href="<?php echo base_url();?>portfolio">
                                <i class="icon-star"></i>
                                Portfolio
                            </a>
                        </li>


						<li class="<?php if($path[2]=='client'){echo "current";} ?>">
							<a href="<?php echo base_url();?>client">
								<i class="icon-user-md"></i>
								Client Logo.
							</a>
						</li>
						<li class="<?php if($path[2]=='reports'){echo "current open";} ?>">
							<a href="javascript:void(0);">
								<i class="icon-list-alt"></i>
								Report
							</a>
							<ul class="sub-menu">
								<li class="<?php if($path[3]==''){echo "current";} ?>">
									<a href="<?php echo base_url();?>reports/contact">
										<i class="icon-angle-right"></i>
										Contact
									</a>
								</li>
							</ul>
						</li>

						<li class="<?php if($path[2]=='about'){echo "current";} ?>">
							<a href="<?php echo base_url();?>about">
								<i class="icon-fighter-jet"></i>
								About Lsx.
							</a>
						</li>

						<li class="<?php if($path[2]=='file'){echo "current";} ?>">
							<a href="<?php echo base_url();?>file">
								<i class="icon-upload-alt"></i>
								File Upload.
							</a>
						</li>
						<li class="<?php if($path[2]=='user'){echo "current";} ?>">
							<a href="<?php echo base_url();?>user">
								<i class="icon-user"></i>
								User.
							</a>
						</li>
                    <?php } ?>

				</ul>			
				<!-- /Navigation -->
				<div class="sidebar-widget align-center">
					<div class="btn-group" data-toggle="buttons" id="theme-switcher">
						<label class="btn active">
							<input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
						</label>
						<label class="btn">
							<input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
						</label>
					</div>
				</div>

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->
		<div class="modal fade" id="myModal0">
			<div class="modal-dialog">
				<div class="modal-content">
					<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>dashboard/changPassword">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">เปลี่ยนรหัสผ่าน</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="col-md-3 control-label">Old Password :</label>
								<div class="col-md-9">
									<input type="text" name="oldpass" class="form-control required">
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