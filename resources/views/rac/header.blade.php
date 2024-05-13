<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('clients_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('clients_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/responsive.css') }}"> 
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('guest.home') }}">
                                        <img src="{{ asset('clients_assets/img/logo.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('guest.home') }}">home</a></li>
                                            <li><a href="{{ route('guest.shop') }}">Shop</a></li>
                                       
                                          
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                              
                                    @if (auth()->check())
                          <!-- Display the name of the authenticated user -->
                          <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
    {{ auth()->user()->first_name }}  </button>
                           
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('employee.profile') }}">My Profile</a></li>
        <li><a class="dropdown-item" href="#">
        <form method="POST" action="/logout">
                                    @csrf
                                    <button class="dropdown-item text-center" type="submit">Logout</button>
                                </form>
                                </a></li></ul>
                            </div>
                        </div>
                                 <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="{{ route('employee.create') }}">Post a Job</a>
                                </div>
                            
                                   @else
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="/login">Log in</a>
                                    </div>
                                
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="/login">Post a Job</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
