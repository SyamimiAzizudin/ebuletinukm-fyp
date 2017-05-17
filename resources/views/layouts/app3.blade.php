Hanaffi SEIS, [14.05.17 04:48]
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}">//nanti on blik -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('/') }}/_asset/favicon.png">
    <title>{{ config('app.name', 'sistem penyelian') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{('/daterangepicker.css') }}" />
    <link rel='stylesheet' href="{{ ('/fullcalendar/fullcalendar.css') }}">
    <script src="{{ ('/fullcalendar/lib/jquery.min.js') }}"></script>
    <script src="{{('/fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{('/fullcalendar/fullcalendar.js') }}"></script> 
   
 <!-- Custom styles for this template -->
    <!-- <link href="{{ url('_asset/css') }}/style.css" rel="stylesheet">
    <link href="{{ url('_asset/css') }}/daterangepicker.css" rel="stylesheet"> -->
   <!--  <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet"> -->
    

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <!-- Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"> -->
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse " id="app-navbar-collapse">
                    {{-- Left Side Of Navbar -  -> --}}
                    <ul class="nav navbar-nav">
                        @if(Auth::check())

                            {{-- @if ($user->userRole == 'pengarang') --}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-calendar"></span>
                                        Paparan Buletin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('papar') }}">Paparan Berita</a></li>
                                        <li><a href="{{ url('acara') }}">Paparan Acara</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('berita') }}"><span class="glyphicon glyphicon-edit"></span> Hebahan Berita</a></li>
                                <li><a href="{{ url('event') }}"><span class="glyphicon glyphicon-edit"></span> Hebahan Acara</a></li>
                                <li><a href="{{ url('tetapan') }}"><span class="glyphicon glyphicon-cog"></span> Tetapan Buletin</a></li>
                                <li><a href="{{ url('laporan') }}"><span class="glyphicon glyphicon-list-alt"></span> Laporan Buletin</a></li>

                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Laporan Buletin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('laporan_berita') }}"> Berita</a></li>
                                        <li><a href="{{ url('laporan_acara') }}"> Acara</a></li>
                                    </ul>
                                </li> --}}
                            {{-- @else --}}
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Log Masuk</a></li>
                            <li><a href="{{ route('register') }}">Daftar Masuk</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-check"></span>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                     <li><a href="{{ url('profile') }}"><i class="fa fa-btn fa-user"></i><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> 
                                            Log Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
@endif
@if (isset($errors))
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
{{ $error }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endforeach
@endif
</div>
</div>
<div class="row">
<div class="col-md-12">
@yield('content')
</div>
</div>
</div>
</div>

      
   


    <footer class="footer">
    </footer>
    <!-- Scripts -->
   <!--  <script src="{{ asset('js/app.js') }}"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <script type="text/javascript" src="{{ ('/moment.min.js') }}"></script>
   <script type="text/javascript" src="{{ ('/daterangepicker.js') }}"></script>
   <!--  <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script> -->
    
  

        @yield('js')
</body>
</html>