<?php $data = session('login.role');
//print_r($data);
//die;
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Varilytics</title>
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo.jpeg') }}">
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

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/js/bootstrap-multiselect.min.js"></script>
   <script>
      $(document).ready(function() {
         //$("#multjc").show(8000);
         $('#multjc').multiselect();
      });
   </script>

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
               transform: translateX(-50%) translateY(-50%)" ;>Welcome to VariLytics Dashboard</p>
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
               <img src="{{ asset('assets/admin_assets/dist/img/logo1.png') }}" alt="" style="height:90px;">
            </a>
         </div>
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview <?php if (in_array(2, $data)) {
                                                      echo "";
                                                   } else {
                                                      echo "d-none";
                                                   } ?> ">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                           Pages
                           <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                 Home
                                 <i class="fas fa-angle-left right"></i>
                              </p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{ url('admin/testimonial') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Testimonials</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{ url('admin/slider') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Slider</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                 Infographics
                                 <i class="fas fa-angle-left right"></i>
                              </p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{ url('admin/current_topics') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Current Topics</p>
                                 </a>
                                 <a href="{{ url('admin/industries') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Industries</p>
                                 </a>
                                 <a href="{{ url('admin/infographics') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Infographics</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>

                  </li>
                  <li class="nav-item has-treeview <?php if (in_array(1, $data)) {
                                                      echo "";
                                                   } else {
                                                      echo "d-none";
                                                   } ?> ">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                           Master
                           <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{ url('admin/country-group') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Country Groups</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/country') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Country</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/states') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>States</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/districts') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Districts</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/smartCities') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Smart Cities</p>
                           </a>
                        </li>
                        <!-- <li class="nav-item">
                           <a href="{{ url('admin/commodity') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Commodity</p>
                           </a>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a href="{{ url('admin/year') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Year</p>
                           </a>
                        </li> -->
                        <li class="nav-item">
                           <a href="{{ url('admin/organization_countries') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Organizations & Countries</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/work_field') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Work Field</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/work_file') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Work File</p>
                           </a>
                        </li>

                     </ul>
                  </li>

                  <!-- <li class="nav-item <?php if (in_array(9, $data)) {
                                                // echo "";
                                             } else {
                                                // echo "d-none";
                                             } ?> ">
                     <a href="{{ url('admin/compare') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Compare</p>
                     </a>
                  </li> -->

                  <!-- <li class="nav-item">
                     <a href="{{ url('admin/commodityYearValue') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>CommodityYearValue</p>
                     </a>
                  </li> -->

                  <li class="nav-item <?php if (in_array(3, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="{{ url('admin/topic') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Topic</p>
                     </a>
                  </li>
                  <li class="nav-item <?php if (in_array(4, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact <i class="fas fa-angle-left right"></i></p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{ url('admin/data_source') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Data Source</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/data_submission') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Data Submission Request </p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/customer_service') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Customer Service</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item <?php if (in_array(5, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="{{ url('admin/users') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Dashborad Users</p>
                     </a>
                  </li>
                  <li class="nav-item <?php if (in_array(8, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?>">
                     <a href="{{ url('admin/customers') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Customers</p>
                     </a>
                  </li>
                  <li class="nav-item <?php if (in_array(6, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="{{ url('admin/assign_work') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Assign Work</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/review_work') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Review Work</p>
                     </a>
                  </li>

                  <li class="nav-item <?php if (in_array(9, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="{{ url('admin/combine') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Combine</p>
                     </a>
                  </li>
                  <li class="nav-item <?php if (in_array(10, $data)) {
                                          echo "";
                                       } else {
                                          echo "d-none";
                                       } ?> ">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Scrapping <i class="fas fa-angle-left right"></i></p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{ url('admin/commodities') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Commodities</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/category') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Category</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/mandi-price') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Mandi Price</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/mandi-arrival') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Mandi Arrival </p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ url('admin/crop-production') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Crop Production</p>
                           </a>
                        </li>

                     </ul>
                  </li>

                  <li class="nav-item">
                     <a href="{{ url('admin/message') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Message</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/payment') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Payment</p>
                     </a>
                  </li>
                  <!-- <li class="nav-item">
                     <a href="{{ url('admin/data') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Data</p>
                     </a>
                  </li> -->
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