<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>eBuletin UKM</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/src/self.css" />

</head>
<style>
.thumbnail img {
  display: block;
  width: 150px;
  height: 80px;
  max-height: 150px;
}

</style>
<body>
<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
      <div class="logo floatleft"><a href="#"><img src="images/ukm.png"  /></a>
      <img src="images/kpt.png" alt="" /></div>

      <div class="social_plus_search floatright">
        <div class="social">
          <ul>
            <li><a href="#" class="twitter"></a></li>
            <li><a href="#" class="facebook"></a></li>
            <li><a href="#" class="feed"></a></li>
          </ul>
        </div>
        <div class="search">
          <form action="#" method="post" id="search_form">
            <input type="text" value="Search news" id="s" />
            <input type="submit" id="searchform" value="search" />
            <input type="hidden" value="post" name="post_type" />
          </form>
        </div>
      </div>
    </div>
    <br>
    <div class="main_menu_area">
    <ul id="nav">
        @if(Auth::check())
            <li>
                <a href="#">Paparan Buletin </a>
                <ul>
                    <li><a href="{{ url('papar') }}">Paparan Berita</a></li>
                    <li><a href="{{ url('acara') }}">Paparan Acara</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('berita') }}">Hebahan Berita</a>
            </li>
            <li>
                <a href="{{ url('event') }}">Hebahan Acara</a>
            </li>
            <li><a href="{{ url('event') }}">Tetapan Buletin</a></li>
            <li><a href="{{ url('laporan') }}">Laporan Buletin</a></li>
            <unread></unread>
        @endif
    </ul>
        <ul class="nav navbar-right">
                        <!-- Authentication Links -->
        @if (Auth::guest())
            <li>
                <a href="{{ route('login') }}">Log Masuk</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Daftar Masuk</a>
            </li>
        @else
            <li class="dropdown">
                <a href="#"> {{ Auth::user()->username }}</a>

                <ul>
                    <li><a href="{{ url('profile') }}"><i class="fa fa-btn fa-user"></i>Profil</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> Log Keluar
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
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
        <div class="item active">
          <img src="images/23.jpg" alt="...">
          <div class="carousel-caption">
            <h2>Welcome to UKM</h2>
          </div>
        </div>
        <div class="item">
          <img src="images/1.jpg" alt="...">
          <div class="carousel-caption">
            <h2>Pemilihan MPP Sesi 2016-2017</h2>
          </div>
        </div>
        <div class="item">
          <img src="images/45.png" alt="...">
          <div class="carousel-caption">
            <h2>UKM 46 Tahun Menjejak Kegemilangan</h2>
          </div>
        </div>
      </div>

       <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" ></span>Next</span>
      </a>
    </div>

    <div class="content_area">
      <div class="main_menu">
        {{-- <div class="left_coloum floatleft"> --}}
          <div class="single_left_coloum_wrapper">

            <h2 class="title">Buletin UKM</h2>
            <a class="more" href="{{ url('papar') }}">Arkib buletin</a>

            <?php $i = 0 ?>
            @foreach($beritas as $berita)

            <div class="single_left_coloum floatleft">
              <div class="thumbnail">
                <p><img src="{{ asset($berita->gambar) }}" class="img"/></p>
                <h3>{{ $berita->tajuk }}</h3>
                <p>{{ $berita->created_at->format('F d, Y')}}</p>
                                  <p><strong> {{ $berita->lokasi }}</strong></p>
                <a class="readmore" href="{{ url('papar', $berita->id) }}">huraian berita</a> 
              </div>
            </div>
              @endforeach
          </div>

          <div class="single_left_coloum_wrapper">
            <h2 class="title">Program UKM</h2>
            <a class="more" href="{{ url('acara') }}">arkib program</a>

            <?php $i = 0 ?>
            @foreach($events as $event)

            <div class="single_left_coloum floatleft">
              <div class="thumbnail">
                <img src="{{ asset($event->gambar) }}" class="img" />
                <h3>{{ $event->tajuk }}</h3>
                <p>{{ $event->created_at->format('F d, Y') }}</p>
                                  <p><strong> {{ $event->lokasi }} </strong></p>
                <a class="readmore" href="{{ url('acara', $event->id) }}">huraian program</a> 
              </div>
            </div>
              @endforeach
          </div>

      </div>
      
    </div>

    <div class="footer_bottom_area">
      
      <div class="copyright_text">
        <p>Copyright &copy; 2017 Final Year Project | Design by <a target="_blank" rel="nofollow" href="#">Nur Syamimi Ahmat Azizudin</a></p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
<script type="text/javascript">
selectnav('nav', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
selectnav('f_menu', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});
</script>
</body>
</html>