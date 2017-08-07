<section class="section contact-1">

    <header class="sec-heading">
        <h2>Register</h2>
        <span class="subheading">We love to hear from you</span>
    </header>

    <div class="contact-wrapper">
        <div class="container">
            <div class="row">
                <form action="<?php echo base_url('landing/register')?>" id="formSendEmail" method="POST" onsubmit='return submitForm(this);' class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="col-md-offset-2 col-md-4 wow fadeInUp" data-wow-duration="1s">

                        <!-- Name -->
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
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-duration="1s">

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

                        <div>
                            <i id="contact-loading" class="fa fa-spinner fa-pulse fa-3x fa-fw hide" style="margin-left: 120px"></i>
                            <span class="sr-only">Loading...</span>
                            <input type="hidden" name="project_code" value="<?php echo $project; ?>">
                            <input type="submit" class="btn pull-right" value="Register">
                        </div>
                        <div id="response_message" class="ajax-message col-md-12 no-gap"></div>

                    </div><!-- / .col-md-4 -->
                </form>
            </div><!-- / .row -->
        </div><!-- / .container -->
    </div><!-- / .contact-wrapper -->
</section><!-- / .contact-1 -->

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
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + 'Register Success.' +
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
        });
        return false;
    }
</script>