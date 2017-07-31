<style>
    .pagi{
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
    }

    .pagi>li{
        display: inline-block;
        padding: 0px 10px;
        border: 1px solid #ccc;
        margin: 20px 0;
    }
    .stay{
        background: #cf8137;
        color: #fff
    }


</style>

<!-- ========== Blog - 2 Columns ========== -->
<div id="blog" class="section container blog-columns blog-masonry">
<!--<div id="blog" class="section container blog-columns">-->
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($blogs as $blog){

                $find = array('!','+');
                $uri = str_replace($find,"",$blog['Name'.strtoupper($this->session->userdata('lang'))]);

                $url = base_url('blog/'.$blog['ID'].'/'.$uri); ?>
            <div class="col-lg-6 blog-selector">
                <div class="blog-post wow fadeIn" data-wow-delay=".1s" data-wow-duration="2s">
                    <a href="<?php echo $url ?>" class="post-img">
                        <img src="<?php echo base_url('images/blog/'.$blog['CoverImage']);?>"  alt="<?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?>"></a>
                    <div class="bp-content">
                        <div class="post-meta">
                            <a href="#" class="post-date">
                                <i class="fa fa-calendar-o"></i>
                                <span><?php echo date('M , d , Y H:i:s',strtotime($blog['SaveDate'])) ?></span>
                            </a>
                        </div>
                        <a href="<?php echo $url ?>" class="post-title"><h4><?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?></h4></a>
                        <p><?php echo $blog['shortDesc'.strtoupper($this->session->userdata('lang'))] ?></p>
                        <a href="<?php echo $url ?>" class="btn btn-small"><?php echo $this->lang->line('learn_more'); ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div style="clear: both"></div>
            <!-- Pagination -->
            <nav class="mb-sm-100">
                <ul class="pagi">
                    <?php if($_SERVER['QUERY_STRING']){ $queryString = '?'.$_SERVER['QUERY_STRING'];}else{ $queryString = null; } ?>
                    <?php if($page != 1){  $previous = $page-1; ?>
                    <li>
                        <a href="<?php echo base_url('blog/page/'.$previous.$queryString) ?>" aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                        </a>
                    </li>
                    <?php }

                    for($i=1; $i<=$pagi; $i++){ ?>
                        <?php if($page != $i) { ?>
                        <li>
                            <a href="<?php echo base_url('blog/page/'.$i.$queryString) ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php } else { ?>
                            <li class="stay"><?php echo $i; ?></li>
                    <?php }

                    } ?>
                    <?php if($page != $pagi){ $nextPage = $page+1; ?>
                    <li>
                        <a href="<?php echo base_url('blog/page/'.$nextPage.$queryString) ?>" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>

        </div><!-- / .col-md-8 -->

        <!-- ========== Sidebar ========== -->

        <?php  $this->load->view('blog/blog-sidebar')?>

    </div><!-- / .row -->
</div><!-- / .container -->
