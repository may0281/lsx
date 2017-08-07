<header class="page-title  pt-dark pt-plax-lg-dark"
        data-stellar-background-ratio="0.4" style="background: url(../../assets/images/vintage-modern-decor.jpg) repeat;">
    <div class="container">
        <div class="row" style="padding-top: 40px">

            <div class="col-sm-6">
                <h1><?php echo strtoupper($title) ?></h1>
                <span class="subheading"><?php echo strtoupper($subTitle) ?></span>
            </div>
            <ol class="col-sm-6 text-right breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url($menu1); ?>"><?php echo strtoupper($menu1) ?></a></li>
                <li class="active"><?php echo strtoupper($menu2) ?></li>
            </ol>

        </div>
    </div>
</header>