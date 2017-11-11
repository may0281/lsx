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
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .ui-autocomplete {
            background: #ebebeb ;
            opacity: .8;
            border-radius: 5px;
            border: none;
            width: 50px;
            font-size: 12px;

        }

        .search-box {
            transition: width 0.6s, border-radius 0.6s, background 0.6s, box-shadow 0.6s;
            width: 40px;
            height: 40px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            background: transparent;
            margin-top: 5px;
        }
        .search-box + label .search-icon {
            color: #999;
        }
        .search-box:hover {
            color: white;
            background: #c8c8c8;
            box-shadow: 0 0 0 5px #3d4752;
        }
        .search-box:hover + label .search-icon {
            color: white;
        }
        .search-box:focus {
            transition: width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s;
            border: none;
            outline: none;
            box-shadow: none;
            padding-left: 15px;
            cursor: text;
            width: 180px;
            border-radius: auto;
            background: #ebebeb;
            color: black;
            font-size: 12px;
        }
        .search-box:focus + label .search-icon {
            color: black;
        }
        .search-box:not(:focus) {
            text-indent: -5000px;
        }

        #search-submit {
            position: relative;
            left: -5000px;
        }

        .search-icon {
            position: relative;
            left: -30px;
            color: white;
            cursor: pointer;
        }



    </style>
    <script>
        document.addEventListener("touchstart", function(){}, true);
    </script>

</head>

<body id="page-top"  data-spy="scroll" data-target=".navbar">

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
            <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="navbar-logo" src="<?php echo base_url('assets/images/lsx-logo-1.png') ?>" alt="Definity - Logo"></a>
        </div><!-- / .navbar-header -->

        <!-- Navbar Links -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-fw"><a href="<?php echo base_url();?>" >Home</a></li><!-- / Home -->
                <li class="dropdown mega-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Product<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <div class="row">
                            <?php
                            $productType = $this->home_model->getProductType();
                            foreach ($productType as $type) {?>
                                <div class="col-lg-3 mb-sm-30">
                                    <li class="dropdown-header"><a style="font-size: 12px; color: #0d0d0d;padding-left: 5px" href="<?php echo base_url($type['type_code']) ?>"> <?php echo $type['type_en']; ?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <?php $cate = $this->home_model->getProductCategory($type['type_code']);
                                          foreach ($cate as $ca){ ?>
                                        <li><a href="<?php echo base_url($type['type_code'].'/'.$ca['cat_code'])?>"><?php echo $ca['cat_'.$this->session->userdata('lang')] ?></a></li>
                                    <?php } ?>
                                </div>

                            <?php } ?>
                            <!-- Multi Page -->


                        </div><!-- / .row -->
                    </ul><!-- / .dropdown-menu -->
                </li><!-- / Home -->
                <li class="dropdown mega-fw">
                    <a href="<?php echo base_url('promotion')?>">Promotion </a>
                </li>
                <li class="dropdown mega-fw">
                    <a href="<?php echo base_url('portfolio');?>">Portfolio </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                    <ul class="dropdown-menu bg-solid">
                        <div class="row">
                            <div class="col-lg-7">
                                <li class="dropdown-header">BLOG</li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('blog')?>">ALL</a></li>
                                <?php
                                $this->db->select('*');
                                $this->db->from('blog_category');
                                $this->db->where('Enable',1);
                                $query = $this->db->get();
                                foreach ($query->result_array() as $blog){ ?>
                                    <li><a href="<?php echo base_url('blog?categories='.$blog['url'])?>"><?php echo $blog['cat'.strtoupper($this->session->userdata('lang'))]?></a></li>
                                <?php }?>

                            </div>
                            <div class="col-lg-5 dropdown-banner">
                                <img src="<?php echo base_url()?>assets/images/shop/baner-shop-white.png" alt="Definity eCommerce update">
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="dropdown mega-fw"><a href="<?php echo base_url('our-company');?>" >Company</a></li>
            </ul><!-- / .nav .navbar-nav -->


            <!-- Navbar Links Right -->
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <form action="<?php echo base_url('product/search'); ?>">
                        <input id="search-box" type="text" class="search-box" name="keyword" />
                        <label for="search-box">
                            <i class="fa fa-search search-icon"></i></label>
                    </form>
                </li>
<!--                <li class="dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-key"></i> Login</a>-->
<!---->
<!--                </li>-->
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

<script>
    $( function() {
        var base_url = window.location.origin;
        var url = base_url + '/product/api-product';
        $.ajax({
            url: url,
            type: 'GET',
            contentType: false,
            processData: false,
            success: function (result) {
                var availableTags = [];
                for (var j = 0; j < result.length; j++) {
                    availableTags.push(result[j]);
                }
                $("#tags_search").autocomplete({
                    source: availableTags
                });
                $("#search-box").autocomplete({
                    source: availableTags
                });

            },
            error: function(result){
                console.log(result);
            }
        });


    } );
</script>



