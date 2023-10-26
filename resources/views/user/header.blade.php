<?php
$login_email = session('login_email');
//echo $login_email;die;
if (isset($login_email)) {
    $results = DB::select("SELECT * FROM customers WHERE email =?",[$login_email]);
}
//print_r($results[0]->name);
//die;
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>VariLytics</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo.jpeg') }}">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/aos.css')}}">
    <!-- Custom Stylesheet -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/flag-icon.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <style type="text/css">
        .a2a_hide {
            display: none
        }

        .a2a_logo_color {
            background-color: #0166ff
        }

        .a2a_menu,
        .a2a_menu * {
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            float: none;
            margin: 0;
            padding: 0;
            position: static;
            height: auto;
            width: auto
        }

        .a2a_menu {
            border-radius: 6px;
            display: none;
            direction: ltr;
            background: #FFF;
            font: 16px sans-serif-light, HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Arial, Helvetica, "Liberation Sans", sans-serif;
            color: #000;
            line-height: 12px;
            border: 1px solid #CCC;
            vertical-align: baseline;
            overflow: hidden
        }

        .a2a_mini {
            min-width: 200px;
            position: absolute;
            width: 300px;
            z-index: 9999997
        }

        .a2a_overlay {
            display: none;
            background: #616c7d;
            opacity: .92;
            backdrop-filter: blur(8px);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 9999998;
            -webkit-tap-highlight-color: transparent;
            transition: opacity .14s, backdrop-filter .14s
        }

        .a2a_full {
            background: #FFF;
            border: 1px solid #FFF;
            height: auto;
            height: calc(320px);
            top: 15%;
            left: 50%;
            margin-left: -320px;
            position: fixed;
            text-align: center;
            width: 640px;
            z-index: 9999999;
            transition: transform .14s, opacity .14s
        }

        .a2a_full_footer,
        .a2a_full_header,
        .a2a_full_services {
            border: 0;
            margin: 0;
            padding: 12px;
            box-sizing: border-box
        }

        .a2a_full_header {
            padding-bottom: 8px
        }

        .a2a_full_services {
            height: 280px;
            overflow-y: scroll;
            padding: 0 12px;
            -webkit-overflow-scrolling: touch
        }

        .a2a_full_services .a2a_i {
            display: inline-block;
            float: none;
            width: 181px;
            width: calc(33.334% - 18px)
        }

        div.a2a_full_footer {
            font-size: 12px;
            text-align: center;
            padding: 8px 14px
        }

        div.a2a_full_footer a,
        div.a2a_full_footer a:visited {
            display: inline;
            font-size: 12px;
            line-height: 14px;
            padding: 8px 14px
        }

        div.a2a_full_footer a:focus,
        div.a2a_full_footer a:hover {
            background: 0 0;
            border: 0;
            color: #0166FF
        }

        div.a2a_full_footer a span.a2a_s_a2a,
        div.a2a_full_footer a span.a2a_w_a2a {
            background-size: 14px;
            border-radius: 3px;
            display: inline-block;
            height: 14px;
            line-height: 14px;
            margin: 0 3px 0 0;
            vertical-align: top;
            width: 14px
        }

        .a2a_modal {
            height: 0;
            left: 50%;
            margin-left: -320px;
            position: fixed;
            text-align: center;
            top: 15%;
            width: 640px;
            z-index: 9999999;
            transition: transform .14s, opacity .14s;
            -webkit-tap-highlight-color: transparent
        }

        .a2a_modal_body {
            background: 0 0;
            border: 0;
            font: 24px sans-serif-light, HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Arial, Helvetica, "Liberation Sans", sans-serif;
            position: relative;
            height: auto;
            width: auto
        }

        .a2a_thanks {
            color: #fff;
            height: auto;
            margin-top: 20px;
            width: auto
        }

        .a2a_thanks>div:first-child {
            margin: 0 0 40px 0
        }

        .a2a_thanks div * {
            height: inherit
        }

        #a2a_copy_link {
            background: #FFF;
            border: 1px solid #FFF;
            margin-top: 15%
        }

        span.a2a_s_link#a2a_copy_link_icon,
        span.a2a_w_link#a2a_copy_link_icon {
            background-size: 48px;
            border-radius: 0;
            display: inline-block;
            height: 48px;
            left: 0;
            line-height: 48px;
            margin: 0 3px 0 0;
            position: absolute;
            vertical-align: top;
            width: 48px
        }

        #a2a_modal input#a2a_copy_link_text {
            background-color: transparent;
            border: 0;
            color: #2A2A2A;
            font: inherit;
            height: 48px;
            left: 62px;
            max-width: initial;
            padding: 0;
            position: relative;
            width: 564px;
            width: calc(100% - 76px)
        }

        #a2a_copy_link_copied {
            background-color: #0166ff;
            color: #fff;
            display: none;
            font: inherit;
            font-size: 16px;
            margin-top: 1px;
            padding: 3px 8px
        }

        @media (prefers-color-scheme:dark) {

            .a2a_menu a,
            .a2a_menu a.a2a_i,
            .a2a_menu a.a2a_i:visited,
            .a2a_menu a.a2a_more,
            i.a2a_i {
                border-color: #2a2a2a !important;
                color: #fff !important
            }

            .a2a_menu a.a2a_i:active,
            .a2a_menu a.a2a_i:focus,
            .a2a_menu a.a2a_i:hover,
            .a2a_menu a.a2a_more:active,
            .a2a_menu a.a2a_more:focus,
            .a2a_menu a.a2a_more:hover,
            .a2a_menu_find_container {
                border-color: #444 !important;
                background-color: #444 !important
            }

            .a2a_menu {
                background-color: #2a2a2a;
                border-color: #2a2a2a
            }

            .a2a_menu_find {
                color: #fff !important
            }

            .a2a_menu span.a2a_s_find svg {
                background-color: transparent !important
            }

            .a2a_menu span.a2a_s_find svg path {
                fill: #fff !important
            }
        }

        @media print {

            .a2a_floating_style,
            .a2a_menu,
            .a2a_overlay {
                visibility: hidden
            }
        }

        @keyframes a2aFadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .a2a_starting {
            opacity: 0
        }

        .a2a_starting.a2a_full,
        .a2a_starting.a2a_modal {
            transform: scale(.8)
        }

        @media (max-width:639px) {
            .a2a_full {
                border-radius: 0;
                top: 15%;
                left: 0;
                margin-left: auto;
                width: 100%
            }

            .a2a_modal {
                left: 0;
                margin-left: 10px;
                width: calc(100% - 20px)
            }
        }

        @media (min-width:318px) and (max-width:437px) {
            .a2a_full .a2a_full_services .a2a_i {
                width: calc(50% - 18px)
            }
        }

        @media (max-width:317px) {
            .a2a_full .a2a_full_services .a2a_i {
                width: calc(100% - 18px)
            }
        }

        @media (max-height:436px) {
            .a2a_full {
                bottom: 40px;
                height: auto;
                top: 40px
            }
        }

        @media (max-height:550px) {
            .a2a_modal {
                top: 30px
            }
        }

        @media (max-height:360px) {
            .a2a_modal {
                top: 20px
            }

            .a2a_thanks>div:first-child {
                margin-bottom: 20px
            }
        }

        .a2a_menu a {
            color: #0166FF;
            text-decoration: none;
            font: 16px sans-serif-light, HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Arial, Helvetica, "Liberation Sans", sans-serif;
            line-height: 14px;
            height: auto;
            width: auto;
            outline: 0
        }

        .a2a_menu a.a2a_i:visited,
        .a2a_menu a.a2a_more {
            color: #0166FF
        }

        .a2a_menu a.a2a_i:active,
        .a2a_menu a.a2a_i:focus,
        .a2a_menu a.a2a_i:hover,
        .a2a_menu a.a2a_more:active,
        .a2a_menu a.a2a_more:focus,
        .a2a_menu a.a2a_more:hover {
            color: #2A2A2A;
            border-color: #EEE;
            border-style: solid;
            background-color: #EEE;
            text-decoration: none
        }

        .a2a_menu span.a2a_s_find {
            background-size: 24px;
            height: 24px;
            left: 8px;
            position: absolute;
            top: 7px;
            width: 24px
        }

        .a2a_menu span.a2a_s_find svg {
            background-color: #FFF
        }

        .a2a_menu span.a2a_s_find svg path {
            fill: #CCC
        }

        #a2a_menu_container {
            display: inline-block
        }

        .a2a_menu_find_container {
            border: 1px solid #CCC;
            border-radius: 6px;
            padding: 2px 24px 2px 0;
            position: relative;
            text-align: left
        }

        .a2a_cols_container .a2a_col1 {
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch
        }

        #a2a_modal input,
        #a2a_modal input[type=text],
        .a2a_menu input,
        .a2a_menu input[type=text] {
            display: block;
            background-image: none;
            box-shadow: none;
            line-height: 100%;
            margin: 0;
            outline: 0;
            overflow: hidden;
            padding: 0;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            -webkit-appearance: none
        }

        #a2afeed_find_container input,
        #a2afeed_find_container input[type=text],
        #a2apage_find_container input,
        #a2apage_find_container input[type=text] {
            background-color: transparent;
            border: 0;
            box-sizing: content-box;
            color: #2A2A2A;
            font: inherit;
            font-size: 16px;
            height: 28px;
            line-height: 20px;
            left: 38px;
            outline: 0;
            margin: 0;
            max-width: initial;
            padding: 2px 0;
            position: relative;
            width: 99%
        }

        .a2a_clear {
            clear: both
        }

        .a2a_svg {
            background-repeat: no-repeat;
            display: block;
            overflow: hidden;
            height: 32px;
            line-height: 32px;
            padding: 0;
            width: 32px
        }

        .a2a_svg svg {
            background-repeat: no-repeat;
            background-position: 50% 50%;
            border: none;
            display: block;
            left: 0;
            margin: 0 auto;
            overflow: hidden;
            padding: 0;
            position: relative;
            top: 0;
            width: auto;
            height: auto
        }

        a.a2a_i,
        i.a2a_i {
            display: block;
            float: left;
            border: 1px solid #FFF;
            line-height: 24px;
            padding: 6px 8px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 132px
        }

        a.a2a_i span,
        a.a2a_more span {
            display: inline-block;
            overflow: hidden;
            vertical-align: top
        }

        a.a2a_i .a2a_svg {
            margin: 0 6px 0 0
        }

        a.a2a_i .a2a_svg,
        a.a2a_more .a2a_svg {
            background-size: 24px;
            height: 24px;
            line-height: 24px;
            width: 24px
        }

        a.a2a_sss:hover {
            border-left: 1px solid #CCC
        }

        a.a2a_more {
            border-bottom: 1px solid #FFF;
            border-left: 0;
            border-right: 0;
            line-height: 24px;
            margin: 6px 0 0;
            padding: 6px;
            -webkit-touch-callout: none
        }

        a.a2a_more span {
            height: 24px;
            margin: 0 6px 0 0
        }

        .a2a_kit .a2a_svg {
            background-repeat: repeat
        }

        .a2a_default_style a {
            float: left;
            line-height: 16px;
            padding: 0 2px
        }

        .a2a_default_style a:hover .a2a_svg,
        .a2a_floating_style a:hover .a2a_svg,
        .a2a_overlay_style a:hover .a2a_svg svg {
            opacity: .7
        }

        .a2a_overlay_style.a2a_default_style a:hover .a2a_svg {
            opacity: 1
        }

        .a2a_default_style .a2a_count,
        .a2a_default_style .a2a_svg,
        .a2a_floating_style .a2a_svg,
        .a2a_menu .a2a_svg,
        .a2a_vertical_style .a2a_count,
        .a2a_vertical_style .a2a_svg {
            border-radius: 4px
        }

        .a2a_default_style .a2a_counter img,
        .a2a_default_style .a2a_dd,
        .a2a_default_style .a2a_svg {
            float: left
        }

        .a2a_default_style .a2a_img_text {
            margin-right: 4px
        }

        .a2a_default_style .a2a_divider {
            border-left: 1px solid #000;
            display: inline;
            float: left;
            height: 16px;
            line-height: 16px;
            margin: 0 5px
        }

        .a2a_kit a {
            cursor: pointer
        }

        .a2a_floating_style {
            background-color: #fff;
            border-radius: 6px;
            position: fixed;
            z-index: 9999995
        }

        .a2a_overlay_style {
            z-index: 2147483647
        }

        .a2a_floating_style,
        .a2a_overlay_style {
            animation: a2aFadeIn .2s ease-in;
            padding: 4px
        }

        .a2a_vertical_style a {
            clear: left;
            display: block;
            overflow: hidden;
            padding: 4px;
            text-decoration: none
        }

        .a2a_floating_style.a2a_default_style {
            bottom: 0
        }

        .a2a_floating_style.a2a_default_style a,
        .a2a_overlay_style.a2a_default_style a {
            padding: 4px
        }

        .a2a_count {
            background-color: #fff;
            border: 1px solid #ccc;
            box-sizing: border-box;
            color: #2a2a2a;
            display: block;
            float: left;
            font: 12px Arial, Helvetica, sans-serif;
            height: 16px;
            margin-left: 4px;
            position: relative;
            text-align: center;
            width: 50px
        }

        .a2a_count:after,
        .a2a_count:before {
            border: solid transparent;
            border-width: 4px 4px 4px 0;
            content: "";
            height: 0;
            left: 0;
            line-height: 0;
            margin: -4px 0 0 -4px;
            position: absolute;
            top: 50%;
            width: 0
        }

        .a2a_count:before {
            border-right-color: #ccc
        }

        .a2a_count:after {
            border-right-color: #fff;
            margin-left: -3px
        }

        .a2a_count span {
            animation: a2aFadeIn .14s ease-in
        }

        .a2a_vertical_style .a2a_counter img {
            display: block
        }

        .a2a_vertical_style .a2a_count {
            float: none;
            margin-left: 0;
            margin-top: 6px
        }

        .a2a_vertical_style .a2a_count:after,
        .a2a_vertical_style .a2a_count:before {
            border: solid transparent;
            border-width: 0 4px 4px 4px;
            content: "";
            height: 0;
            left: 50%;
            line-height: 0;
            margin: -4px 0 0 -4px;
            position: absolute;
            top: 0;
            width: 0
        }

        .a2a_vertical_style .a2a_count:before {
            border-bottom-color: #ccc
        }

        .a2a_vertical_style .a2a_count:after {
            border-bottom-color: #fff;
            margin-top: -3px
        }

        .a2a_nowrap {
            white-space: nowrap
        }

        .a2a_note {
            margin: 0 auto;
            padding: 9px;
            font-size: 12px;
            text-align: center
        }

        .a2a_note .a2a_note_note {
            margin: 0;
            color: #2A2A2A
        }

        .a2a_wide a {
            display: block;
            margin-top: 3px;
            border-top: 1px solid #EEE;
            text-align: center
        }

        .a2a_label {
            position: absolute !important;
            clip-path: polygon(0px 0px, 0px 0px, 0px 0px);
            -webkit-clip-path: polygon(0px 0px, 0px 0px, 0px 0px);
            overflow: hidden;
            height: 1px;
            width: 1px
        }

        .a2a_kit,
        .a2a_menu,
        .a2a_modal,
        .a2a_overlay {
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            outline: 0
        }

        .a2a_dd img {
            border: 0
        }

        .a2a_button_facebook_like iframe {
            max-width: none
        }

        @media only screen and (max-width:480px) {
            .logo_design {
                width: 55px !important;
            }

            .signin-btn {
                position: absolute;
                right: 73px;
                top: 23px;
            }
        }
    </style>
    <style>
        ._info {
            text-align: center;
        }

        ._info h1 {
            margin: 10px 0;
            text-transform: capitalize;
        }

        ._info p {
            color: #555555;
        }

        ._info a {
            display: inline-block;
            background-color: #E53E3E;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        @media only screen and (max-width: 600px) {
            #customerInfo {
                position: absolute;
                top: 200%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                background: #0f2e8d;
                display: none;
            }
        }

        @media only screen and (min-width: 601px) {
            #customerInfo {
                position: absolute;
                top: 160%;
                left: 84%;
                transform: translateX(-50%) translateY(-50%);
                background: #0f2e8d;
                display: none;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#customerDetail").click(function() {
                $("#customerInfo").toggle();
            });
        });
    </script>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">

    <div id="main-wrapper" class="show">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="{{url('/')}}"> <img src="{{ url('assets/images/logo.jpeg') }}" alt="" class="img-fluid logo_design" style="width:80px;"> </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <!-- <li class="nav-item"> <a class="nav-link" href="about">About Us</a>
                                        </li> -->
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{url('statistics')}}">Statistics </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu"> <a class="dropdown-item" href="{{url('agriculture')}}">Agriculture </a> <a class="dropdown-item" href="{{url('art_design')}}">Art and Design</a> <a class="dropdown-item" href="{{ url('education') }}">Education </a>
                                                <a class="dropdown-item" href="{{url('finance')}}">Finance </a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{ url('insights')}}">Insights </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu"> <a class="dropdown-item" href="{{ url('infographics') }}">Infographics </a> <a class="dropdown-item" href="{{ url('visuals')}}">Visuals </a> <a class="dropdown-item" href="{{ url('analytics')}}">Analytics</a> <a class="dropdown-item" href="{{ url('dashboards')}}">Dashboards </a> <a class="dropdown-item" href="{{ url('on_demand_services')}}">On Demand Services </a> </div>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{ url('data_library')}}">Data Library </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu"> <a class="dropdown-item" href="{{ url('data_board')}}">Data Board </a> <a class="dropdown-item" href="{{ url('data_coverage')}}">Data Coverage </a> </div>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">Tools </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu">
                                                <!-- <a class="dropdown-item" href="view">View</a> -->
                                                <a class="dropdown-item" href="{{ url('simple_search')}}">Search</a> <a class="dropdown-item" href="{{ url('custom_query') }}">Query</a> <a class="dropdown-item" href="{{ url('compare_sources')}}">Compare</a> <a class="dropdown-item" href="{{ url('create')}}">Create</a> <a class="dropdown-item" href="{{ url('publish')}}">Publish</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{ url('data_store') }}">Data Store </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu"> <a class="dropdown-item" href="{{ url('dashboards') }}">Dashboard</a> <a class="dropdown-item" href="{{ url('infographics') }}">Infographics</a> <a class="dropdown-item" href="{{ url('outlooks') }}">Outlooks</a> <a class="dropdown-item" href="{{ url('publications') }}">Publications</a> <a class="dropdown-item" href="{{ url('reports') }}">Reports</a> <a class="dropdown-item" href="{{ url('statistics') }}">Statistics</a> <a class="dropdown-item" href="{{ url('surveys') }}">Surveys</a> <a class="dropdown-item" href="{{ url('varisurvey') }}">VariSurvey</a> <a class="dropdown-item" href="{{ url('data-visuals') }}">Visuals</a> <a class="dropdown-item" href="{{ url('whitepapers') }}">Whitepapers</a> </div>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{ url('resources') }}">Resources </a> <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu"> <a class="dropdown-item disabled" href="{{ url('compendiums') }}">Compendiums</a> <a class="dropdown-item disabled" href="{{ url('repositories') }}">Repositories</a> <a class="dropdown-item disabled" href="{{ url('intelligence_system') }}">Intelligence System</a> <a class="dropdown-item" href="{{ url('newsfeed') }}">Newsfeed</a> <a class="dropdown-item" href="{{ url('blogs') }}">Blogs</a> </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="{{ url('subscription') }}">Pricing & Access </a>
                                            <span class="toggle-dropdown"></span>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('registration') }}">Registration</a>
                                                <a class="dropdown-item" href="{{ url('purchase') }}">Purchase</a>
                                                <!-- <a class="dropdown-item" href="#plan">Subscription</a> -->
                                                <!-- <ul>
                                                    <li class="dropdown-toggle2">
                                                        <a class="dropdown-item" href="{{ url('subscription') }}" data-toggle="dropdown">Subscription
                                                        </a>
                                                        <div class="dropdown-menu2"> <a class="dropdown-item" href="{{ url('basic_access') }}">Basic Access</a>
                                                            <a class="dropdown-item" href="{{ url('professional_access')}}">Professional Access</a>
                                                            <a class="dropdown-item" href="{{ url('insights_access')}}">Insight
                                                                Access</a> <a class="dropdown-item" href="{{ url('premium_access')}}">Premium Access</a>
                                                        </div>
                                                    </li>
                                                </ul> -->
                                            </div>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>

                                <?php if (isset($login_email)) { ?>
                                    <div style="margin-left: 20px;" id="customerDetail">
                                        <div>
                                            <img src="{{ isset($results[0]->profile_image) ? $results[0]->profile_image : asset('assets/images/no_image.png') }}" class="rounded-circle" alt="{{isset($results[0]->name) ? $results[0]->name: '' }}" width="50" height="50">
                                        </div>

                                    </div>
                                <?php } else { ?>
                                    <div class="signin-btn"> <a class="btn btn-primary" href="{{ url('login') }}">Login</a> </div>
                                <?php } ?>
                            </nav>
                            <div class="_info" id="customerInfo" style="">
                                <p style="color:white;font-size: larger;margin: 0px">{{ isset($results[0]->name) ? $results[0]->name : '' }}</p>
                                <p style="color:white;margin: 5px 10px;">{{ isset($results[0]->email) ? $results[0]->email : '' }}</p>
                                <a href="{{ url('CustomerLogout') }}" style="margin:5px;">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>