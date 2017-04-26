@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Perincian Program </h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li
                  <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ $event->gambar }}" alt="Image" class="img-responsive">      
                    </div>

                    @foreach ($event->MultipleGambar as $image)
                        <div class="item">
                            <img src="{{ $image->image_path }}" class="img-responsive">
                        </div>
                     @endforeach      
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
            <div class=" col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">

                <h2>{{ $event->tajuk }}</h2>
                <br>
                <p> Tarikh: {{ $event->tarikh }}</p>
                <p> Masa: {{ $event->masa }}</p>
                <p> Tempat: {{ $event->lokasi }}</p>
                <p> Tempoh berlangsung: {{ $event->tempoh }}</p>
                <p> Maximum peserta: {{ $event->max_peserta }} orang</p>
                <p> Penganjur Bersama: {{ $event->penganjur }}</p>
                <p> Sebarang pertanyaan boleh hubungi kami di talian {{ $event->telephone }}.</p>

                <br>
                <p> {{ $event->huraian }}</p>
                    <br>
                    <div class=" col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 text-center">
                        <a href="{{ url('acara') }}" class="btn btn-primary">Kembali</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
