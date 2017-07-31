<div id="blog" class="section container blog-classic">
    <div class="row">
        <?php  $this->load->view('promotion/sidebar')?>
        <div class="col-md-8 mb-sm-160">

            <!-- Blog Post -->
            <div class="col-md-12 blog-post-single wow fadeIn" data-wow-delay=".1s" data-wow-duration="2s">

                <!-- Image -->
                <img class="img-responsive post-img"  src="<?php echo base_url('images/promotion/'.$promotion['CoverImage']);?>" alt="<?php echo $promotion['Name'.strtoupper($this->session->userdata('lang'))] ?>">

                <!-- Meta data -->
                <div class="post-meta">
                    <a href="#" class="post-date">
                        <i class="fa fa-calendar-o"></i>
                        <span><?php echo  date('M d,Y',strtotime($promotion['UpdatedAt']))?></span>
                    </a>

                </div><!-- / .meta -->

                <!-- Title -->
                <h2 class="post-title"><?php echo $promotion['Name'.strtoupper($this->session->userdata('lang'))] ?></h2>


                <div class="blog-post-content" style="overflow: scroll">
                    <!-- Intro -->
                    <p><?php echo $promotion['Description'.strtoupper($this->session->userdata('lang'))] ?></p>
                    <?php if($promotion['Video']){
                        $videoId = explode('?v=',$promotion['Video']);
                        ?>
                        <p style="margin-top: 20px"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId['1'] ?>" frameborder="0" allowfullscreen></iframe></p>
                    <?php }?>
                </div>
            </div>
        </div>

    </div>
</div>