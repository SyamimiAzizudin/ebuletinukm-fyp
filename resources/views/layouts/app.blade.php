<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <!--//theme-style-->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'eBuletin UKM') }}</title>

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>

  <!-- Custom Theme files -->
  <!--theme-style-->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />  
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

  <meta name="keywords" content="Enlighten Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  <!---->
  <script src="js/bootstrap.min.js"></script>
  
  <!---->
  <link href='//fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

</head>

<style>
.thumbnail img {
  display: block;
  width: 200px;
  height: 90px;
  max-height: 150px;
}

</style>

<body>
<div class="header head">
    <div class="container">
    <div class="header-menu">
        <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          @if(Auth::check())
              <li class="active"><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-calendar"></span> Paparan <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('papar') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Berita</a></li>
                    <li><a href="{{ url('acara') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Acara</a></li>
                </ul>
              </li>
              <li>
                  <a href="{{ url('berita') }}"><span class="glyphicon glyphicon-edit"></span> Hebahan Berita</a>
              </li>
              <li>
                  <a href="{{ url('event') }}"><span class="glyphicon glyphicon-edit"></span> Hebahan Acara</a>
              </li>
              <li><a href="{{ url('tetapan') }}"><span class="glyphicon glyphicon-cog"></span> Tetapan Buletin</a></li>
              <li><a href="{{ url('laporan') }}"><span class="glyphicon glyphicon-list-alt"></span> Laporan Buletin</a></li>
              <unread></unread>
        @endif
    </ul>
        <ul class="nav navbar-nav">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li>
                <a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Log Masuk</a>
            </li>
            <li>
                <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Daftar Masuk</a>
            </li>
        @else
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-check"></span> {{ Auth::user()->username }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('profile') }}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Log Keluar
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
     </ul>  
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- start search-->
    
                <div class="search-box">
                   <div id="sb-search" class="sb-search">
                     <form action="#" method="post">
                         <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                         <input class="sb-search-submit" type="submit" value="">
                         <span class="sb-icon-search"> </span>
                    </form>
                    </div>
                 </div>
                 <!----search-scripts---->
                 <script src="js/classie.js"></script>
                 <script src="js/uisearch.js"></script>
                   <script>
                     new UISearch( document.getElementById( 'sb-search' ) );
                   </script>
                    <!----//search-scripts---->
                    <div class="clearfix"></div>
</div>
        <div class="number">
            <p>eBuletin UKM</p>
        </div>
        <div class="logo two">
            <a href="{{ url('/home') }}"><img src="images/logo.png" alt=""><span>eBuletin</span>UKM</a>
        </div>
        
    </div> 
</div>          
    <!--content-->
    <div class="contact w3layouts-agile">
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
        
    </div>
    <!--//content-->
<!--footer-->
    <div class="footer w3layouts-agile">
                <div class="container">
                    <p class="footer-class">&copy; 2017 eBuletin UKM. All Rights Reserved | Design by Nur Syamimi Ahmat Azizudin (A149241) </p>
                    <section id="set-9">
                <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
                    <a href="#set-9" class="hi-icon "><i></i></a>
                    <a href="#set-9" class="hi-icon "><i class="ic"></i></a>
                    <a href="#set-9" class="hi-icon "><i class="ic1"></i></a>
                    <a href="#set-9" class="hi-icon "><i class="ic2"></i></a>
                </div>
            </section>
            </div>
        </div>
        <!--//footer-->
        <!--//footer-->
        <script src="js/jquery.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/uisearch.js"></script>
        <script>
          new UISearch( document.getElementById( 'sb-search' ) );
        </script>
        <!----//search-scripts---->
        <!---->

    <!-- Scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
      $(document).on("click", "#confirm-modal", function(e) {
        window.console&&console.log('foo');
        var url = $(this).attr("href");
        window.console&&console.log(url);
        e.preventDefault();

        $('#destroy-form').attr('action', url);
        $('#destroy-modal').modal({ show: true });
      });
    </script>

    <script>
      $(document).on("click", "#confirm-modal", function(e) {
        window.console&&console.log('foo');
        var url = $(this).attr("href");
        window.console&&console.log(url);
        e.preventDefault();

        $('#destroy-form').attr('action', url);
        $('#destroy-modal').modal({ show: true });
      });
    </script>

    <script src="{{ asset('js/add-image.js') }}"></script>
    @yield('scripts')
</body>
</html>
