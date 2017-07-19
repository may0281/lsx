<aside class="col-md-offset-1 col-md-3 sidebar">
    <div class="col-md-12 ws-s tags-widget">
        <h5 class="header-widget">Tags</h5>
        <ul class="tag-list">
            <li><a href="#">CERARL</a></li>
            <li><a href="#">Decor Surfaces</a></li>
            <li><a href="#">Altyno [Film] </a></li>
            <li><a href="#">Jolypate </a></li>
            <li><a href="#">Build In</a></li>
            <li><a href="#">Laminate</a></li>
            <li><a href="#">AICA</a></li>
            <li><a href="#">LSX</a></li>
            <li><a href="#">Wall Panel</a></li>
        </ul>
    </div>
    <div class="col-md-12 ws-s recent-posts-widget">
        <h5 class="header-widget">Recent Posts</h5>
        <div class="widget-item">
            <a href="#"><h6 class="h-alt">Blog Post Example</h6></a>
            <span>by <a href="#">Joel Fischer</a> / <a href="#">June 23</a></span>
        </div>
        <div class="widget-item">
            <a href="#"><h6 class="h-alt">Another Blog Post Example</h6></a>
            <span>by <a href="#">Joel Fischer</a> / <a href="#">June 23</a></span>
        </div>
        <div class="widget-item">
            <a href="#"><h6 class="h-alt">Blog Post Example</h6></a>
            <span>by <a href="#">Joel Fischer</a> / <a href="#">June 23</a></span>
        </div>
    </div>
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
    <div class="col-md-12 ws-s comments-widget">
        <h5 class="header-widget">Comments</h5>
        <div class="widget-item">
            <span><a href="#">Jon Doe</a> on <a href="#" class="widget-comm-title">Lorem ipsum dolor sit amet</a></span>
        </div>
        <div class="widget-item">
            <span><a href="#">Jon Doe</a> on <a href="#" class="widget-comm-title">Sed do eiusmod</a></span>
        </div>
        <div class="widget-item">
            <span><a href="#">Jon Doe</a> on <a href="#" class="widget-comm-title">Lorem ipsum dolor sit amet</a></span>
        </div>
        <div class="widget-item">
            <span><a href="#">Jon Doe</a> on <a href="#" class="widget-comm-title">Sed do eiusmod</a></span>
        </div>
    </div>
    <div class="col-md-12 text-widget">
        <h5 class="header-widget">Text Widget</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae qui error, incidunt quia pariatur facere quasi totam inventore amet rerum.</p>
    </div>
</aside>