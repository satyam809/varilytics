<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin_assets/dist/css/adminlte.min.css')  }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

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

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin_assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
