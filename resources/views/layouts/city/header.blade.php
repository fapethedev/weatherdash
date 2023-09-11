<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>WEATHER FORECAST DASH</title>

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/gritter/css/jquery.gritter.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('lineicons/style.css')}}">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ac191db33.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('js/chart-master/Chart.js') }}"></script>
<body>


<x-auth-session-status class="mb-4" :status="session('status')" />
<section id="container">
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="{{route('dashboard')}}" class="logo"><b>WEATHER FORECAST DASH</b></a>

        @if(Route::has('login'))
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li><input class="logout" type="submit" value="Se Deconnecter"></li>
                    </form>
                @else
                    <li><a class="logout" href="{{ route('login') }}">Se Connecter</a></li>

                    @if (Route::has('register'))
                        <li><a class="logout" href="{{ route('register') }}">S'enregister</a></li>
                    @endif
                @endauth
            </ul>
        </div>
            @endif
    </header>

    @if(Route::has('login'))
    <aside>
        @auth
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="{{route('dashboard')}}#"><img src="{{asset('img/ui-sam.jpg')}}"
                                                                           class="img-circle" width="60"></a></p>
                <h5 class="centered">fapethedev</h5>

                <li class="mt">
                    <a class="active" href="{{route('dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Accueil</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:">
                        <i class="fa fa-home"></i>
                        <span>Ville</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('lomé') }}">Lomé</a></li>
                        <li><a href="{{ route('kara') }}">Kara</a></li>
                        <li><a href="{{ route('dapaong') }}">Dapaong</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:">
                        <i class="fa fa-desktop"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('profile.edit') }}">{{ Auth::user()-> name }}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        @endauth
    </aside>
    @endif
    <section id="main-content">
        <section class="wrapper">
