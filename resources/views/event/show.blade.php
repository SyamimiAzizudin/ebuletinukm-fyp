@include('modal.destroy-modal')
@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li><a href="{{ url('event') }}">Hebahan Acara</a></li>
            <li class="active"> {{ $event->tajuk }}</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h2>{{ $event->tajuk }} <small>dihebahkan oleh {{ Auth::user()->username }}</small></h2>
        <hr>
    </div>
</div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <br>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-genericl" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="3"></li
                      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ $event->gambar }}" >      
                        </div>

                        @foreach ($event->MultipleGambar as $image)
                            <div class="item">
                                <img src="{{ $image->image_path }}" >
                            </div>
                         @endforeach      
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class=" col-lg-8 col-lg-offset-2">

                <h2><strong>{{ $event->tajuk }}</strong></h2>
                <br>
                <p> Tempat: {{ $event->lokasi }}</p>
                <p> Mula: {{ date("g:ia\, jS M Y", strtotime($event->masaMula)) }}</p>
                <p> Tamat: {{ date("g:ia\, jS M Y", strtotime($event->masaAkhir)) }}</p
                <p> Tempoh berlangsung: {{ $event->duration }}</p>
                <p> Maximum peserta: {{ $event->max_peserta }} orang</p>
                <p> Penganjur Bersama: {{ $event->penganjur }}</p>
                <p> Sebarang pertanyaan boleh hubungi kami di talian {{ $event->telephone }}.</p>

                <br>
                <p> {{ $event->huraian }}</p>
                <p>
                        
                        <a href="{{ action('EventsController@destroy', $event->id) }}" class="btn btn-danger" id="confirm-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Padam</a>

                        <a class="btn btn-primary" href="{{ url('event/' . $event->id . '/edit')}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                    </p>
            </div>
        </div>
   
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
