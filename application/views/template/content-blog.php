<div class="gray-bg">
    <section class="section container blog-columns blog-preview">
        <div class="row">
            <header class="sec-heading">
                <h2><?php echo $this->lang->line('blog_heading'); ?></h2>
                <span class="subheading"><?php echo $this->lang->line('blog_subheading'); ?></span>
            </header>
            <?php foreach ($blogs as $blog){
                $find = array('!','+',' ','(',')');
                $blogUri = str_replace($find,"-",$blog['Name'.strtoupper($this->session->userdata('lang'))]);
                $blogUrl =  base_url('blog/'.$blog['ID'].'/'.$blogUri);
            ?>
            <div class="col-lg-4 col-md-6 mb-sm-50">
                <div class="blog-post wow fadeIn" data-wow-duration="2s">
                    <a href="<?php echo $blogUrl; ?>" class="post-img"><img src="<?php echo base_url('images/blog/'.$blog['CoverImage'])?>" alt="<?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?>"></a>
                    <div class="bp-content">
                        <div class="post-meta">
                            <a href="#" class="post-date">
                                <i class="fa fa-calendar-o"></i>
                                <span><?php echo date('M , d , Y H:i:s',strtotime($blog['SaveDate'])) ?></span>
                            </a>
                        </div>
                        <a href="<?php echo $blogUrl ?>" class="post-title"><h4><?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?></h4></a>
                        <p><?php echo $blog['shortDesc'.strtoupper($this->session->userdata('lang'))] ?></p>
                        <a href="<?php echo $blogUrl ?>" class="btn btn-small"> <?php echo $this->lang->line('learn_more'); ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>