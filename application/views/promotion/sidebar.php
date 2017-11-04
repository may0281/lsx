<?php $find = array("!","+","?","'"," ","(",")");; ?>
<aside class="col-md-3 sidebar mb-sm-160">
    <!-- Search - Widget -->
    <form method="post" action="<?php echo base_url('promotion/search'); ?>">
    <div class="col-md-12 ws-s search-widget">
        <div class="form-group">
            <input type="search" name="keyword" value="<?php echo $keyword;?>" placeholder="Search ..." class="form-control">
            <button type="submit" class="inside-input-btn"><i class="fa fa-search"></i></button>
        </div>
    </div><!-- / .searh-widget -->
    </form>
    <?php $this->load->view('template/tags'); ?>
    <div class="col-md-12 ws-s categories-widget">
        <h5 class="header-widget">Product Type</h5>
        <?php
            $productType = $this->home_model->getCountProductOnProductType();
            foreach ($productType as $pType){
        ?>
        <div class="widget-item">
            <a href="<?php echo base_url($pType['url']);?>"><?php echo $pType['type_'.$this->session->userdata('lang')]; ?> <span> - <?php echo $pType['total']; ?></span></a>
        </div>
        <?php } ?>
    </div>
    <!-- Recent Posts - Widget -->
    <div class="shop-widget product-widget">
        <h5 class="header-widget">Recent Product</h5>
        <?php $products  = $this->home_model->getProductList();
        foreach ($products as $pa){
            $find = array("!","+","?","'"," ","(",")");;
            $uri = str_replace($find,"-",$pa['name_'.$this->session->userdata('lang')]);
            $url = base_url('product/'.$pa['product_code'].'/'.$uri);
            ?>
            <div class="cart-item">
                <a href="<?php echo $url ?>"><img src="<?php echo base_url('images/product/'.$pa['cover_img'])?>" alt="<?php echo $pa['name_'.$this->session->userdata('lang')];?>" width="50px" class="p-thumb"></a>
                <a href="<?php echo $url ?>" class="cp-name"><?php echo $pa['name_'.$this->session->userdata('lang')] ?></a>
            </div>
            <div class="clear" style="height: 5px;"></div>
        <?php }?>

    </div><!-- / .cart-widget -->

    <div class="col-md-12 ws-s recent-posts-widget">
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
</aside><!-- / .sidebar -->