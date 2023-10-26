<style>
    .pass_show {
        position: relative
    }

    .pass_show .ptxt {

        position: absolute;

        top: 50%;

        right: 10px;

        z-index: 1;

        color: #f36c01;

        margin-top: -10px;

        cursor: pointer;

        transition: .3s ease all;

    }

    .pass_show .ptxt:hover {
        color: #333333;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="scrollUp">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div id="alert_message"></div>
                <div class="card-body">
                    <div class="row _justify-content-center" id="add">
                        <form id="change_password">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>New Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" name="password"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" name="cpassword" required>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Change">
                                </div>
                            </div>

                        </form>

                    </div>




                </div>

            </div>


        </div>

    </section>



</div>
<script>
    $(document).ready(function() {
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr) {
            return attr == 'password' ? 'text' : 'password';
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#change_password').on('submit', function(e) {
            e.preventDefault();
            //alert($('#change_password').serialize());
            //alert($('#change_password').serialize());
            var pass = $('input[name=password]').val();
            var cpass = $('input[name=cpassword]').val();
            if (pass === cpass) {
                $.ajax({
                    url: "/save_change_password",
                    method: "POST",
                    dataType: "JSON",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        //console.log(data);
                        if (data.status === true) {
                            alert(data.message);
                            $('#change_password').trigger('reset');
                        }

                    }
                });
            } else {
                $('.password').show();
            }

        });

    });
</script>