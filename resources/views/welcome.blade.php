<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>eBuletin UKM</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />  
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Enlighten Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<!---->
<link href='//fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!---->
</head>
<body>
 <div class="header">
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
          <!— Left Side Of Navbar —>
              <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="{{ url('/') }}" >{{ config('app.name', 'eBuletin UKM') }}</a>
              </li>

          <!— Right Side Of Navbar —>
          <ul class="nav navbar-nav navbar-right">

          @if(Auth::guest())
            <li>
                <a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Log Masuk</a>
            </li>
            <li>
                <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Daftar Masuk</a>
            </li>

            <!— Authentication Links —>

            @elseif (Auth::user()->userRole == 'pembaca')
            
              <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-calendar"></span> Paparan <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('papar') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Berita</a></li>
                    <li><a href="{{ url('acara') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Acara</a></li>
                </ul>
              </li>

              <nav class="nav navbar-nav navbar-left">

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
            </nav>

            @elseif (Auth::user()->userRole= 'pengarang')

              <li>
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
        
          <div class="clearfix"></div>
</div>
      
    <div class="number">
      <p>eBuletin UKM</p>
    </div>
    <div class="logo">
      <a href="index.html"><img src="images/logo.png" alt=""><span>eBuletin</span>UKM</a>
      </div>
    <div class="banner">
      <h1>Universiti Kebangsaan Malaysia  </h1>
      <h2>Pendaulat Amanah Negara</h2>
    </div>
  </div> 
</div>      
  <!--content-->
  <div class="content w3layouts-agile">
    <div class="container">
    <div class="content-top wthee-agileinfo">
      <div class="col-md-6 content-top1">
        <img src="images/pl.jpg" class="img-responsive" alt="">
        <div class="content-plan">
        
          <h6><a href="http://smp.ukm.my/">Sistem Maklumat Pelajar</a></h6>
          <p>Menyemak maklumat peribadi, pendaftaran kursus dan keputusan peperiksaan. </p>
        </div>
        <span class="locations" >SMP Web</span>
      </div>
      <div class="col-md-6 content-top1">
        <img src="images/pl1.jpg" class="img-responsive" alt="">
        <div class="content-plan">
        
          <h6><a href="http://ifolio.ukm.my/">Sistem LearningCare</a></h6>
          <p>Memuat turun latihan tutorial, nota kuliah dan berinteraksi dengan pensyarah melalui e-Pembelajaran. </p>
        </div>
        <span class="locations" >iFolio UKM</span>
      </div>
      
        <div class="clearfix"></div>
      </div>
    </div>
    <!---->
    <div class="content-mid">
      <div class="col-md-3 content-mid1">
        <div class=" content-mid-img">
        
        </div>
      </div>
      <div class="col-md-7 content-mid2">
      <div class=" grid-middle">
      <div class=" grid-mid">
      <label></label>
      <?php $i = 0 ?>

      @foreach($beritas as $berita)

      <h3><a href="{{ url('papar') }}">Latest-News</a></h3>
      <p>Segala maklumat berita yang berlaku di dalam mahupun di luar UKM hanya di sini!</p>
      
        <div class="news-top">
        <div class=" col-md-6 latest-grid">
          <div class="col-md-9 news-in">
            <h5><a href="{{ url('papar', $berita->id) }}">{{ $berita->tajuk }}</a></h5>
            <p>{{ $berita->lokasi }}</p>
          </div>
          <div class="col-md-3 news">
            <h4>{{ $berita->created_at->format('d')}}<span>{{ $berita->created_at->format('F')}}</span></h4>          
          </div>
          <div class="clearfix"> </div>
        </div>

        <div class=" col-md-6 latest-grid">
          <div class="col-md-3 news">
            <h4>{{ $berita->created_at->format('d')}}<span>{{ $berita->created_at->format('F')}}</span></h4>          
          </div>
          <div class="col-md-9 news-in in-news">
            <h5><a href="{{ url('papar', $berita->id) }}">{{ $berita->tajuk }}</a></h5>
            <p>{{ $berita->lokasi }}</p>
          </div>
          @endforeach
          <div class="clearfix"> </div>
        </div>
      <div class="clearfix"> </div>
      </div>
      @foreach($events as $event)

          <div class="news-top">
        <div class=" col-md-6 latest-grid">
          <div class="col-md-9 news-in">
            <h5><a href="{{ url('acara', $event->id) }}">{{ $event->tajuk }}</a></h5>
            <p>{{ $event->lokasi }}</p>
          </div>
          <div class="col-md-3 news">
            <h4>{{ $event->created_at->format('d')}}<span>{{ $event->created_at->format('F')}}</span></h4>          
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class=" col-md-6 latest-grid">
          <div class="col-md-3 news">
            <h4>{{ $event->created_at->format('d')}}<span>{{ $event->created_at->format('F')}}</span></h4>          
          </div>
          <div class="col-md-9 news-in in-news">
            <h5><a href="{{ url('acara', $event->id) }}">{{ $event->tajuk }}</a></h5>
            <p>{{ $event->lokasi }}</p>
          @endforeach
          </div>
          
          <div class="clearfix"> </div>
        </div>
      <div class="clearfix"> </div>
      </div>
    </div>
    </div>
      </div>
      <div class="col-md-2 content-mid1">
        <div class=" content-mid-img1">
        
        </div>      
      </div>
      <div class="clearfix"></div>
    </div>
    <!---->
          
    <div class="feature">
      <div class="container">
        <div class="feature-top">
          <label></label>
          <h3>Special Care On Students</h3>
        </div>
        <div class="feature-grid">
          <div class="col-md-4 feature-grid">
            <h5><a href="http://www.ukm.my/ptsl/">Perpustakaan Tun Sri Lanang (PTSL)</a></h5>
            <div class=" fe-grid">
              <i class="glyphicon glyphicon-map-marker"></i>
              <div class="feature-text">
                <p>Jalan Nik Ahmed Kamil, 43600 Bangi, Selangor, Malaysia</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <a href="http://www.ukm.my/ptsl/"><img src="images/pc.jpg" class="img-responsive" alt=""></a>
            <a href="http://www.ukm.my/ptsl/" class="read"> Read More</a>
          </div>
          <div class="col-md-4 feature-grid">
            <h5><a href="http://www.ukm.my/citra/">Pusat Citra Universiti</a></h5>
            <div class=" fe-grid">
              <i class="glyphicon glyphicon-map-marker"></i>
              <div class="feature-text">
                <p>Pusat Citra Universiti, UKM, 43600 Bangi, Selangor, Malaysia</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <a href="http://www.ukm.my/citra/"><img src="images/pc1.jpg" class="img-responsive" alt=""></a>
            <a href="http://www.ukm.my/citra/" class="read"> Read More</a>
          </div>
          <div class="col-md-4 feature-grid">
            <h5><a href="http://www.ukm.my/pkp/">Bahagian Pengurusan Akademik (BPA)</a></h5>
            <div class=" fe-grid">
              <i class="glyphicon glyphicon-map-marker"></i>
              <div class="feature-text">
                <p>Pusat Pengurusan Akademik UKM, UKM, 43600 Bangi, Selangor, Malaysia</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <a href="http://www.ukm.my/pkp/"><img src="images/pc2.jpg" class="img-responsive" alt=""></a>
            <a href="http://www.ukm.my/pkp/" class="read"> Read More</a>
          </div>
          <div class="clearfix"> </div> 
        </div>
      </div>
    </div>
    <!--map-->
      <div class="map-top w3layouts-agile">
        <div class="map wl-agileinfo">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.720013275624!2d101.69833925057526!3d3.1682616976817926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4823d06ae9ab%3A0xe006878f9ec89fc7!2sUniversiti+Kebangsaan+Malaysia+Fakulti+Sains+Kesihatan+Kampus+Kuala+Lumpur!5e0!3m2!1sen!2smy!4v1494743449388" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        <span></span>
        </div>
          <div class="address">
          <label></label>
            <h4>Universiti Kebangsaan Malaysia</h4>
            <p>Pekan Bangi, 43600 Bangi, Selangor, Malaysia</p>
          </div>
        </div>
        <!--//map-->
        <!---->
        <div class="container">
        <div class="content-bottom">
          
          
          <div class="col-md-4 address-grid">
                <h5>Address</h5>
                <p>Universiti Kebangsaan Malaysia,
                Pekan Bangi, 43600 Bangi, Selangor, Malaysia</p>
              
            </div>
            <div class="col-md-4 address-grid ">
              
              <h5>Our Phone</h5>
                <p>+60 3-8921 5555</p>
              
            </div>
            <div class="col-md-4 address-grid ">
              
              <h5>Official Website</h5>
                <p><a href="http://www.ukm.my/"> www.ukm.my</a></p>
              
            </div>
            <div class="clearfix"> </div> 
          
          </div>
        </div>
    <!--//-->
    
  </div>
  <!--//content-->
<!--footer-->
  <div class="footer w3layouts-agile">
        <div class="container">
          <p class="footer-class">&copy; 2017 eBuletin UKM. All Rights Reserved | Design by  Nur Syamimi Ahmat Azizudin For Final Year Project</a> </p>
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

<script src="js/bootstrap.min.js"></script>
</body>
</html>