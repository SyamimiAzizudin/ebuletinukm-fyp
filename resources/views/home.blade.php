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
  width: 200px;
  height: 90px;
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
            <li >
                <a href="#">Laporan Buletin</a>
                <ul>
                  <li><a href="{{ url('berita_details') }}"> Berita</a></li>
                  <li><a href="{{ url('event_details') }}"> Acara</a></li>
                </ul>
            </li>
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
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span>
      </a>
    </div>

    <div class="content_area">
      <div class="main_content floatleft">
        {{-- <div class="left_coloum floatleft"> --}}
          <div class="single_left_coloum_wrapper">

            <h2 class="title">Buletin UKM</h2>
            <a class="more" href="{{ url('papar') }}">more</a>

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
            <a class="more" href="{{ url('acara') }}">more</a>

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

          <div class="single_left_coloum_wrapper gallery">
            <h2 class="title">berita dan program terkini!</h2>
            <a class="more" href="#">more</a> <img src="images/single_featured.png" alt="" /> <img src="images/single_featured.png" alt="" /> <img src="images/single_featured.png" alt="" /> <img src="images/single_featured.png" alt="" /> <img src="images/single_featured.png" alt="" /> <img src="images/single_featured.png" alt="" /> </div>
          <div class="single_left_coloum_wrapper single_cat_left">
            <h2 class="title">tech news</h2>
            <a class="more" href="#">more</a>
            <div class="single_cat_left_content floatleft">
              <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit </h3>
              <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ...interdum</p>
              <p class="single_cat_left_content_meta">by <span>John Doe</span> |  29 comments</p>
            </div>
            
          </div>
      </div>
      <div class="sidebar floatright">
        
        <div class="single_sidebar">
          <div class="popular">
            {{-- <h2 class="title">Kategori</h2> --}}
            <ul>
              <div class="panel-group kategori-products" id="accordian"><!--category-productsr-->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#jenis">
                          <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Kategori
                      </a>
                    </h4>
                  </div>

                  <div id="jenis" class="panel-collapse collapse">
                      <div class="panel-body">
                          <ul>
                            {{-- <li class="dropdown">
                              <a href="{{ url('/katalog?jenis=Leptop') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Berita
                              </a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{ url('papar') }}">Sukan</a></li>
                                </ul>
                            </li> --}}

                                <li><a href="{{ url('/katalog?jenis=Telefon') }}">Berita</a></li>
                                <li><a href="{{ url('/katalog?jenis=Telefon') }}">Program</a></li>
                                <li><a href="{{ url('?/katalog?jenis=lain-lain') }}">Semua Berita & Program</a></li>       
                                          
                          </ul>
                      </div>
                  </div>
                </div>
              </div><!--/category-products-->
          </ul>
        </div>
        </div>
        <br>

        <div class="single_sidebar">
          <div class="lokasi">
            {{-- <h2 class="title">Kategori</h2> --}}
            <ul>
              <div class="panel-group lokasi-products" id="accordian1"><!--category-productsr-->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#Kategori">
                          <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Lokasi
                      </a>
                    </h4>
                  </div>

                  <div id="lokasi" class="panel-collapse collapse">
                      <div class="panel-body">
                          <ul>
                                <li><a href="{{ url('/katalog?lokasi=Telefon') }}">Berita</a></li>
                                <li><a href="{{ url('/katalog?lokasi=Telefon') }}">Program</a></li>
                                <li><a href="{{ url('?/katalog?lokasi=lain-lain') }}">Semua Berita & Program</a></li>       
                          </ul>
                      </div>
                  </div>
                </div>
              </div><!--/category-products-->
          </ul>
        </div>
        </div>

        <br>

        {{-- <div class="single_sidebar">
          <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active">
              Cras justo odio
            </button>
            <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
            <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
            <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
            <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
          </div>
        </div> --}}

        <div class="single_sidebar">
          <div class="news-letter">
            <h2>Sign Up for New Member</h2>
            <p>Sign up to receive our latest news!</p>
            <form action="#" method="post">
              <input type="text" value="Name" id="name" />
              <input type="text" value="Email Address" id="email" />
              <input type="submit" value="SUBMIT" id="form-submit" />
            </form>
            <p class="news-letter-privacy">We do not spam. We value your privacy!</p>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="footer_top_area">
      <div class="inner_footer_top"> <img src="images/add3.png" alt="" /> </div>
    </div> --}}
    <div class="footer_bottom_area">
      <div class="footer_menu">
        <ul id="f_menu">
          <CENTER>
          <li><a href="#">world news</a></li>
          <li><a href="#">sports</a></li>
          <li><a href="#">tech</a></li>
          <li><a href="#">business</a></li>
          <li><a href="#">Movies</a></li>
          </CENTER>
        </ul>
      </div>
      <div class="copyright_text">
        <p>Copyright &copy; 2017 Final Year Project | Design by <a target="_blank" rel="nofollow" href="http://www.graphicsfuel.com/2045/10/wp-magazine-theme-template-psd/">Nur Syamimi Ahmat Azizudin</a></p>
        <p>Trade marks and images used in the design are the copyright of their respective owners and are used for demo purposes only.</p>
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