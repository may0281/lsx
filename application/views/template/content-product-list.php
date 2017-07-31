<div class="">
    <div class="container section">

        <div class="row">
            <header class="sec-heading">
                <h2>Top Rated Products</h2>
            </header>

            <!-- Shop Product -->
            <?php foreach ($product_list as $productList){
                $find = array('!','+',' ','(',')');
                $uri = str_replace($find,"-",$productList['name_'.$this->session->userdata('lang')]);
                $url = base_url('product/'.$productList['product_code'].'/'.$uri);?>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="shop-product-card">

                    <!-- Image/Slider -->
                    <div class="product-image-wrapper">
<!--                        <span class="label label-red sale-label">SALE</span>-->

                        <a href="<?php echo $url ?>" class="buy-btn"><span class="linea-ecommerce-bag"></span></a>
<!--                        <a href="#" class="fav-btn"><span class="linea-basic-star"></span></a>-->

                        <!-- Product Main Image -->
                        <div class="shop-p-slider">
                            <a href="<?php echo $url ?>"><img src="<?php echo base_url('images/product/'.$productList['cover_img']) ?>" alt="<?php echo $productList['name_'.$this->session->userdata('lang')]?>"></a>
                        </div>
                    </div>

                    <!-- Product Meta -->
                    <div class="product-meta">
                        <a href="<?php echo $url ?>"><h4 class="product-name"><?php echo $productList['name_'.$this->session->userdata('lang')]?></h4></a>
                        <span class="product-sep"></span>
                        <p class="product-price"><?php echo $productList['cat_code']?> / <?php echo $productList['sub_cat_code']?></p>
                    </div>

                </div><!-- / .shop-product-card -->
            </div><!-- / .col-sm-3 -->
            <?php } ?>

            <!-- Shop Product -->
<!--            <div class="col-xs-12 col-sm-6 col-lg-3">-->
<!--                <div class="shop-product-card">-->
<!---->
<!--                    <div class="product-image-wrapper">-->
<!--                        <span class="label label-red sale-label">SALE</span>-->
<!---->
<!--                        <a href="#" class="buy-btn"><span class="linea-ecommerce-bag"></span></a>-->
<!--                        <a href="#" class="fav-btn"><span class="linea-basic-star"></span></a>-->
<!---->
<!--                        <div class="shop-p-slider">-->
<!--                            <a href="pages/shop/shop-single.html"><img src="--><?php //echo base_url('image/as/AS-14100-CN74-White-Mocha-Wood-Yoko_Zoom-300x300.jpg') ?><!--" alt="Product Image 6"></a>-->
<!--                            <a href="pages/shop/shop-single.html"><img src="http://placehold.it/263x350" alt="Product Image 11"></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="product-meta">-->
<!--                        <a href="pages/shop/shop-single.html"><h4 class="product-name">Light Blue Blazer</h4></a>-->
<!--                        <span class="product-sep"></span>-->
<!--                        <p class="product-price"><span class="price-cut">$187.99</span> $97.99</p>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->



        </div><!-- / .row -->
    </div><!-- / .container -->
</div><!-- / .gray-bg -->