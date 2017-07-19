<div class="testimonials-parallax">
    <div class="bg-overlay">
        <div class="t-wrapper t-slider">
            <blockquote>
                <?php echo $ourPromise['content_'.$this->session->userdata('lang')] ?>
                <span class="et-quote t-type"></span>
                <footer>
                    <cite>
                        <h5 class="h-alt"><?php echo $ourPromise['author'] ?></h5>
                        <h5><?php echo $ourPromise['position'] ?></h5>
                    </cite>
                </footer>
            </blockquote>
        </div>
        <ul class="t-clients clients-slider">
            <?php foreach($client_list as $client){ ?>
            <li><a href="<?php echo $client['url'];?>"><img src="<?php echo base_url('images/content/'.$client['img']) ?>" alt="<?php echo $client['name'];?>"></a></li>
            <?php } ?>
        </ul>

    </div>
</div>