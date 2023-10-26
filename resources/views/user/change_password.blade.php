<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
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
</head>

<body>
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <form id="change_password">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="email" value="{{ Request::get('email') }}">
                    <input type="hidden" name="otp" value="{{ Request::get('otp') }}">
                    <label>Username</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <label>New Password</label>
                    <div class="form-group pass_show">
                        <input type="password" class="form-control" name="password" placeholder="New Password" required>
                    </div>
                    <label>Confirm Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                        <span class="password" style="color:red;display:none;">Enter Valid Password</span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Change">
                </form>


            </div>


        </div>
    </div>
</body>
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
           
            var pass = $('input[name=password]').val();
            var cpass = $('input[name=cpassword]').val();
            if (pass === cpass) {
                $.ajax({
                    url: "/save_password",
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
                            window.location ="https://varilytics.com/login";
                        }

                    }
                });
            //}
            } else {
                $('.password').show();
            }

        });

    });
</script>

</html>