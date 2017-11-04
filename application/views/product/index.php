<?php $find = array("!","+","?","'"," ","(",")");; ?>
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

<div class="gray-bg">
    <div class="container section-shop">

        <div class="row">
            <!-- Shop Sidebar - (vertical) -->
            <?php $this->load->view('product/sidebar') ?>
            <!-- Shop Layout - (3 columns) -->
            <div class="col-md-9">
                <div class="row">
                    <!-- Shop Product -->
                    <?php foreach ($product as $pr) {
                        $uri = str_replace($find,"-",$pr['name_'.$this->session->userdata('lang')]);
                        $url = base_url('product/'.$pr['product_code'].'/'.$uri);
                        ?>
                    <div class="col-xs-12 col-sm-6 col-lg-4 mb-30">
                        <div class="shop-product-card">
                            <div class="product-image-wrapper">
                                <a href="<?php echo $url;?>" class="buy-btn"><span class="linea-ecommerce-bag"></span></a>
                                <div class="shop-p-slider">
                                    <a href="<?php echo $url;?>"><img src="<?php echo base_url('images/product/'.$pr['cover_img']) ?>" alt="<?php echo $pr['name_'.$this->session->userdata('lang')] ?>"></a>
                                </div>
                            </div>

                            <!-- Product Meta -->
                            <div class="product-meta">
                                <a href="<?php echo $url;?>"><h4 class="product-name"><?php echo $pr['name_'.$this->session->userdata('lang')] ?></h4></a>
                                <span class="product-sep"></span>
                                <p class="product-price"><?php echo $pr['sku'];?></p>
                            </div>

                        </div><!-- / .shop-product-card -->
                    </div><!-- / .col-sm-3 -->
                    <?php } ?>
                </div><!-- / .row -->
                <!-- Pagination -->
                <div class="row">
                    <nav class="blog-pagination text-center">
                        <div class="col-xs-12 col-sm-6 col-md-12 mb-sm-30">
                            <?php  if($total  > 1){?>
                                <span>SHOWING <strong><?php echo (($page*12)-12)+1; ?></strong> – <strong><?php echo ($page*12 < $total)? $page*12 : $total; ?> </strong> OF <strong><?php echo $total; ?></strong> RESULTS</span>
                            <?php } else{?>
                                <span><strong><?php echo $total; ?></strong> RESULTS</span>
                            <?php }?>
                        </div>
                        <?php if($pagi > 1) {?>
                            <?php $uri = explode('?',$_SERVER['REQUEST_URI']); ?>
                            <ul class="pagi">
                                <?php  $previous = $page-1; $urlPage = base_url($uri[0].'?page='.$previous); if($page == 1){$urlPage = '';}?>
                                <li>
                                    <a href="<?php echo $urlPage ?>" aria-label="Previous">
                                        <span aria-hidden="true">Previous</span>
                                    </a>
                                </li>
                                <?php if($pagi <= 15) {?>

                                    <?php for($i=1;$i<=$pagi; $i++ ){ ?>
                                        <?php if($i != $page){ ?>
                                            <li>
                                                <a href="<?php echo base_url($uri[0].'?page='.$i) ?>">
                                                    <?php echo $i; ?>
                                                </a>
                                            </li>
                                        <?php }else{ ?>
                                            <li class="stay">
                                                <?php echo $i; ?>
                                            </li>
                                        <?php }?>
                                    <?php } $nextPage = $page+1;?>

                                <?php } else { ?>


                                    <?php if($page <= 15)
                                    {
                                        for($i=1;$i<=16; $i++ ){ ?>
                                            <?php if($i != $page){ ?>
                                                <li><a href="<?php echo base_url($uri[0].'?page='.$i) ?>"><?php echo $i; ?></a></li>
                                            <?php }else{ ?>
                                                <li class="stay"><?php echo $i; ?></li>
                                            <?php }?>

                                        <?php } ?>
                                        <li> ... </li>
                                        <li><a href="<?php echo base_url($uri[0].'?page='.$pagi) ?>"><?php echo $pagi; ?></a></li>

                                    <?php } else { ?>
                                        <li> <a href="<?php echo base_url($uri[0].'?page=1') ?>"> 1 </a> </li>
                                        <li> ... </li>
                                        <?php
                                        $start = $page - 7;
                                        $end = ($page+8 >= $pagi) ? $pagi : $page+8;
                                        if(($end-$start) < 15)
                                        {
                                            $start = $end-15;
                                        }
                                        for($i=$start;$i<=$end; $i++ ){ ?>
                                            <?php if($i != $page){ ?>
                                                <li><a href="<?php echo base_url($uri[0].'?page='.$i) ?>"><?php echo $i; ?></a></li>
                                            <?php }else{ ?>
                                                <li class="stay"><?php echo $i; ?></li>
                                            <?php }?>
                                        <?php } ?>

                                        <?php if($i == $pagi) { ?>
                                            <li><a href="<?php echo base_url($uri[0].'?page='.$i) ?>"><?php echo $i; ?></a></li>
                                        <?php } ?>
                                        <?php if($i < $pagi) { ?>
                                            <li> ... </li>
                                            <li><a href="<?php echo base_url($uri[0].'?page='.$pagi) ?>"><?php echo $pagi; ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php $nextPage = $page+1; ?>
                                <li>
                                    <a href="<?php echo base_url($uri[0].'?page='.$nextPage) ?>" aria-label="Next">
                                        <span aria-hidden="true">Next</span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </nav>
                </div>

            </div>
        </div>

    </div>
</div>