<!-- ========== Hero Cover ========== -->

<div class="fs-slider-hero">
    <div class="fs-slider">

        <?php foreach($slides as $slide){ ?>
            <!-- Slide 1 -->
            <div class="fs-slider-item <?php echo $slide['type'];?>" style="background: url(<?php echo base_url().'images/content/'.$slide['img'];?>) no-repeat;  width: auto;">
                <div class="bg-overlay">

                    <!-- Hero Content -->
                    <div class="hero-content-wrapper">
                        <div class="hero-content">

                            <h1 class="hero-lead wow fadeInUp" data-wow-duration="2s"> <?php echo $slide['text_h1_'.$this->session->userdata('lang')];?></h1>
                            <h4 class="h-alt hero-subheading wow fadeIn" data-wow-delay=".5s" data-wow-duration="1.5s"><?php echo $slide['text_normal_'.$this->session->userdata('lang')];?></h4>
                            <?php if($slide['url']){?>
                                <a href="<?php echo $slide['url'];?>" class="btn btn-light wow fadeInDown" data-wow-delay=".7s" data-wow-duration="2s"> <?php echo $this->lang->line('learn_more'); ?></a>
                            <?php }?>
                        </div>
                    </div>

                </div><!-- / .bg-overlay -->
            </div><!-- / .fs-slide-1 -->
        <?php } ?>
    </div><!-- / .fs-slider -->

    <!-- Scroller -->
    <a href="#products" class="scroller">
        <span class="scroller-text">scroll down</span>
        <span class="linea-basic-magic-mouse"></span>
    </a>

</div><!-- / .fs-slider-hero -->

