<div id="products" class="gray-bg">
    <section class="container section ft-cards-2">
        <div class="row">
            <?php foreach($product_type as $type){ ?>
            <div class="col-md-6">
                <!-- Item 1 -->
                <div class="ft-card-item wow fadeInUp" data-wow-duration="1.2s">
                    <img src="<?php echo base_url('images/product/'.$type['img']); ?>" alt="Feature Image">
                    <div class="ft-content">
                        <h5><?php echo $type['type_'.$this->session->userdata('lang')]; ?></h5>
                        <p><?php echo $type['short_description_'.$this->session->userdata('lang')]; ?></p>
                        <a href="<?php echo base_url($type['type_code']) ?>" class="link-btn">View Product List <span class="linea-arrows-slim-right"></span></a>
                    </div>
                </div><!-- / .ft-card-item -->
            </div><!-- / .col-md-6 -->
            <?php } ?>
        </div><!-- / .row -->
    </section><!-- / .container -->
</div><!-- / .gray-bg -->