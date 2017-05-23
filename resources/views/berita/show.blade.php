@include('modal.destroy-modal')
@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li><a href="{{ url('berita') }}">Hebahan Buletin</a></li>
            <li class="active"> {{ $berita->tajuk }} </a></li>

        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h2>{{ $berita->tajuk }} <small>dihebahkan oleh {{ Auth::user()->username }}</small></h2>
        <hr>
    </div>
</div>


        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <br>
                <p><img src="{{ $berita->gambar }}" style="width:500px"></p>
            </div>
                <div class= "col-lg-8 col-lg-offset-2">
                    <h2><strong>{{ $berita->tajuk }}</strong></h2>
                    <p> Diterbitkan pada {{ $berita->created_at->format('d F Y') }}</p>
                    <strong> {{ $berita->lokasi }}</strong>
                    <br>
                    <br>
                    <p> {{ $berita->huraian }}</p>
                    <br>
                    <p>
                        
                        <a href="{{ action('BeritasController@destroy', $berita->id) }}" class="btn btn-danger" id="confirm-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Padam</a>

                        <a class="btn btn-primary" href="{{ url('berita/' . $berita->id . '/edit')}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                    </p>
                </div>
        </div>
   
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
