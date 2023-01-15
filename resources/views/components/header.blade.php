<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="{{ URL::asset('assets/images/fav.png') }}">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/bower_components/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/pages/waves/css/waves.min.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/icon/feather/css/feather.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/icon/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/icon/feather/css/feather.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">


    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/switchery/css/switchery.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/pages.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/datedropper/css/datedropper.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/spectrum/css/spectrum.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/jquery-minicolors/css/jquery.minicolors.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/bower_components/sweetalert/css/sweetalert.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/widget.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custom_style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/loader.css') }}">

<style>
.error{
    color:red
}
    </style>
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div class="loading">Loading&#8230;</div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index-2.html">
                            <h2>{{ env('APP_NAME') }}</h2>
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">

                        <ul class="nav-right">


                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ URL::asset('assets/images/avatar.png') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>{{ session('name') }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        {{-- <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('users.logout') }}" >
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
