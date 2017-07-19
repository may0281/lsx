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
            <div class="col-md-4 portfolio-item print">
                <div class="p-wrapper hover-default">
                    <img src="<?php echo base_url('images/portfolio/'.$project['img']) ?>" alt="Project Example">
                    <div class="p-hover">
                        <div class="p-content">
                            <h4><?php echo $project['name_'.$this->session->userdata('lang')] ?></h4>
                            <h6 class="subheading"><?php echo $project['tags'] ?></h6>
                        </div>
                    </div>
                    <a href="<?php echo $portUrl; ?>" class="open-btn"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>