
<?php

use Google\Client;
function googleLogin()
{
    $client = new Client();
    $client->setClientId('1016165829239-ndo0vg766jenqnp629rv0o5ufngtgn8s.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri(url('/') . '/google_login');
    $client->addScope("email");
    $client->addScope("profile");
    $url = $client->createAuthUrl();
    //redirect($url);
    return $url;
}
?>
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
                <form method="post" action="{{url('customerLogin')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <input autocomplete="off" type="email" value="" name="email" class="form-control" placeholder="Email">
                    </div>
                    <span style="color:red;">
                        @error('email')
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
                <p class="footer-loginForm">Don't have an Account? <a href="{{url('registration')}}" class="switcher-text2 inline-text">Register</a></p>
                <div class="flex items-center justify-end mt-4 align-middle ">
                    <a href="{{googleLogin()}}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="_margin-left: 3em;">
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>
