<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

  <!-- Font Awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400;500;600;700;900&display=swap" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


  <title>SIPK - @yield("title")</title>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.includes._navbar')

      @include('layouts.includes._sidebar')

      @yield('content')

    </div>
  </div>

  <!-- Optional JavaScript Start-->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="{{asset('js/sidebar-mobile.js')}}"></script>


  <!-- Optional Javascript End -->


  <!-- <nav class="navbar navbar-expand p-0">
    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr0" href="{{route('home')}}"> PT. Gajian </a>
    <button class="btn btn-link d-block d-md-none" datatoggle="collapse" data-target="#sidebar-nav" role="button">
      <span class="fa fa-bars"></span>
    </button>
    <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text" placeholder="Search" arialabel="Search">
    <div class="dropdown d-none d-md-block">
      @if(\Auth::user())
      <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
        {{Auth::user()->name}}
      </button>
      @endif
      <div class="dropdown-menu dropdown-menu-right" id="navbardropdown">
        <a href="#" class="dropdown-item">Profile</a>
        <a href="#" class="dropdown-item">Setting</a>
        <div class="dropdown-divider"></div>
        <li>
          <form action="{{route("logout")}}" method="POST">
            @csrf
            <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
          </form>
        </li>
      </div>
    </div>
  </nav> -->

  <!-- <div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-itemsstretch m-0">
      <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">
        <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
          <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
          <!-- Sidebar -->
  <!-- <li class="{{ (request()->is('home')) ? 'active' : '' }}"><a class="nav-link" href="{{url('/home')}}"> <span class="fa fa-home"></span> Dashboard</a></li>

          <li class="{{ (request()->is('users')) ? 'active' : '' }}"><a class="nav-link" href="{{url('/users')}}"> <span class="fa fa-users"></span> Data User</a></li> -->

  <!-- Endof Sidebar -->

  <!-- <div class="d-block d-md-none">
            <div class="dropdown-divider"></div>
            <li><a href="#"> Profile</a></li>
            <li><a href="#"> Setting</a></li>
            <li>
              <form action="{{route("logout")}}" method="POST">
                @csrf
                <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
              </form>
            </li>
          </div>
        </ul>
        <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
          <span class="oi oi-cog"></span>
        </div>
      </div>
      <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
          <div class="col-md-12 pl-3 pt-2">
            <div class="pl-3">
              <h3>@yield("pageTitle")</h3>
              <br />
            </div>
          </div>
        </div>
        
      </div>
    </div> -->
  <!-- </div> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
</body>

</html>