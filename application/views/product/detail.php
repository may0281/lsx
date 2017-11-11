<!--<script src='--><?php //echo base_url()?><!--assets/js/elevate/jquery-1.8.3.min.js'></script>-->
<script src='<?php echo base_url()?>assets/js/elevate/jquery.elevatezoom.js'></script>
<div class="container section">
    <div class="row ws-m">

        <div class="col-md-12">
            <ul class="product-meta">
                <li>SKU: <?php echo $q['sku']; ?></li>
                <li>Tags: <?php echo $q['tags']; ?> </li>
            </ul>
        </div>

        <div class="col-md-5">
            <ul class="prod_single_img_slider">
                <?php foreach ($g as $ga){ ?>
                <li >
                    <img style="width: 90%;data-zoom-image="<?php echo base_url('images/product/'.$ga['Image']) ?>"  class="img-responsive zoom" src="<?php echo base_url('images/product/'.$ga['Image']) ?>" alt="Product Image">
                </li>
                <?php }?>
            </ul>
        </div><!-- / .col-md-6 -->


        <!-- Product Description -->
        <div class="col-md-7 product-info">
            <span class="prod-cat"><?php echo $q['type_'.$this->session->userdata('lang')]; ?></span>
            <h1 class="prod-name"><?php echo $q['name_'.$this->session->userdata('lang')]; ?></h1>
<!--            <h3 class="prod-price">$357.99 <span class="price-cut">$457.99</span></h3>-->
            <p class="prod-desc" style="line-height: 50px">
                <strong>Category : </strong><?php echo strtoupper($q['cat_'.$this->session->userdata('lang')]); ?> <?php echo strtoupper($q['sub_'.$this->session->userdata('lang')]); ?> <br>
                <strong>SKU : </strong><?php echo $q['sku']; ?>
            </p>
            <p class="prod-desc" style="line-height: 50px">
                <?php echo $q['desc_'.$this->session->userdata('lang')]; ?>
            </p>


            <p class="prod-desc" style="line-height: 40px">
                <strong>Note : </strong><?php echo $q['note_'.$this->session->userdata('lang')]; ?>
            </p>

            <a href="<?php echo base_url('images/product/'.$ga['Image']) ?>" download> <button class="btn btn-ghost btn-small">Download Originals Size</button></a>

        </div><!-- / .col-md-5 -->
    </div><!-- / .row -->
    <div style="clear: both;height: 20px"></div>
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php if($q['description_th'] || $q['description_th']){ ?>
                    <li role="presentation" class="active"><a href="#tab-description" aria-controls="tab-description" role="tab" data-toggle="tab">Description</a></li>
                <?php } ?>

                <?php if($q['information_th'] || $q['information_en']){ ?>
                    <li role="presentation"><a href="#tab-sizeguide" aria-controls="tab-sizeguide" role="tab" data-toggle="tab">Information</a></li>
                <?php } ?>


                <?php if($q['installation_th'] || $q['installation_en']){ ?>
                    <li role="presentation"><a href="#tab-reviews" aria-controls="tab-reviews" role="tab" data-toggle="tab">Installation</a></li>
                <?php } ?>

                <?php if($q['maintenance_th'] || $q['maintenance_en']){ ?>
                    <li role="presentation"><a href="#tab-help" aria-controls="tab-help" role="tab" data-toggle="tab">Maintenance</a></li>
                <?php } ?>

                <?php if($q['caution_th'] || $q['caution_en']){ ?>
                    <li role="presentation"><a href="#tab-caution" aria-controls="tab-caution" role="tab" data-toggle="tab">Caution</a></li>
                <?php } ?>


                <?php if($q['certificate_th'] || $q['certificate_en']){ ?>
                    <li role="presentation"><a href="#tab-certificate" aria-controls="tab-certificate" role="tab" data-toggle="tab">Certificate</a></li>
                <?php } ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Item Description -->
                <?php if($q['description_th'] || $q['description_th']){ ?>
                    <div role="tabpanel" class="tab-pane active" id="tab-description">
                        <?php echo $q['description_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>

                <?php if($q['information_th'] || $q['information_en']){ ?>
                    <div role="tabpanel" class="tab-pane" id="tab-sizeguide">
                        <?php echo $q['information_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>

                <?php if($q['installation_th'] || $q['installation_en']){ ?>
                    <div role="tabpanel" class="tab-pane prod-reviews" id="tab-reviews">
                        <?php echo $q['installation_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>

                <?php if($q['maintenance_th'] || $q['maintenance_en']){ ?>
                    <div role="tabpanel" class="tab-pane ft-steps-numbers" id="tab-help">
                        <?php echo $q['maintenance_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>

                <?php if($q['caution_th'] || $q['caution_en']){ ?>
                    <div role="tabpanel" class="tab-pane ft-steps-numbers" id="tab-caution">
                        <?php echo $q['caution_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>

                <?php if($q['certificate_th'] || $q['certificate_en']){ ?>
                    <div role="tabpanel" class="tab-pane ft-steps-numbers" id="tab-certificate">
                        <?php echo $q['certificate_'.$this->session->userdata('lang')];?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div><!-- / .container -->
<script>
    $('.zoom').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
//        zoomWindowFadeIn: 500,
//        zoomWindowFadeOut: 750
    });
</script>