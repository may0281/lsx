<div id="skillsCircles" class="circles-counters" >
    <div class="container" >
        <div class="row section" style="color: #ffffff">

            <div class="col-md-12" style="margin-bottom: 50px;text-align: center;">
                <h2 style="color: #ffffff"><?php echo $this->lang->line('about'); ?> </h2>
            </div>
            <div class="col-md-6">
                <p><?php echo $about1['content_'.$this->session->userdata('lang')] ?></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $about2['content_'.$this->session->userdata('lang')] ?></p>
            </div>
        </div>
    </div>
</div>

<div id="services" class="gray-bg">
    <section class="container section ft-cards-2">
        <header class="sec-heading">
            <span class="subheading"><?php echo $ourPromise['content_'.$this->session->userdata('lang')] ?></span>
            <span class="et-quote t-type" style="font-size: 30px;padding-top: 20px"></span>
        </header>
    </section>
</div>

<div class="dark-bg">
    <div class="container">
        <div class="row">
            <div class="ws-s"></div>
            <ul class="t-clients clients-slider ws-s">
                <?php foreach($client_list as $client){ ?>
                    <li><a href="<?php echo $client['url'];?>"><img src="<?php echo base_url('images/content/'.$client['img']) ?>" alt="<?php echo $client['name'];?>"></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<section class="container section portfolio-layout portfolio-1col-boxed">
    <div class="row">
        <div id="pfolio">
            <figure class="portfolio-item print">
                <div class="col-md-7 no-gap img-wrapper">
                    <img src="<?php echo base_url('assets/images/Map-Head-Office.jpg') ?>" alt="Project Example">
                </div>
                <figcaption class="col-md-5 no-gap">
                    <h3><?php echo $this->lang->line('head_office_address_h5');?></h3>
                    <p><?php echo $headOffice['content_'.$this->session->userdata('lang')] ?></p>
                </figcaption>
            </figure><!-- / .portfolio-item -->
            <figure class="portfolio-item webdesing">
                <div class="col-md-7 no-gap img-wrapper pull-right">
                    <img src="<?php echo base_url('assets/images/Map-Warehouse.jpg') ?>" style="width: 865px;height: 615px" alt="Project Example">
                </div>
                <figcaption class="col-md-5 no-gap pull-left">
                    <h3><?php echo $this->lang->line('warehouse_address_h5');?></h3>
                    <p><?php echo $wareHouse['content_'.$this->session->userdata('lang')] ?></p>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="section contact-1">
    <header class="sec-heading">
        <h2>Contact Us</h2>
        <span class="subheading">We love to hear from you</span>
    </header>
    <div class="contact-wrapper">
        <div id="map-canvas" class="gmap map-boxed"></div>
        <div class="show-info-link">
            <a href="#" class="show-info"><i class="fa fa-info"></i><h6>Show info</h6></a>
        </div>
        <div class="container">
            <div class="row ws-m">
            </div>
            <div class="row">
                <form action="<?php echo base_url('contact/send-email')?>" id="formSendEmail" method="POST" onsubmit='return submitForm(this);' class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="col-md-offset-2 col-md-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="form-group">
                            <label for="name-contact-1">Name</label>
                            <input type="text" name="name" id="name-contact-1" class="form-control validate-locally" placeholder="Enter your name">
                            <span id="warning-name" class="pull-right alert-error"></span>
                        </div>
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
                    </div>
                    <div class="col-md-offset-2 col-md-4 wow fadeInUp" data-wow-duration="1s">
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
                        <div class="form-group">
                            <label for="message-contact-1">Message</label>
                            <textarea class="form-control" name="message" id="message-contact-1" rows="5" placeholder="Your Message"></textarea>
                            <span id="warning-message" class="pull-right alert-error"></span>
                        </div>
                    </div>
                    <i id="contact-loading" class="fa fa-spinner fa-pulse fa-3x fa-fw hide"></i>
                    <span class="sr-only">Loading...</span>
                    <input type="submit" class="btn pull-right" value="Send Message">
                    <div id="response_message" class="ajax-message col-md-12 no-gap"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ========== Scripts ========== -->
<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/jquery.ajaxchimp.js"></script>
<!-- Google Maps -->
<script src="<?php echo base_url();?>assets/js/gmap.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXHAy5xIYio_eQEBTyXYR9c06xJjPT_5E"></script>
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