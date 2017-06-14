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
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="<?php echo base_url();?>dashboard">
						Dashboard
					</a>
				</li>
				<li>
							<a href="<?php echo base_url();?>login/Logout"><i class="icon-plus"></i><span>Logout</span></a>
				</li>
			</ul>
			<!-- /Top Left Menu -->
		</div>
	</header> <!-- /.header -->
    <?php $path = explode('/',$_SERVER["REQUEST_URI"]) ;?>
    <div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav">

                    <?php if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'product'){ ?>
                    <li class="<?php if($path[2]=='product'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-table"></i>
							 Products Management
						</a>
						<ul class="sub-menu">							
							<li class="<?php if($path[3]=='category'){echo "current";} ?>">
								<a href="<?php echo base_url();?>product/category">
								<i class="icon-angle-right"></i>
								Category
								</a>
							</li>
							<li class="<?php if($path[3]==''){echo "current";} ?>">
								<a href="<?php echo base_url();?>product">
								<i class="icon-angle-right"></i>
								All Product

								</a>
							</li>
                            <li class="<?php if($path[3]=='add'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>product/add">
                                    <i class="icon-angle-right"></i>
                                    Add Product
                                </a>
                            </li>
						</ul>
					</li>
                    <?php } ?>
                    <?php if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'blog'){ ?>
                    <li class="<?php if($path[2]=='blog'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-table"></i>
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
                            <li class="<?php if($path[3]=='add'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>blog/add">
                                    <i class="icon-angle-right"></i>
                                    Add Blog
                                </a>
                            </li>
						</ul>
					</li>
                    <?php } ?>

                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                    <li class="<?php if($path[2]=='promotion'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-table"></i>
							 Promotion Management
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path[3]==''){echo "current";} ?>">
								<a href="<?php echo base_url();?>promotion">
								<i class="icon-angle-right"></i>
								Promotion List
								</a>
							</li>
                            <li class="<?php if($path[3]=='add'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>promotion/add">
                                    <i class="icon-angle-right"></i>
                                    Add Promotion
                                </a>
                            </li>
						</ul>
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
