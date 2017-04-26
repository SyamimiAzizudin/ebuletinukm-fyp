@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Kemaskini Profil</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                {!! Form::model($pembaca, ['method' => 'PATCH','action' =>  ['PembacasController@update', $pembaca->id], 'files' => true]) !!}

                <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Nombor Matrik:</strong>
                            <td>{{Auth::user()->no_matrik}}</td>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                            <input type="text" class="form-control" name="username" placeholder="" value="{{ old('username', $pembaca->user->username) }}"></input>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                            <input type="text" class="form-control" name="email" placeholder="" value="{{ old('email', $pembaca->user->email) }}"></input>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Penuh:</strong>
                            {!! Form::text('nama', null, array('placeholder' => 'Nama Penuh','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombor Telefon:</strong>
                            {!! Form::text('telefon', null, array('placeholder' => 'Nombor Telefon','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fakulti:</strong>
                            {{ Form::select('fakulti',
                               ['FTSM' => 'Fakulti Teknologi dan Sains Maklumat', 'FSSK' => 'Fakulti Sains Sosial dan Kemanusiaan', 'FST' => 'Fakulti Sains dan Teknologi', 'FEP' => 'Fakulti Ekonomi dan Pengurusan', 'Farmasi' => 'Fakulti Farmasi', 'FPI' => 'Fakulti Pengajian Islam', 'FSK' => 'Fakulti Sains Kesihatan', 'FKAB' => 'Fakulti Kejuruteraan dan Alam Bina', 'FGG' => 'Fakulti Pergigian', 'FUU' => 'Fakulti Undang-Undang', 'FPEND' => 'Fakulti Pendidikan', 'FPU' => 'Fakulti Perubatan', 'GSB' => 'UKM-GSB Pusat Pengajian Siswazah Perniagaan'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>jabatan:</strong>
                            {!! Form::text('jabatan', null, array('placeholder' => 'jabatan','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persatuan:</strong>
                            {{ Form::select('persatuan',
                               ['PERSATUAN MAHASISWA UNIVERSITI KEBANGSAAN MALAYSIA' => 'PERSATUAN MAHASISWA UNIVERSITI KEBANGSAAN MALAYSIA', 'PERTUBUHAN AKADEMIK FAKULTI' => 'PERTUBUHAN AKADEMIK FAKULTI', 'PERTUBUHAN ANAK NEGERI/KEBAJIKAN' => 'PERTUBUHAN ANAK NEGERI/KEBAJIKAN', 'PERTUBUHAN KEBAJIKAN KOLEJ' => 'PERTUBUHAN KEBAJIKAN KOLEJ', 'PERTUBUHAN KHUSUS' => 'PERTUBUHAN KHUSUS', 'PERTUBUHAN LUAR' => 'PERTUBUHAN LUAR', 'PERTUBUHAN SISWAZAH' => 'PERTUBUHAN SISWAZAH', 'PUSAT KEMBANGAN PENDIDIKAN' => 'PUSAT KEMBANGAN PENDIDIKAN', 'URUSETIA HEPA' => 'URUSETIA HEPA'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profil:</strong><br>
                            <input type="file" name="gambar" id="fileUpload" class="hide">
                                <label for="fileUpload" style="width: 500px">
                                    <img class="image-placeholder" src="{{ $pembaca->gambar }}" width="50%"/>
                                </label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <div class="form-group">
                        <a href="{{ action('PembacasController@index') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-primary">Hantar</button>
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
