<div class="">
    <div class="container section">

        <div class="row">
            <header class="sec-heading">
                <h2>Top Rated Products</h2>
            </header>
            <?php $i =1; foreach ($product_list as $productList){
                $find = array("!","+","?","'"," ","(",")","&");
                $uri = str_replace($find,"-",$productList['name_'.$this->session->userdata('lang')]);
                $url = base_url('product/'.$productList['product_code'].'/'.$uri);?>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="shop-product-card">
                            <div class="product-image-wrapper">
                                <a href="<?php echo $url ?>" class="buy-btn"><span class="linea-ecommerce-bag"></span></a>
                                <div class="shop-p-slider">
                                    <a href="<?php echo $url ?>"><img src="<?php echo base_url('images/product/'.$productList['cover_img']) ?>" alt="<?php echo $productList['name_'.$this->session->userdata('lang')]?>"></a>
                                </div>
                            </div>

                            <div class="product-meta">
                                <a href="<?php echo $url ?>"><h4 class="product-name"><?php echo $productList['name_'.$this->session->userdata('lang')]?></h4></a>
                                <span class="product-sep"></span>
                                <p class="product-price"><?php echo $productList['cat_code']?> / <?php echo $productList['sub_cat_code']?></p>
                            </div>
                        </div>
                    </div>
                    <?php if($i==4){ echo "<div class='clear'></div>"; } ?>
            <?php $i++; } ?>
        </div>
    </div>
</div>