<footer id="contact" class="footer-contact">
	<div class="container-fluid">
		<div class="row">
			<?php
				$headOffice = $this->home_model->getCompanyDesc('address_head_office');
				$wareHouse = $this->home_model->getCompanyDesc('address_ware_house');
			?>
			<div class="col-lg-6 no-gap contact-info">
				<a href="#" class="show-info-link"><i class="fa fa-info"></i>Show info</a>
				<div id="map-canvas" class="footer-map"></div>
				<address class="contact-info-wrapper">
					<ul>
						<li class="contact-group">
							<span class="adr-heading"><?php echo $this->lang->line('head_office_address_h5');?></span>
							<span class="adr-info"><?php echo $headOffice['content_'.$this->session->userdata('lang')] ?>
							<a href="<?php echo base_url('assets/images/Map-Head-Office.jpg') ?>" download class="btn btn-light btn-small">Download Map</a></span>
						</li>
					</ul>
					<ul>
						<li class="contact-group">
							<span class="adr-heading"><?php echo $this->lang->line('warehouse_address_h5');?></span>
							<span class="adr-info"><?php echo $wareHouse['content_'.$this->session->userdata('lang')] ?>
								<a href="<?php echo base_url('assets/images/Map-Warehouse.jpg') ?>" download class="btn btn-light btn-small">Download Map</a></span>
						</li>
					</ul>
					<a href="#" class="show-map"><span class="linea-basic-geolocalize-05"></span>show on map</a>
				</address>
			</div>
			<div class="col-lg-6 no-gap section contact-form" style="padding-top:50px">
				<header class="sec-heading">
					<h2>Contact</h2>
				</header>

				<form action="<?php echo base_url('contact/send-email')?>" id="formSendEmail" method="POST" onsubmit='return submitForm(this);' class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">

					<!-- Name -->
					<div class="form-group">
						<label for="name-contact-1">Name</label>
						<input type="text" name="name" id="name-contact-1" class="form-control validate-locally" placeholder="Enter your name">
						<span id="warning-name" class="pull-right alert-error"></span>
					</div>

					<!-- Email -->
					<div class="form-group">
						<label for="email-contact-1">Email</label>
						<input type="email" name="email" id="email-contact-1" class="form-control validate-locally" placeholder="Enter your email">
						<span id="warning-email" class="pull-right alert-error"></span>
					</div>
					<div class="form-group">
						<label for="email-contact-1">Phone</label>
						<input type="text" name="tel" id="tel-contact-1" class="form-control validate-locally" placeholder="Enter your phone">
						<span id="warning-tel" class="pull-right alert-error"></span>
					</div>
					<div class="form-group">
						<label for="email-contact-1">Who are you?</label>
						<select class="form-control validate-locally" name="career" id="career" >
							<option value=""> Please select one.</option>
							<option value="Designer"> Designer</option>
							<option value="Architect"> Architect</option>
							<option value="Engineer"> Engineer</option>
							<option value="Contractor">Contractor </option>
						</select>
						<span id="warning-career" class="pull-right alert-error"></span>
					</div>

					<!-- Message -->
					<div class="form-group">
						<label for="message-contact-1">Message</label>
						<textarea class="form-control" name="message" id="message-contact-1" rows="5" placeholder="Your Message"></textarea>
						<span id="warning-message" class="pull-right alert-error"></span>

					</div>
					<i id="contact-loading" class="fa fa-spinner fa-pulse fa-3x fa-fw hide"></i>
					<span class="sr-only">Loading...</span>

					<input type="submit" class="btn pull-right" value="Send Message">
					<!-- Ajax Message -->
					<div id="response_message" class="ajax-message col-md-12 no-gap"></div>


				</form>
			</div><!-- / .col-lg-6 -->

		</div><!-- / .row -->
	</div><!-- / .container-fluid -->


	<!-- Social Links -->
	<div class="dark-bg">
		<div class="container footer-social-links">
			<div class="row">

				<ul>
					<li><a href="https://www.facebook.com/lsxthailand/" target="_blank">facebook</a></li>
					<li><a href="https://www.pinterest.com/Lsx_Thailand/" target="_blank">Pinterest</a></li>
					<li><a href="https://www.youtube.com/channel/UCXh_gkduYHrdGaQkzEsScdg" target="_blank">YouTube</a></li>
					<li><a href="https://www.instagram.com/lsx_thailand/" target="_blank">Instagram</a></li>
					<li><a href="https://page.line.me/aicabylsx" target="_blank">Line</a></li>
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
<!--<script src="--><?php //echo base_url();?><!--assets/js/vendor/jquery-2.1.4.min.js"></script>-->
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

<script type="application/javascript">

	var expEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/;
	$('#email-contact-1').on( 'keyup',function() {
		$("#warning-email").html('');

	});
	$('#name-contact-1').on( 'keyup',function() {
		$("#warning-name").html('');
	});
	$('#tel-contact-1').on( 'keyup',function() {
		$("#warning-tel").html('');
	});
	$('#career').on( 'change',function() {
		$("#warning-career").html('');
	});
	$('#message-contact-1').on( 'keyup',function() {
		$("#warning-message").html('');
	});

	function submitForm(form) {

		var url = form['action'];
		var id = form.id;
		var formDataSend = new FormData($('#' + id)[0]);
		if(form.name.value == "")
		{
			$("#warning-name").html( '<i class="fa fa-info-circle"></i> Enter your name!<br>');
			return false;
		}
		if(form.email.value == "")
		{
			$("#warning-email").html( '<i class="fa fa-info-circle"></i> Enter your email!<br>');
			return false;
		}
		if(!expEmail.test(form.email.value))
		{
			$("#warning-email").html( '<i class="fa fa-info-circle"></i> Enter correct email address!<br>');
		}

		if(form.tel.value == "")
		{
			$("#warning-tel").html( '<i class="fa fa-info-circle"></i> Enter your telephone number!<br>');
			return false;
		}
		if(form.career.value == "")
		{
			$("#warning-career").html( '<i class="fa fa-info-circle"></i> Select your career!<br>');
			return false;
		}
		if(form.message.value == "")
		{
			$("#warning-message").html( '<i class="fa fa-info-circle"></i> Enter message!<br>');
			return false;
		}
		$('#contact-loading').removeClass('hide');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
			url: url,
			data: formDataSend,
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(result){
				console.log(result);
				$('#response_message').html('<div class="alert alert-success alert-dismissible wow fadeInUp" role="alert"> '+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + 'Your message has been sent.' +
					'</div>');
			},
			error: function(result){
				$('#response_message').html('<div class="alert alert-danger alert-dismissible wow fadeInUp" role="alert"> '+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + 'Something is wrong please try again.' +
					'</div>');
			}
		}).done(function() {
			$('#contact-loading').addClass('hide');
			$('#name-contact-1').val('');
			$('#email-contact-1').val('');
			$('#tel-contact-1').val('');
			$('#career').val('');
			$('#message-contact-1').val('');
		});
		return false;
	}
</script>

</body>
</html>