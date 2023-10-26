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
    <style type="text/css">
        body {
            background-position: center;
            background-color: #eee;
            background-repeat: no-repeat;
            background-size: cover;
            color: #505050;
            font-family: "Rubik", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.5;
            text-transform: none
        }

        .forgot {
            background-color: #fff;
            padding: 12px;
            border: 1px solid #dfdfdf
        }

        .padding-bottom-3x {
            padding-bottom: 72px !important
        }

        .card-footer {
            background-color: #fff
        }

        .btn {
            font-size: 13px
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #76b7e9;
            outline: 0;
            box-shadow: 0 0 0 0px #28a745
        }
    </style>
</head>

<body>
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <form class="card mt-4" id="forget_password">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="card-body">
                        <div class="form-group"> <label>Enter your email address</label> <input class="form-control" type="text" id="email" required="" name="email"></div>


                        <div class="form-group" style="display:none;" id="addOtp">
                            <label>Enter OTP</label>
                            <input class="form-control" type="text" id="otp" name="otp">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success" value="Check Email" id="change_submit_message">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#forget_password').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "/check_email",
                method: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === true) {
                        $('#addOtp').show();
                        $('#change_submit_message').val('Verify OTP');
                    } 
                    else if(data.page === 1){
                       // alert(data.page);
                        window.location ="https://varilytics.com/change_password/?email="+data.email+"&otp="+data.otp;
                    }
                    else if(data.status === false) {
                        alert('Enter correct OTP');
                        $("#otp").val('');
                    }

                }
            });

        });

    });
</script>

</html>