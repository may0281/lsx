<aside class="col-md-offset-1 col-md-3 sidebar">
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
    <!-- Recent Posts - Widget -->
    <div class="col-md-12 ws-s recent-posts-widget">
        <h5 class="header-widget">Recent Product</h5>
        <?php
        $recentProduct = $this->home_model->getRecentProduct();
        foreach ($recentProduct as $product){

            $productUri = str_replace($find,"-",$product['name_'.$this->session->userdata('lang')]);
            $productUrl =  base_url('blog/'.$product['ID'].'/'.$productUri);
            ?>
            <!-- Item 1 -->
            <div class="widget-item">
                <img src="<?php echo base_url('images/product/'.$product['cover_img']) ?>" >
                <a href="<?php echo $productUrl; ?>"><h6 class="h-alt"><?php echo $product['name_'.$this->session->userdata('lang')] ?></h6></a>
                <span><?php echo date('M  d,Y',strtotime($product['create_date'])) ?></span>
            </div>
        <?php  } ?>
    </div><!-- / .recent-posts-widget -->

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