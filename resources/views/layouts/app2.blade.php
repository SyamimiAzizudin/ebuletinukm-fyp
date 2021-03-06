<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eBuletin UKM') }}</title>

    <!-- Include Required Prerequisites -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{('/daterangepicker.css') }}" />
    <link rel='stylesheet' href="{{ ('/fullcalendar/fullcalendar.css') }}">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<style>
.thumbnail img {
  display: block;
  width: 200px;
  height: 90px;
  max-height: 150px;
}

.col-centered{
    float: none;
    margin: 0 auto;
}

</style>
</head>
<body>
    <div id="app" >

        <nav class="navbar navbar-default navbar-static-top" style="background-color:#33cccc;">
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}"><font color="black">
                        {{ config('app.name', 'Laravel') }}</font>
                    </a>
                </div>

                <div class="collapse navbar-collapse " id="app-navbar-collapse">
                    {{-- Left Side Of Navbar -  -> --}}
                    <ul class="nav navbar-nav">
                        @if(Auth::check())

                            {{-- @if ($user->userRole == 'pengarang') --}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background-color:#33cccc;"><font color="black"><span class="glyphicon glyphicon-calendar"></span>
                                        Paparan Buletin <span class="caret"></span></font>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" style="background-color:#33cccc;">
                                        <li><a href="{{ url('papar') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Berita</a></li>
                                        <li><a href="{{ url('acara') }}"><span class="glyphicon glyphicon-bullhorn"></span> Paparan Acara</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('berita') }}"><font color="black"><span class="glyphicon glyphicon-edit"></span> Hebahan Berita</a></li></font>
                                <li><a href="{{ url('event') }}"><font color="black"><span class="glyphicon glyphicon-edit"></span> Hebahan Acara</a></li></font>
                                <li><a href="{{ url('tetapan') }}"><font color="black"><span class="glyphicon glyphicon-cog"></span> Tetapan Buletin</a></li></font>
                                <li><a href="{{ url('laporan') }}"><font color="black"><span class="glyphicon glyphicon-list-alt"></span> Laporan Buletin</a></li></font>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background-color:#33cccc;"><font color="black"><span class="glyphicon glyphicon-check"></span>
                                    {{ Auth::user()->username }} <span class="caret"></span></font>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background-color:#33cccc;">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ ('/moment.min.js') }}"></script>
    <script src="{{ ('/daterangepicker.js') }}"></script>
    <script src="{{('/fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{('/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/add-image.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>

    <script>
        function count_up(obj) {
            document.getElementById('huraian').innerHTML = obj.value.length;
        }
     
        function count_down(obj) {
             
            var element = document.getElementById('count2');
             
            element.innerHTML = 30 - obj.value.length;
             
            if (30 - obj.value.length < 0) {
                element.style.color = 'red';
             
            } else {
                element.style.color = 'grey';
            }
             
        }
    </script>

    <script type="text/javascript">
        $(function () {
            $('input[name="time"]').daterangepicker({
            minDate: moment("{{date('Y-m-d G')}}"),
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 15,
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY HH:mm:ss',
                separator:  ' - ',
            }
        });

        $('.select2').select2({
            placeholder: 'Sila Pilih'
        });
    });

    $(document).on("click", "#confirm-modal", function(e) {
        window.console&&console.log('foo');
        var url = $(this).attr("href");
        e.preventDefault();

        $('#destroy-form').attr('action', url);
        $('#destroy-modal').modal({ show: true });
    });
    </script>

    @yield('scripts')


</body>
</html>
