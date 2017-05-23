@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li><a href="{{ url('papar') }}">Paparan Buletin</a></li>
            <li class="active"> {{ $berita->tajuk }} </a></li>

        </ol>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#33cccc;">
        <h2>Perincian Buletin</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <p><img src="{{ $berita->gambar }}" style="width:500px"></p>
            </div>
                <div class=" col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                    <h2><strong>{{ $berita->tajuk }}</strong></h2>
                    <p> Diterbitkan pada {{ $berita->created_at->format('d F Y') }}</p>
                    <strong> {{ $berita->lokasi }}</strong>
                    <br>
                    <br>
                    <p> {{ $berita->huraian }}</p>
                    <br>

                        <div class="col-xs-offset-4 col-xs-12 col-sm-offset-4 col-sm-12col-md-offset-4 col-md-12">
                            <a href="{{ url('papar') }}" class="btn btn-primary">Kembali</a>
                        </div>
                </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
