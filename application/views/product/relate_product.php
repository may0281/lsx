<div class="gray-bg">
    <div class="container section">

        <div class="row">
            <header class="sec-heading">
                <h2>Related Products</h2>
            </header>
            <?php foreach ($relates as $relate){
                $find = array("!","+","?","'"," ","(",")","&");;
                $uri = str_replace($find,"-",$relate['name_'.$this->session->userdata('lang')]);
                $url = base_url('product/'.$relate['product_code'].'/'.$uri);
                ?>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="shop-product-card">
                    <div class="product-image-wrapper">
                        <a href="<?php echo $url; ?>" class="buy-btn"><span class="linea-ecommerce-bag"></span></a>
                        <div class="shop-p-slider">

                            <a href="<?php echo $url; ?>"><img src="<?php echo base_url('images/product/'.$relate['cover_img']) ?>" height="300px" alt="<?php echo $relate['name_'.$this->session->userdata('lang')] ?>"></a>
                        </div>
                    </div>
                    <div class="product-meta">
                        <a href="<?php echo $url; ?>"><h4 class="product-name"><?php echo $relate['name_'.$this->session->userdata('lang')] ?></h4></a>
                        <span class="product-sep"></span>
                        <p class="product-price"><?php echo $relate['type_'.$this->session->userdata('lang')] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>