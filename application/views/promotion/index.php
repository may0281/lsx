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
<div id="blog" class="section container blog-classic">
    <div class="row">

        <?php $this->load->view('promotion/sidebar'); ?>
        <div class="col-md-8">
            <?php foreach ($promotions as $promotion){
                $find = array('!','+');
                $uri = str_replace($find,"",$promotion['Name'.strtoupper($this->session->userdata('lang'))]);
                $url = base_url('promotion/'.$promotion['ID'].'/'.$uri);
            ?>
            <div class="col-md-12">
                <div class="blog-post wow fadeIn" data-wow-delay=".1s" data-wow-duration="2s">
                    <a href="<?php echo $url;?>" class="post-img"><img src="<?php echo base_url('images/promotion/'.$promotion['CoverImage']) ?>" alt="<?php echo $promotion['Name'.strtoupper($this->session->userdata('lang'))] ?>"></a>
                    <div class="bp-content">
                        <div class="post-meta">
                            <a href="#" class="post-date">
                                <i class="fa fa-calendar-o"></i>
                                <span><?php echo date('M d,Y',strtotime($promotion['UpdatedAt'])) ?></span>
                            </a>
                        </div>
                        <a href="<?php echo $url; ?>" class="post-title"><h3><?php echo $promotion['Name'.strtoupper($this->session->userdata('lang'))] ?></h3></a>
                        <p><?php echo $promotion['ShortDescription'.strtoupper($this->session->userdata('lang'))] ?></p>
                        <a href="<?php echo $url ?>" class="btn btn-small">Read More</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div style="clear: both"></div>
            <nav class="mb-sm-100">
                <ul class="pagi">
                    <?php if($_SERVER['QUERY_STRING']){ $queryString = '?'.$_SERVER['QUERY_STRING'];}else{ $queryString = null; } ?>
                    <?php if($page != 1){  $previous = $page-1; ?>
                        <li>
                            <a href="<?php echo base_url('promotion/page/'.$previous.$queryString) ?>" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                    <?php }
                    for($i=1; $i<=$pagi; $i++){ ?>
                        <?php if($page != $i) { ?>
                            <li>
                                <a href="<?php echo base_url('promotion/page/'.$i.$queryString) ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="stay"><?php echo $i; ?></li>
                        <?php }
                    } ?>
                    <?php if($page != $pagi){ $nextPage = $page+1; ?>
                        <li>
                            <a href="<?php echo base_url('promotion/page/'.$nextPage.$queryString) ?>" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>