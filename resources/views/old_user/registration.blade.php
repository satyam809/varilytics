<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Register</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login section-padding">
    <div class="container">
        <div class="row">
            <div class="form-holder">
                <div class="img-holder">
                    <div class="bg"></div>
                    <div class="info-holder"> <img src="https://nwic.companydemo.in/assets/images/graphic1.svg" alt=""> </div>
                </div>
                <div class="form-content">
                    <div class="form-items">
                        <div id="alert_message"></div>
                        <h3>Register for Create an Account</h3>
                        <form method="post" id="userReg">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <input autocomplete="off" type="text" value="" name="name" class="form-control" placeholder="Name">
                            </div>
                            <span class="text-danger error-text name_err regErr"></span>
                            <div class="form-group">
                                <input autocomplete="off" type="text" value="" name="email" class="form-control" placeholder="E-mail Address">
                            </div>
                            <span class="text-danger error-text email_err regErr"></span>
                            <div class="form-group">
                                <input autocomplete="off" type="text" value="" name="username" class="form-control" placeholder="Enter Username">
                            </div>
                            <span class="text-danger error-text username_err regErr"></span>
                            <div class="form-group">
                                <input id="password" autocomplete="off" type="password" name="password" class="form-control" placeholder="Password">
                                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                            </div>
                            <span class="text-danger error-text password_err regErr"></span>
                            <div class="form-button">
                                <button id="submit" type="submit" class="btn btn-primary waves-effect">Register</button>
                            </div>
                        </form>
                        <hr>
                        <p class="footer-loginForm">Already have an account? <a href="login" class="switcher-text2 inline-text">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="cta section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-content">
                            <h2>FOR MORE INFORMATION ON VARISTATS</h2>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="cta-call"> <span><i class="mdi mdi-phone"></i></span> (+91) 98 1234 5678 </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="cta-call"> <span><i class="mdi mdi-web"></i></span> <a href="mailto:support@varistats.com">
                                            support@varistats.com
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<script>
    $(document).ready(function() {


        $("#userReg").on("submit", function(e) {
            e.preventDefault();
            //alert($('#userReg').serialize());
            //console.log($('#userReg').serialize());

            $.ajax({
                url: "/registration",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $(".regErr").empty();
                        $("#userReg").trigger("reset");
                        $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    } else if (data.status == false) {
                        $(".regErr").empty();
                        $(".email_err").text(data.message);
                    } else {
                        $(".regErr").empty();
                        printErrorMsg(data.error);
                    }

                }
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                //console.log(key);
                $('.' + key + '_err').text(value);
            });
        }
    });
</script>