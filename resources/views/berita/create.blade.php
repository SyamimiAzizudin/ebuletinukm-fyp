@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Cipta Berita</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            {!! Form::open(array('route' => 'berita.store','method'=>'POST', 'files' => true)) !!}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombor Matrik:</strong>
                    <td>{{Auth::user()->no_matrik}}</td>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Nama:</strong>
                        <td>{{Auth::user()->username}}</td>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tajuk:</strong>
                        {!! Form::text('tajuk', null, array('placeholder' => 'Tajuk Berita','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Perincian Hebahan:</strong>
                        {!! Form::textarea('huraian', null, array('placeholder' => 'Huraian Berita','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi:</strong>
                        {!! Form::text('lokasi', null, array('placeholder' => 'Lokasi Berita','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kumpulan Sasaran:</strong>
                        {{ Form::select('kumpulan_sasaran',
                            ['Pelajar PraSiswazah' => 'Pelajar PraSiswazah', 'Pelajar PascaSiswazah' => 'Pelajar PascaSiswazah', 'Staff UKM' => 'Staff UKM', 'Warga UKM' => 'Warga UKM', 'Warga Kolej Zaba' => 'Warga Kolej Zaba', 'Warga FTSM' => 'Warga FTSM', 'Warga KTSN' => 'Warga KTSN'], null, ['class' => 'form-control']) }}
                           {{-- {{ Form::select('kumpulan_sasaran',
                               ['Pelajar UKM' => array('Pra Siswazah', 'Pasca Siswazah'),
                               'Staff UKM' => array('Pensyarah', 'Staff Sokongan'),
                               'Warga UKM' => array('Warga Kolej Zaba', 'Warga FTSM')], null, ['class' => 'form-control']) }} --}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gambar Berita:</strong><br>
                    <input type="file" name="gambar" id="fileUpload" class="hide">
                    <label for="fileUpload" style="width: 500px">
                        <img class="image-placeholder" src="{{ asset('img/image-placeholder.jpg') }}" width="100%"/>
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <div class="form-group">
                        <a href="{{ action('BeritasController@index') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
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

