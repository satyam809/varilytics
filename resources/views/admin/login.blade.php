<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login section-padding">
    <div class="container">
        <div class="row">


            <div class="form-items" style="margin:auto">
                <h3>Welcome to Login Corner</h3>
                <p>Sign in to your Account</p>
                <form method="post" action="userLoginSubmit">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <input autocomplete="off" type="text" value="" name="username" class="form-control" placeholder="Username">
                    </div>
                    <span style="color:red;">
                        @error('username')
                        {{$message}}
                        @enderror
                    </span>
                    <div class="form-group">
                        <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <span style="color:red;">
                        @error('password')
                        {{$message}}
                        @enderror
                    </span>
                    <!-- <label>Captcha</label>
                            <div class="captcha_img" id="captcha_img"> <img src="assets/images/icons/captcha.jpg" style="width: 170px; height: 40px; border: 0;" alt=" "> <a class="text-black" href="javascript:void(0)"><small><i class="fa fa-refresh"></i></small></a> </div> -->
                    <!-- <div class="form-group">
                                <input autocomplete="off" style="margin-top:5px" type="text" name="captcha" class="form-control" placeholder="Enter Text Above" maxlength="6">
                            </div> -->
                    <div class="form-button">
                        <button id="submit" type="submit" class="btn btn-primary waves-effect">Login</button>
                        <a href="{{url('forget_password')}}" class="switcher-text2 inline-text">Forgot password?</a>
                    </div>
                    <span style="color:red;">{{ session('error') }}</span>
                </form>
                <hr>
                <p class="footer-loginForm">Don't have an Account? <a href="{{url('admin/registration')}}" class="switcher-text2 inline-text">Register</a></p>
            </div>


        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function() {
        $('#login').on('submit', function(e) {
            e.preventDefault();
            //alert($('#login').serialize());

            $.ajax({
                url: "admin/ajax/login.php",
                method: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                // beforeSend: function() {
                //   $('#login').val("connecting...");
                // },
                success: function(data) {
                    console.log(data);
                    //console.log(data.status);
                    if (data.status == true) {
                        window.location = "admin/index.php";
                    } else {
                        alert(data.message);
                    }
                }
            });

        });

    });
</script> -->