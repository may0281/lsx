<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LSX CO.,LTD. - Decor surfaces, CERARL, ALTYNO, JOLYPATE </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/vendor/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/et-lineicons/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/linea-font/css/linea-font.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome/css/font-awesome.min.css">
    <!-- Slider -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/vendor/slick.css">
    <!-- Lightbox -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/vendor/magnific-popup.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/vendor/animate.css">


    <!-- Definity CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/responsive.css">
    <!-- JS -->
    <script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body id="page-top">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- ========== Preloader ========== -->

<div class="preloader">
    <img src="<?php echo base_url();?>assets/images/loader.svg" alt="Loading...">
</div>
<nav class="navbar navbar-default navbar-fixed-top mega navbar-trans">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Logo -->
            <a class="navbar-brand" href="index.html"><img class="navbar-logo" src="<?php echo base_url('assets/images/lsx-logo-1.png') ?>" alt="Definity - Logo"></a>
        </div><!-- / .navbar-header -->

        <!-- Navbar Links -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-fw"><a href="<?php echo base_url();?>" >Home</a></li><!-- / Home -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
                    <ul class="dropdown-menu bg-solid">
                        <div class="row">
                            <div class="col-lg-7">
                                <li class="dropdown-header">Shop</li>
                                <li role="separator" class="divider"></li>
                                <li><a href="pages/shop/shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                <li><a href="pages/shop/shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                <li><a href="pages/shop/shop-4col.html">Shop 4 Columns</a></li>
                                <li><a href="pages/shop/shop-single.html">Single Product</a></li>
                                <li><a href="pages/shop/shop-checkout.html">Checkout Page</a></li>
                            </div>
                            <div class="col-lg-5 dropdown-banner">
                                <img src="assets/images/shop/baner-shop-white.png" alt="Definity eCommerce update">
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="dropdown mega-fw">
                    <a href="<?php echo base_url('promotion')?>">Promotion </a>
                </li>
                <li class="dropdown mega-fw">
                    <a href="<?php echo base_url('portfolio');?>">Portfolio </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('blog')?>">ALL</a></li>
                        <?php
                            $this->db->select('*');
                            $this->db->from('blog_category');
                            $this->db->where('Enable',1);
                            $query = $this->db->get();
                            foreach ($query->result_array() as $blog){
                        ?>
                        <li><a href="<?php echo base_url('blog?categories='.$blog['url'])?>"><?php echo $blog['cat'.strtoupper($this->session->userdata('lang'))]?></a></li>
                        <?php }?>

                    </ul>
                </li>
                <li class="dropdown mega-fw"><a href="<?php echo base_url();?>" >Company</a></li><!-- / Home -->




            </ul><!-- / .nav .navbar-nav -->


            <!-- Navbar Links Right -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Cart -->
                <li class="dropdown cart-nav">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Cart</a>
                    <ul class="dropdown-menu cart-dropdown">
                        <li class="dropdown-header">Cart</li>
                        <li role="separator" class="divider cart-sep-top"></li>
                        <li>
                            <div class="cart-item">
                                <a href="pages/shop/shop-single.html"><img src="assets/images/shop/p-thumb-1.jpg" alt="Product Name" class="p-thumb"></a>
                                <a href="#" class="cart-remove-btn"><span class="linea-arrows-square-remove"></span></a>
                                <a href="pages/shop/shop-single.html" class="cp-name">Light Blue Suit</a>
                                <p class="cp-price">1 x $359.99</p>
                            </div>

                            <div class="cart-item">
                                <a href="pages/shop/shop-single.html"><img src="assets/images/shop/p-thumb-2.jpg" alt="Product Name" class="p-thumb"></a>
                                <a href="#" class="cart-remove-btn"><span class="linea-arrows-square-remove"></span></a>
                                <a href="pages/shop/shop-single.html" class="cp-name">Dark Blue Suit</a>
                                <p class="cp-price">1 x $459.99</p>
                            </div>
                        </li>
                        <li role="separator" class="divider cart-sep-bot"></li>
                        <li>
                            <h6 class="item-totals">Items Total: <span>$718.98</span></h6>
                        </li>
                        <li class="cart-btns">
                            <a href="pages/shop/shop-checkout.html" class="btn-ghost btn-block">View Cart</a>
                            <a href="pages/shop/shop-checkout.html" class="btn btn-block">Checkout</a>
                        </li>

                    </ul>
                </li><!-- / Cart -->

                <!-- Search -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i> Search</a>
                    <ul class="dropdown-menu search-dropdown">
                        <li><form action="post"><input type="search" class="form-control" placeholder="Search..."></form></li>
                    </ul>
                </li><!-- / Search -->

                <!-- Languages -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($this->session->userdata('lang'));?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="th" onclick="return changeLang(this);">TH</a></li>
                        <li><a href="#" id="en" onclick="return changeLang(this);">EN</a></li>
                    </ul>
                </li>
                <!-- / Languages -->

            </ul><!-- / .nav .navbar-nav .navbar-right -->

        </div><!--/.navbar-collapse -->
    </div><!-- / .container -->
</nav><!-- / .navbar -->


<script type="application/javascript">
    function changeLang(data) {
        var baseUrl = "<?php echo base_url(); ?>";
        var oldLang =  "<?php echo $this->session->userdata('lang'); ?>";
        console.log(data.id);
        console.log(oldLang);
        if(oldLang != data.id)
        {
            var url  = baseUrl + 'change-lang/' + data.id;
            $.ajax({
                url: url,
                type: 'GET',
                contentType: false,
                processData: false,
                success: function(result){
                    console.log(result);
                },
                error: function(){
                }
            }).done(function() {
                window.location.reload(true);
            });
        }
    }

</script>