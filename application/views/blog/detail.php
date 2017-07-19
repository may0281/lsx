<div id="blog" class="section container blog-classic">
    <div class="row">
        <div class="col-md-8 mb-sm-160">

            <!-- Blog Post -->
            <div class="col-md-12 blog-post-single wow fadeIn" data-wow-delay=".1s" data-wow-duration="2s">

                <!-- Image -->
                <img class="img-responsive post-img"  src="<?php echo base_url('images/blog/'.$blog['CoverImage']);?>" alt="<?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?>">

                <!-- Meta data -->
                <div class="post-meta">
                    <a href="#" class="post-date">
                        <i class="fa fa-calendar-o"></i>
                        <span><?php echo  date('M d,Y',strtotime($blog['SaveDate']))?></span>
                    </a>
                    <a href="#" class="post-comments">
                        <i class="fa fa-tags"></i>
                        <?php $tags = explode(',',$blog['tags']); foreach ($tags as $tag){ echo '<span>'.$tag.'</span>'; } ?>
                    </a>
                </div><!-- / .meta -->

                <!-- Title -->
                <h2 class="post-title"><?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?></h2>


                <div class="blog-post-content" style="overflow: scroll">
                    <!-- Intro -->
                    <p><?php echo $blog['Description'.strtoupper($this->session->userdata('lang'))] ?></p>
                    <?php if($blog['Video']){
                        $videoId = explode('?v=',$blog['Video']);
                        ?>
                        <p style="margin-top: 20px"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId['1'] ?>" frameborder="0" allowfullscreen></iframe></p>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php  $this->load->view('blog/blog-sidebar')?>
    </div>
</div>