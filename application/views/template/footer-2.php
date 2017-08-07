<footer class="footer-widgets">
	<div class="container">
		<div class="row section">
			<div class="col-md-3 col-sm-6 mb-sm-100">
				<div class="widget about-widget">
					<h5 class="header-widget"><?php echo $this->lang->line('product_type') ?></h5>
					<p>
						<?php
						$productCategories = $this->home_model->getProductType();
						foreach ($productCategories as $cat) {?>
						<a href=""> <?php echo $cat['type_'.$this->session->userdata('lang')]; ?></a> <br>
						<?php } ?>
					</p>
				</div>
			</div>
			<?php
			$headOffice = $this->home_model->getCompanyDesc('address_head_office');
			$wareHouse = $this->home_model->getCompanyDesc('address_ware_house');
			?>
			<div class="col-md-3 col-sm-6 mb-sm-100">
				<div class="widget about-widget">
					<h5 class="header-widget"><?php echo $this->lang->line('head_office_address_h5');?></h5>
					<p><?php echo $headOffice['content_'.$this->session->userdata('lang')] ?></p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-sm-100">
				<div class="widget about-widget">
					<h5 class="header-widget"><?php echo $this->lang->line('warehouse_address_h5');?></h5>
					<p><?php echo $wareHouse['content_'.$this->session->userdata('lang')] ?></p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-sm-100">
				<div class="widget about-widget">
					<h5 class="header-widget"><?php echo $this->lang->line('social');?></h5>
					<ul class="social-links">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<small>© Copyright LSX Co., Ltd. All rights reserved.</small>
				</div>

				<div class="col-md-6">
					<small><a href="#page-top" class="pull-right to-the-top">To the top<i class="fa fa-angle-up"></i></a></small>
				</div>

			</div>
		</div>
	</div>
</footer>
<?php
$serverUri =  explode('/',$_SERVER['REQUEST_URI']);
if (in_array("altyno", $serverUri,true)
	or in_array("jolypate", $serverUri,true)
	or in_array("decor-surfaces", $serverUri,true)
	or in_array("cerarl", $serverUri,true)
	or in_array("search", $serverUri,true)
	or in_array("our-company", $serverUri,true)
){
}else{ ?>
<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<?php }?>
<script src="<?php echo base_url();?>assets/js/vendor/google-fonts.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.easing.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/smoothscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.localScroll.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.parallax.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/slick.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/countup.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/isotope.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/wow.min.js"></script>
<!--<script src="--><?php //echo base_url();?><!--assets/js/vendor/jquery.ajaxchimp.js"></script>-->
<!-- Google Maps -->

<script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>