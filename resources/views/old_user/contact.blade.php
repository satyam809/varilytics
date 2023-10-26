<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#contact1" role="tab">Data Source/ Data Set Request </a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact2" role="tab">Data Submission Request </a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact3" role="tab">Customer Service</a> </li>
            </ul>

            <!-- Tab panes -->

            <div class="col-xl-12 col-lg-12 col-sm-12 col-12 tab-content">

                <div class="tab-pane active" id="contact1" role="tabpanel">

                    <div class="fxt-bg-color">

                        <div class="fxt-content" style="padding: 20px 30px;">
                            <div class="fxt-header">
                                <p style="font-size: 28px;">Data Source/ Data Set Request</p>
                                <div id="contact_alert_message"></div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <form id="varistatsContact1" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="contact_id" value="1">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                                                <span class="text-danger error-text name_err contact1"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="email" placeholder="Your E-mail Address">
                                                <span class="text-danger error-text email_err contact1"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" rows="5" placeholder="Suggest the Dataset or App" name="suggest"></textarea>
                                                <span class="text-danger error-text suggest_err contact1"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="want_with_data" placeholder="What do you want to do with Data?">
                                                <span class="text-danger error-text want_with_data_err contact1"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="source_of_data" placeholder="Source of Data">
                                                <span class="text-danger source_of_data_err contact1"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="file" class="form-control" name="file" style="padding: 7px;">
                                                <small>(Limit of 5MB) (JPEG, PNG, PDF)</small>
                                                <span class="text-danger file_err contact1"></span>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <input autocomplete="off" type="text" name="captcha" class="form-control" placeholder="Enter Captcha Text" maxlength="6">
                                            </div> -->
                                            <!-- <div class="col-md-6 captcha_img"> <img src="assets/images/icons/captcha.jpg" style="width: 170px; height: 40px; border: 0;" alt=" "> <a class="text-black" href="javascript:void(0)" onclick="change_image()"><small><i class="fa fa-refresh"></i></small></a> </div>
                                            <div class="col-md-12">
                                                <label><small class="descriptionicon">Enter the characters shown in the image.</small></label>
                                            </div> -->
                                            <div class="form-group col-md-12">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="contact2" role="tabpanel">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-12 fxt-bg-color">
                        <div class="fxt-content" style="padding: 20px 30px;">
                            <div class="fxt-header">
                                <p style="font-size: 28px;">Data Submission Request</p>
                                <div id="contact_alert_message2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="varistatsContact2" enctype="multipart/form-data">
                                        <input type="hidden" name="contact_id" value="2">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                                                <span class="text-danger error-text name_err contact2"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="email" placeholder="Your E-mail Address">
                                                <span class="text-danger error-text email_err contact2"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" rows="5" placeholder="Suggest the Dataset or App" name="suggest"></textarea>
                                                <span class="text-danger error-text suggest_err contact2"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="want_with_data" placeholder="What do you want to do with Data?">
                                                <span class="text-danger error-text want_with_data_err contact2"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="source_of_data" placeholder="Source of Data">
                                                <span class="text-danger source_of_data_err contact2"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="file" class="form-control" name="file" style="padding: 7px;">
                                                <small>(Limit of 5MB) (JPEG, PNG, PDF)</small>
                                                <!-- <span class="text-danger file_err contact2"></span> -->
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <input autocomplete="off" type="text" name="captcha" class="form-control" placeholder="Enter Captcha Text" maxlength="6">
                                            </div> -->
                                            <!-- <div class="col-md-6 captcha_img"> <img src="assets/images/icons/captcha.jpg" style="width: 170px; height: 40px; border: 0;" alt=" "> <a class="text-black" href="javascript:void(0)" onclick="change_image()"><small><i class="fa fa-refresh"></i></small></a> </div>
                                            <div class="col-md-12">
                                                <label><small class="descriptionicon">Enter the characters shown in the image.</small></label>
                                            </div> -->
                                            <div class="form-group col-md-12">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="tab-pane" id="contact3" role="tabpanel">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-12 fxt-bg-color">
                        <div class="fxt-content" style="padding: 20px 30px;">
                            <div class="fxt-header">
                                <p style="font-size: 28px;">Customer Service</p>
                                <p style="font-weight: 500;font-size: 14px; text-transform: unset;margin-top: 0;margin-bottom: 40px;">Feel free to contact us anytime through the form. We will respond to your inquiry as quickly as possible.</p>
                                <div id="contact_alert_message3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="fxt-form">
                                        <form id="varistatsContact3">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="hidden" name="contact_id" value="3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Your First & Last Name">
                                                <span class="text-danger name_err contact3"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Your Email">
                                                <span class="text-danger email_err contact3"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" placeholder="Your Subject">
                                                <span class="text-danger subject_err contact3"></span>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Your Request" name="request"></textarea>
                                                <span class="text-danger request_err contact3"></span>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.205120370339!2d77.06702981440178!3d28.41306690073218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d226fe836de1b%3A0xf9200f9a9dce1a80!2sThe%20Close%20South%20Nirvana%20Country!5e0!3m2!1sen!2sin!4v1628745556235!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#varistatsContact1").on("submit", function(e) {
            e.preventDefault();
            //alert($('#varistatsContact1').serialize());
            //console.log($('#varistatsContact1').serialize());

            $.ajax({
                url: "/insertContact1",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $(".contact1").empty();
                        $("#varistatsContact1").trigger("reset");
                        $("#contact_alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    } else {
                        $(".contact1").empty();
                        printErrorMsg(data.error);
                    }

                },
            });


        });

        $("#varistatsContact2").on("submit", function(e) {
            e.preventDefault();
            // alert($('#varistatsContact2').serialize());
            //console.log($('#varistatsContact1').serialize());

            $.ajax({
                url: "/insertContact1",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    if (data.status == true) {
                        $(".contact2").empty();
                        $("#varistatsContact2").trigger("reset");
                        $("#contact_alert_message2").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    } else {
                        $(".contact2").empty();
                        printErrorMsg(data.error);
                    }


                }
            });
        });

        $("#varistatsContact3").on("submit", function(e) {
            e.preventDefault();
            //alert($('#varistatsContact3').serialize());
            //console.log($('#varistatsContact1').serialize());

            $.ajax({
                url: "/insertContact2",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $(".contact3").empty();
                        $("#varistatsContact3").trigger("reset");
                        $("#contact_alert_message3").html("<div class='alert alert-success alert-dismissible in'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                    } else {
                        $(".contact3").empty();
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