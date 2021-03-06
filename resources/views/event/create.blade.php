@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li><a href="{{ url('event') }}">Hebahan Acara</a></li>
            <li class="active">Cipta Acara</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#33cccc;">
        <h1>Cipta Acara</h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            {!! Form::open(array('route' => 'event.store','method'=>'POST', 'files' => true)) !!}

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
                    <strong><h2>Butiran Acara</h2></strong>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Tajuk Program:</strong>
                            {!! Form::text('tajuk', null, array('placeholder' => 'Tajuk Program','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Perincian Program:</strong>
                            {!! Form::textarea('huraian', null, array('placeholder' => 'Huraian Program','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kategori Program:</strong>
                            <select class="form-control select2" name="kategori_program[]" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                    @if($errors->has('time')) has-error @endif
                        <label  for="time">Tarikh dan Masa</label>
                        <div class="input-group">

                            <input type="text" class="form-control" name="time" placeholder="Pilih masa program" value="{{ old('time') }}">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                        @if ($errors->has('time'))
                            <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('time') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Lokasi:</strong>
                            {!! Form::text('lokasi', null, array('placeholder' => 'Lokasi Program','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kumpulan Sasaran:</strong>
                            {{ Form::select('kumpulan_sasaran',
                                ['Pelajar Pra Siswazah' => 'Pelajar Pra Siswazah', 'Pelajar Pasca Siswazah' => 'Pelajar Pasca Siswazah', 'Staff UKM' => 'Staff UKM', 'Warga UKM' => 'Warga UKM', 'Warga Kolej Zaba' => 'Warga Kolej Zaba', 'Warga FTSM' => 'Warga FTSM', 'Warga KTSN' => 'Warga KTSN'], null, ['class' => 'form-control']) }}

                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Maximum Peserta:</strong>
                            {!! Form::number('max_peserta', null, array('placeholder' => '0','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Penganjur:</strong>
                            {!! Form::text('penganjur', null, array('placeholder' => 'Penganjur Program','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Telefon:</strong>
                            {!! Form::text('telephone', null, array('placeholder' => 'Nombor Telefon','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Poster Program:</strong><br>
                        <input type="file" name="gambar" id="fileUpload" class="hide">
                        <label for="fileUpload" style="width: 500px">
                            <img class="image-placeholder" src="{{ asset('img/image-placeholder.jpg') }}" width="100%"/>
                        </label>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="control-group">
                            <strong>Tambahan Poster Program:</strong>
                            {!! Form::file('images[]', array('multiple'=>true)) !!}
                                <p class="errors">{!!$errors->first('images')!!}</p>
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <div class="form-group">
                    <a href="{{ action('EventsController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Batal</a>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cipta</button>
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
