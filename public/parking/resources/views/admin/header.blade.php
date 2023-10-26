<?php $data = session('login.role');
//print_r($data);
//die;
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Parking System</title>
   <link rel="shortcut icon" type="image/x-icon" href="">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- Ionicons -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/css/bootstrap-multiselect.css" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
   <!-- Theme style -->
   <!-- jQuery -->
   <script src="{{ asset('assets/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
   
   
   
   <style type="text/css">
      body {
         font-family: none !important;
         height: auto !important;
         font-size: 15px !important;
      }

      @media (min-width: 481px) and (max-width: 767px) {
         .center_btn {
            text-align: center;
         }
      }

      /* 
         ##Device = Most of the Smartphones Mobiles (Portrait)
         ##Screen = B/w 320px to 479px
         */
      @media (min-width: 320px) and (max-width: 480px) {
         .center_btn {
            text-align: center;
         }
      }
   </style>
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   <!-- JQVMap -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/dist/css/adminlte.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/summernote/summernote-bs4.css') }}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Ekko Lightbox -->
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
   <script src="{{ asset('assets/admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Select2 -->
   <!-- <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/select2/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> -->
   <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
   

</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" id="logo_size"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <p style="position: absolute;
               top: 50%;
               left: 50%;
               transform: translateX(-50%) translateY(-50%)" ;>Welcome To Our Dashboard</p>
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">


            <div class="dropdown">
               <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  User Details
               </button>
               <div class="dropdown-menu" style="position: absolute;
    top: 230%;
    left: 35%;
    transform: translateX(-50%) translateY(-50%);">
                  <span class="dropdown-item">{{ session('login.name') }}</span>
                  <span class="dropdown-item">{{ session('login.email') }}</span>
                  <!-- <span class="dropdown-item"><a href="{{ url('admin/change_password') }}" class="btn btn-primary">Change Password</a></span> -->
                  <span class="dropdown-item"><a href="{{ url('admin/setting') }}" class="btn btn-primary">Setting</a></span>
               </div>
            </div>
         </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <div style="text-align: center;">
            <a href="{{ url('admin/index') }}">
               <!-- <img src="{{ asset('assets/admin_assets/dist/img/logo1.png') }}" alt="" style="height:90px;"> -->
            </a>
         </div>
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  
                  <li class="nav-item">
                     <a href="{{ url('admin/users') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Users</p>
                     </a>
                  </li>


                  <!-- <li class="nav-item">
                     <a href="{{ url('admin/vehicleregistration') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Add Vehicle & QR Code</p>
                     </a>
                  </li> -->
                  

                  <!-- <li class="nav-item">
                     <a href="{{ url('admin/coupon') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Generate Coupon Code</p>
                     </a>
                  </li> -->


                  <li class="nav-item">
                     <a href="{{ url('admin/aboutus') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>About Us</p>
                     </a>
                  </li> 

                  <li class="nav-item">
                     <a href="{{ url('admin/condition') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Terms & Conditions</p>
                     </a>
                  </li> 


                  <li class="nav-item">
                     <a href="{{ url('admin/privacy') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Privacy Policy</p>
                     </a>
                  </li> 

                  <li class="nav-item">
                     <a href="{{ url('admin/qrcodegenerator') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Generate Qr Code</p>
                     </a>
                  </li> 


                  <li class="nav-item">
                     <a href="{{ url('admin/orders') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Orders</p>
                     </a>
                  </li> 


                  <li class="nav-item">
                     <a href="{{ url('admin/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                     </a>
                  </li>


               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>