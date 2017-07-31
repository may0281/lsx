<section class="container portfolio-layout portfolio-columns-boxed">
    <div class="row">
        <header class="sec-heading">
            <h2><?php echo $this->lang->line('portfolio_heading')?></h2>
            <span class="subheading"><?php echo $this->lang->line('portfolio_subheading')?></span>
        </header>
    </div>
    <div class="row ws-m">
        <div id="pfolio">
            <?php foreach ($projects as $project) {
                $find = array('!','+',' ');
                $portUri = str_replace($find,"-",$project['name_'.$this->session->userdata('lang')]);
                $portUrl =  base_url('portfolio/'.$project['id'].'/'.$portUri);
            ?>
                <div class="col-md-4 portfolio-item hover-side">
                    <figure>
                        <img src="<?php echo base_url('images/portfolio/'.$project['img']) ?>" alt="<?php echo $project['name_'.$this->session->userdata('lang')] ?>">
                        <figcaption>
                            <h5 class="hover-heading"><?php echo $project['name_'.$this->session->userdata('lang')] ?></h5>
                            <p class="hover-text"><?php echo $project['tags'] ?></p>
                            <a href="<?php echo $portUrl; ?>" class="hover-more-btn"><span class="linea-arrows-slim-right"></span></a>
                            <ul class="hover-btns">
                                <li><a href="<?php echo base_url('images/portfolio/'.$project['img']) ?>" class="open-gallery"><span class="linea-arrows-expand"></span></a></li>
                                <li><a href="#"><span class="linea-basic-heart"></span></a></li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            <?php }?>

        </div>
    </div>
</section>