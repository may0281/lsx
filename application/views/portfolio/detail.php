
<!-- ========== Portfolio Single ========== -->

<section class="section container pfolio-single">
    <div class="row ws-m">

        <!-- Project Info -->
        <div class="col-md-3 mb-sm-50 project-info">
            <h5><?php echo $portfolio['name_'.$this->session->userdata('lang')] ?></h5>
            <ul>
                <li><h6>Date:</h6><span><?php echo date('M d,Y',strtotime($portfolio['create_date'])); ?></span></li>
                <li><h6>Link:</h6><a href="<?php echo $portfolio['url']; ?>"><?php echo $portfolio['url']; ?></a></li>
                <li><h6>Type:</h6><span><?php echo $portfolio['tags']; ?></span></li>
            </ul>
        </div>

        <!-- Challenge -->
        <div class="col-md-offset-1 col-md-8 mb-sm-50">
            <h5 class="h-alt"><?php echo $this->lang->line('portfolio_about_heading') ?></h5>
            <p><?php echo $portfolio['challenge_'.$this->session->userdata('lang')]?></p>
        </div>
    </div><!-- / .row -->

    <!-- Slider -->
    <div class="row">
        <div class="col-md-12">
            <ul class="single-img-slider">
                <?php foreach ($portfolio_gallery as $pg){  ?>
                    <li><img src="<?php echo base_url('images/portfolio/'.$pg['img']) ?>" alt="<?php echo $this->lang->line('portfolio_about_heading') ?>"></li>
                <?php } ?>
            </ul>
        </div>
    </div><!-- / .row -->

</section><!-- / .container -->

<!-- ========== Project Nav ========== -->

<div class="gray-bg project-nav">
    <div class="container">
        <div class="row">

            <nav>
                <ul class="nav-btns">
                    <?php if($prevUrl) {?>
                        <li class="prev"><a href="<?php echo base_url('portfolio/'.$prevUrl); ?>"><span class="nav-icon linea-arrows-slim-left"></span>  prev project</a></li>
                    <?php } ?>
                    <li class="all"><a href="<?php echo base_url('portfolio') ?>"><span class="nav-icon linea-arrows-squares"></span></a></li>
                    <?php if($nextUrl) {?>
                        <li class="next"><a href="<?php echo base_url('portfolio/'.$nextUrl); ?>">next project <span class="nav-icon linea-arrows-slim-right"></span></a></li>
                    <?php } ?>
                </ul>
            </nav>

        </div>
    </div>
</div><!-- / .project-nav -->
        

