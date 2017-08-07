<style>
    .pagi{
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
    }

    .pagi>li{
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #ccc;
        margin: 0px -3px;
        background: #ffffff;
    }
    .pagi>li.stay{
        background: #cf8137;
        color: #fff
    }

</style>

<section class="container section portfolio-layout portfolio-1col-boxed">
    <div class="row">
        <header class="sec-heading">
            <h2><?php echo $this->lang->line('portfolio_heading') ?> </h2>
            <span class="subheading"><?php echo $this->lang->line('portfolio_subheading') ?></span>
        </header>
    </div>
    <div class="row">
        <div id="pfolio">
            <?php $i=1; foreach ($portfolios as $portfolio) {
                $find = array('!','+',' ','(',')');
                $portUri = str_replace($find,"-",$portfolio['name_'.$this->session->userdata('lang')]);
                $portUrl =  base_url('portfolio/'.$portfolio['id'].'/'.$portUri);
            ?>
            <figure class="portfolio-item print">
                <div class="col-md-7 no-gap img-wrapper <?php echo ($i%2 == 0) ? 'pull-right' : null;  ?>">
                    <img src="<?php echo base_url('images/portfolio/'.$portfolio['img']) ?>" alt="<?php echo $portfolio['name_'.$this->session->userdata('lang')] ?>">
                </div>
                <figcaption class="col-md-5 no-gap">
                    <h3><?php echo $portfolio['name_'.$this->session->userdata('lang')]?></h3>
                    <h5 class="subheading"><?php echo $portfolio['tags'] ?></h5>
                    <p><?php echo $portfolio['challenge_'.$this->session->userdata('lang')] ?></p>
                    <a href="<?php echo $portUrl; ?>" class="btn-ghost btn-small view-btn">View project</a>
                </figcaption>
            </figure>
            <?php $i++; }?>
        </div>
    </div>
</section>
<div style="clear: both"></div>
<!-- Pagination -->
    <nav class="" style="display: table;margin: 0 auto;">
        <ul class="pagi">
            <?php if($_SERVER['QUERY_STRING']){ $queryString = '?'.$_SERVER['QUERY_STRING'];}else{ $queryString = null; } ?>
            <?php if($page != 1){  $previous = $page-1; ?>
                <li>
                    <a href="<?php echo base_url('portfolio/page/'.$previous.$queryString) ?>" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
            <?php }

            for($i=1; $i<=$pagi; $i++){ ?>
                <?php if($page != $i) { ?>
                    <li>
                        <a href="<?php echo base_url('portfolio/page/'.$i.$queryString) ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="stay"><?php echo $i; ?></li>
                <?php }

            } ?>
            <?php if($page != $pagi){ $nextPage = $page+1; ?>
                <li>
                    <a href="<?php echo base_url('portfolio/page/'.$nextPage.$queryString) ?>" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>

