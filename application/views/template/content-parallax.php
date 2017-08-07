<div id="skillsCircles" class="circles-counters" >
    <div class="container" >
        <div class="row section" style="color: #ffffff">

            <div class="col-md-12" style="margin-bottom: 50px;text-align: center;">
                <h2 style="color: #ffffff"><?php echo $this->lang->line('about'); ?> </h2>
            </div>
            <div class="col-md-6">
                <p><?php echo $about1['content_'.$this->session->userdata('lang')] ?></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $about2['content_'.$this->session->userdata('lang')] ?></p>
            </div>

        </div><!-- / .row -->
        <div class="row ws-m">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url('our-company') ?>" class=" btn-light"><?php echo $this->lang->line('about_btn'); ?></a>
            </div>
        </div>
    </div><!-- / .container -->
</div><!-- / .circles-counters -->
