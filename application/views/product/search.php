
<div class="container section">
    <div class="row">
        <?php  $this->load->view('product/sidebar')?>
        <div class="col-md-8 mb-sm-160">
                <h4 class="ws-s"><?php echo $this->lang->line('search_result') ?> : <?php echo $keyword;?></h4>

                <div class="table-responsive">
                    <table class="table table-light">
                        <tbody>
                            <?php $i = 1; foreach ($search as $r){
                                $find = array('!','+',' ','(',')');
                                $uri = str_replace($find,"",$r['name_'.$this->session->userdata('lang')]);
                                $url = base_url('product/'.$r['product_code'].'/'.$uri);
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td>
                                    <a href="<?php echo $url; ?>">
                                        <?php echo $r['name_'.$this->session->userdata('lang')];?>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table><!-- / .table -->
                </div><!-- / .table-responsive -->

        </div>

    </div><!-- / .row -->
</div><!-- / .container -->