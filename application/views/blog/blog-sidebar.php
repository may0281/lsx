<aside class="col-md-offset-1 col-md-2 sidebar">
    <?php $this->load->view('template/tags'); ?>
    <div class="col-md-12 ws-s categories-widget">
        <h5 class="header-widget">Categories</h5>
        <?php
            $this->db->select('*');
            $this->db->from('blog_category');
            $blog_query = $this->db->get();
            foreach ($blog_query->result_array() as $b){
                $this->db->where(array('CatID' => $b['id'],'Enable'=>1));
                $totalBlog = $this->db->count_all_results('blog');
                $queryString = '?categories='.$b['url'];
        ?>
        <div class="widget-item">
            <a href="<?php echo base_url('blog/page/1'.$queryString) ?>"><?php echo $b['cat'.strtoupper($this->session->userdata('lang'))];?> <span><?php echo $totalBlog; ?></span></a>
        </div>

        <?php } ?>
    </div>
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

    <div class="shop-widget product-widget">
        <h5 class="header-widget">Recent Product</h5>
        <?php $products  = $this->home_model->getProductList();
        foreach ($products as $pa){
            $find = array("!","+","?","'"," ","(",")","&");;
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
</aside>