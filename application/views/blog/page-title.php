<header class="page-title pt-light pt-plax-md-dark" data-stellar-background-ratio="0.4">
    <div class="bg-overlay">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <h1 style="color: #ffffff"><?php echo strtoupper($menu) ?></h1>
                    <span class="subheading"><?php echo $header ?></span>
                </div>
                <ol class="col-sm-6 text-right breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li><a href="<?php echo base_url('blog') ?>"><?php echo $menu ?></a></li>
                    <?php if($subMenu){ ?>
                        <li class="active"><?php echo $subMenu ?></li>
                    <?php } ?>
                </ol>

            </div>
        </div>
    </div>
</header>
