@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Kemaskini Program </h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::model($event, ['method' => 'PATCH','action' =>  ['EventsController@update', $event->id], 'files' => true]) !!}

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
                    <strong>Tajuk Program:</strong>
                        {!! Form::text('tajuk', null, array('placeholder' => 'Tajuk Program','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Perincian Program:</strong>
                        {!! Form::textarea('huraian', null, array('placeholder' => 'Huraian Program','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tarikh Diadakan:</strong>
                        {!! Form::date('tarikh', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Masa Berlangsung:</strong>
                        {!! Form::time('masa', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi:</strong>
                        {!! Form::text('lokasi', null, array('placeholder' => 'Lokasi Program','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempoh Berlangsung:</strong>
                        {!! Form::text('tempoh', null, array('placeholder' => 'Tempoh Program','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kumpulan Sasaran:</strong>
                        {{ Form::select('kumpulan_sasaran',
                           ['Pelajar UKM' => 'Pelajar UKM', 'Staff UKM' => 'Staff UKM', 'Warga UKM' => 'Warga UKM', 'Warga Kolej Zaba' => 'Warga Kolej Zaba', 'Warga FTSM' => 'Warga FTSM', 'Warga KTSN' => 'Warga KTSN'], null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Maximum Peserta:</strong>
                        {!! Form::text('max_peserta', null, array('placeholder' => 'Maximum Peserta','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penganjur:</strong>
                        {!! Form::text('penganjur', null, array('placeholder' => 'Penganjur Program','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefon:</strong>
                        {!! Form::text('telephone', null, array('placeholder' => 'Nombor Telefon','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gambar Berita:</strong><br>
                    <input type="file" name="gambar" id="fileUpload" class="hide">
                    <label for="fileUpload" style="width: 500px">
                        <img class="image-placeholder" src="{{ $event->gambar }}" width="100%"/>
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="control-group">
                        <strong>Multiple Images:</strong>
                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                            <p class="errors">{!!$errors->first('images')!!}</p>
                        @if(Session::has('error'))
                            <p class="errors">{!! Session::get('error') !!}</p>
                        @endif
                </div>
            </div>

            @if(count($event->MultipleGambar)>0)
                    <div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px">
                        @foreach ($event->MultipleGambar as $image)
                        <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="panel panel-default" >
                                    <div class="panel-body images box">
                                        <img src="{{ $image->image_path }}" width="100%"/>
                                    </div>
                                    <div class="panel-footer text-center" aligncenter>
                                        <a class="btn btn-danger" href="{{ route('event.destroyImage', $image->id) }}" id="confirm-modal">Delete</a>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
            @endif

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <div class="form-group">
                        <a href="{{ action('EventsController@index') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </div>

          {!! Form::close() !!}

        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.matchHeight.js') }}"></script>
    <script>$('.box').matchHeight();</script>
@endsection
