@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb">
            <li>You are here: <a href="{{ url('/') }}">Laman Utama</a></li>
            <li><a href="{{ url('/berita') }}">Hebahan Berita</a></li>
            <li class="active">Kemaskini Berita</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Kemaskini Berita</h1>
  </div>

  <div class="panel-body">
    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::model($berita, ['method' => 'PATCH','action' =>  ['BeritasController@update', $berita->id], 'files' => true]) !!}

            <div class="col-lg-11 col-centered">
                <div class="panel-heading">
                    <strong><h2>Butiran Pengarang</h2></strong>
                </div>


                <div class="col-lg-10 col-centered">
                     <div class="form-group">
                        <strong>Nombor Matrik:</strong>
                            <td>{{Auth::user()->no_matrik}}</td>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                     <div class="form-group">
                        <strong>Nama:</strong>
                            <td>{{Auth::user()->username}}</td>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                     <div class="form-group">
                        <strong>Email:</strong>
                            <td>{{Auth::user()->email}}</td>
                    </div>
                </div>
            </div>

            <div class="col-lg-11 col-centered">
                <div class="panel-heading">
                    <strong><h2>Butiran Berita</h2></strong>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Tajuk:</strong>
                            {!! Form::text('tajuk', null, array('placeholder' => 'Tajuk Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Perincian Hebahan:</strong>
                            {!! Form::textarea('huraian', null, array('placeholder' => 'Huraian Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kategori Hebahan:</strong>
                            <select class="form-control" name="kategori_program">
                                <option disabled selected="">Sila Pilih</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{  $category->id == $berita->categories()->first()->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Lokasi:</strong>
                            {!! Form::text('lokasi', null, array('placeholder' => 'Lokasi Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kumpulan Sasaran:</strong>
                               {{ Form::select('kumpulan_sasaran',
                            ['Pelajar PraSiswazah' => 'Pelajar PraSiswazah', 'Pelajar PascaSiswazah' => 'Pelajar PascaSiswazah', 'Staff UKM' => 'Staff UKM', 'Warga UKM' => 'Warga UKM', 'Warga Kolej Zaba' => 'Warga Kolej Zaba', 'Warga FTSM' => 'Warga FTSM', 'Warga KTSN' => 'Warga KTSN'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Gambar Berita:</strong><br>
                        <input type="file" name="gambar" id="fileUpload" class="hide">
                        <label for="fileUpload" style="width: 500px">
                            <img class="image-placeholder" src="{{ $berita->gambar }}" width="100%"/>
                        </label>
                    </div>
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <div class="form-group">
                        <a href="{{ action('BeritasController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Batal</a>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Kemaskini</button>
                    </div>
                </div>

          {!! Form::close() !!}

        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
@endsection


