
<div class="col-md-3">
    <aside class="shop-sidebar-vertical mb-sm-100">
        <!-- Search Widget -->
        <form method="post" action="<?php echo base_url('product/search'); ?>">
            <div class="shop-widget search-widget">
                <div class="form-group">
                    <input id="tags_search" name="keyword" type="search" placeholder="Search ..." class="form-control">
                    <button class="inside-input-btn"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <?php $this->load->view('template/tags'); ?>
        <div class="shop-widget" >
            <div class="" id="faq-accordion-1" role="tablist" aria-multiselectable="true">
                <h5 class="header-widget">Product Type</h5>
                <?php
                    $type = $this->home_model->getCountProductOnProductType();
                    $i=1;
                    foreach ($type as $t){
                ?>
                    <div class="" style="margin-bottom: 20px;">
                        <div class="" role="tab" id="heading-<?php echo $i; ?>" style="border-bottom: 1px dotted #cccccc ">
                            <span role="button" data-toggle="collapse" data-parent="#faq-accordion-1" href="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>">
                                <span> + </span> <?php echo $t['type_'.$this->session->userdata('lang')] ?> <span> [<?php echo $t['total']; ?>]</span>
                            </span>
                        </div>
                        <div id="collapse-<?php echo $i; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading-<?php echo $i; ?>">
                            <div class="panel-body">
                                <?php
                                    $cate = $this->home_model->getProductCategory($t['type_code']);
                                    foreach ($cate as $ca){?>
                                    <a href="<?php echo base_url($t['type_code'].'/'.$ca['cat_code']) ?>"><?php echo $ca['cat_'.$this->session->userdata('lang')]; ?> </a> <br>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php $i++; } ?>
                </div>
        </div>

        <!-- Product - Widget -->
        <div class="shop-widget product-widget">
            <h5 class="header-widget">New Product</h5>
            <?php $products  = $this->home_model->getProductList();
                    foreach ($products as $pa){
                        $find = array('!','+',' ','(',')');
                        $uri = str_replace($find,"-",$pa['name_'.$this->session->userdata('lang')]);
                        $url = base_url('product/'.$pa['product_code'].'/'.$uri);
            ?>
            <div class="cart-item">
                <a href="<?php echo $url ?>"><img src="<?php echo base_url('images/product/'.$pa['cover_img'])?>" alt="<?php echo $pa['name_'.$this->session->userdata('lang')];?>" width="50px" class="p-thumb"></a>
                <a href="<?php echo $url ?>" class="cp-name"><?php echo $pa['name_'.$this->session->userdata('lang')] ?></a>
                <p class="cp-price"><?php echo $pa['sku'] ?></p>
            </div>
            <?php }?>

        </div><!-- / .cart-widget -->

        <div class="shop-widget recent-posts-widget">
            <h5 class="header-widget">Recent Blog</h5>
            <?php
            $recentBlog = $this->home_model->getRecentBlog();
            foreach ($recentBlog as $blog){
                $blogUri = str_replace($find,"-",$blog['Name'.strtoupper($this->session->userdata('lang'))]);
                $blogUrl =  base_url('blog/'.$blog['ID'].'/'.$blogUri);
                ?>
                <!-- Item 1 -->
                <div class="widget-item">
                    <a href="<?php echo $blogUrl; ?>"><h6 class="h-alt"><?php echo $blog['Name'.strtoupper($this->session->userdata('lang'))] ?></h6></a>
                    <span><?php echo date('M  d,Y',strtotime($blog['SaveDate'])) ?></span>
                </div>
            <?php  } ?>
        </div><!-- / .recent-posts-widget -->
    </aside><!-- / .shop-sidebar-vertical -->
</div><!-- / .col-md-3 -->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        var base_url = window.location.origin;
        var url = base_url + '/product/api-product';
        $.ajax({
            url: url,
            type: 'GET',
            contentType: false,
            processData: false,
            success: function (result) {
                var availableTags = [];
                for (var j = 0; j < result.length; j++) {
                    availableTags.push(result[j]);
                }
                $("#tags_search").autocomplete({
                    source: availableTags
                });

            },
            error: function(result){
                console.log(result);
            }
        });


    } );
</script>
