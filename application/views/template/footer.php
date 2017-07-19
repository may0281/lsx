<footer id="contact" class="footer-contact">
	<div class="container-fluid">
		<div class="row">

			<!-- Map and address -->
			<div class="col-lg-6 no-gap contact-info">

				<!-- Show Info Button -->
				<a href="#" class="show-info-link"><i class="fa fa-info"></i>Show info</a>

				<div id="map-canvas" class="footer-map"></div>

				<address class="contact-info-wrapper">

					<ul>
						<!-- Address -->
						<li class="contact-group">
							<span class="adr-heading"><?php echo $companyDesc['content_'.$this->session->userdata('lang')]; ?></span>
							<span class="adr-info"></span>
						</li>

					</ul>

					<a href="#" class="show-map"><span class="linea-basic-geolocalize-05"></span>show on map</a>
				</address>

			</div><!-- / .col-lg-6 -->


			<!-- Contact Form -->
			<div class="col-lg-6 no-gap section contact-form">
				<header class="sec-heading">
					<h2>Contact</h2>
				</header>

				<form action="contact-form.php" method="POST" class="form-ajax wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">

					<!-- Name -->
					<div class="form-group">
						<label for="name-contact-1">Name</label>
						<input type="text" name="name" id="name-contact-1" class="form-control validate-locally" placeholder="Enter your name">
						<span class="pull-right alert-error"></span>
					</div>

					<!-- Email -->
					<div class="form-group">
						<label for="email-contact-1">Email</label>
						<input type="email" name="email" id="email-contact-1" class="form-control validate-locally" placeholder="Enter your email">
						<span class="pull-right alert-error"></span>
					</div>
					<div class="form-group">
						<label for="email-contact-1">Phone</label>
						<input type="email" name="tel" id="tel-contact-1" class="form-control validate-locally" placeholder="Enter your phone">
						<span class="pull-right alert-error"></span>
					</div>
					<div class="form-group">
						<label for="email-contact-1">Who are you?</label>
						<select class="form-control validate-locally" name="career" id="career" >
							<option value=""> Please select one.</option>
							<option value="designer"> Designer</option>
						</select>

						<span class="pull-right alert-error"></span>
					</div>

					<!-- Message -->
					<div class="form-group">
						<label for="message-contact-1">Message</label>
						<textarea class="form-control" name="message" id="message-contact-1" rows="5" placeholder="Your Message"></textarea>
					</div>
					<input type="submit" class="btn pull-right" value="Send Message">

					<!-- Ajax Message -->
					<div class="ajax-message col-md-12 no-gap"></div>

				</form>
			</div><!-- / .col-lg-6 -->

		</div><!-- / .row -->
	</div><!-- / .container-fluid -->


	<!-- Social Links -->
	<div class="dark-bg">
		<div class="container footer-social-links">
			<div class="row">

				<ul>
					<li><a href="#">facebook</a></li>
					<li><a href="#">Twitter</a></li>
					<li><a href="#">Dribbble</a></li>
					<li><a href="#">Behance</a></li>
				</ul>

			</div>
		</div><!-- / .container -->
	</div><!-- / .dark-bg -->


	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<small>© Copyright LSX Co., Ltd. All rights reserved.</small>
				</div>

				<div class="col-md-6">
					<small><a href="#page-top" class="pull-right to-the-top">To the top<i class="fa fa-angle-up"></i></a></small>
				</div>

			</div><!-- / .row -->
		</div><!-- / .container -->
	</div><!-- / .copyright -->
</footer><!-- / .footer-contact -->
<!-- ========== Scripts ========== -->

<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
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
<script src="<?php echo base_url();?>assets/js/vendor/jquery.ajaxchimp.js"></script>

<!-- Google Maps -->
<script src="<?php echo base_url();?>assets/js/gmap.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXHAy5xIYio_eQEBTyXYR9c06xJjPT_5E"></script>

<!-- Definity JS -->


<script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>