@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li><a href="{{ url('profile') }}">Paparan Profil</a></li>
            <li class="active">Kemaskini Profil {{ Auth::user()->username }} </li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#33cccc;">
        <h2>Kemaskini Profil</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="no_matrik" class="col-md-4 control-label">Nombor Matrik</label>
                            <div class="col-md-6">
                                <td>{{Auth::user()->no_matrik}}</td>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" placeholder="" value="{{ old('username', $user->username) }}">
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="" value="{{ old('email', $user->email) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-md-4 control-label">Nama Penuh</label>
                        <div class="col-md-6">
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $user->profile->nama) }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_telefon" class="col-md-4 control-label">No Telefon</label>
                        <div class="col-md-6">
                            <input id="no_telefon" type="text" class="form-control" name="no_telefon" value="{{ old('no_telefon', $user->profile->telefon) }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fakulti" class="col-md-4 control-label">Fakulti</label>
                        <div class="col-md-6">
                               <select name="fakulti" class="form-control">
                                  <option value="FTSM" {{ old('fakulti', $user->profile->fakulti) == 'FTSM' ? 'selected' : '' }}>Fakulti Teknologi dan Sains Maklumat</option>
                                  <option value="FSSK" {{ old('fakulti', $user->profile->fakulti) == 'FSSK' ? 'selected' : '' }}>Fakulti Sains Sosial dan Kemanusiaan</option>
                                  <option value="FST" {{ old('fakulti', $user->profile->fakulti) == 'FST' ? 'selected' : '' }}>Fakulti Sains dan Teknologi</option>
                                  <option value="FEP" {{ old('fakulti', $user->profile->fakulti) == 'FEP' ? 'selected' : '' }}>Fakulti Ekonomi dan Pengurusan</option>
                                  <option value="Farmasi" {{ old('fakulti', $user->profile->fakulti) == 'Farmasi' ? 'selected' : '' }}>Fakulti Farmasi</option>
                                  <option value="FPI" {{ old('fakulti', $user->profile->fakulti) == 'FPI' ? 'selected' : '' }}>Fakulti Pengajian Islam</option>
                                  <option value="FSK" {{ old('fakulti', $user->profile->fakulti) == 'FSK' ? 'selected' : '' }}>Fakulti Sains Kesihatan</option>
                                  <option value="FKAB" {{ old('fakulti', $user->profile->fakulti) == 'FKAB' ? 'selected' : '' }}>Fakulti Kejuruteraan dan Alam Bina</option>
                                  <option value="FGG" {{ old('fakulti', $user->profile->fakulti) == 'FGG' ? 'selected' : '' }}>Fakulti Pergigian</option>
                                  <option value="FUU" {{ old('fakulti', $user->profile->fakulti) == 'FUU' ? 'selected' : '' }}>Fakulti Undang-Undang</option>
                                  <option value="GSB" {{ old('fakulti', $user->profile->fakulti) == 'GSB' ? 'selected' : '' }}>UKM-GSB Pusat Pengajian Siswazah Perniagaan</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="persatuan" class="col-md-4 control-label">Persatuan</label>
                        <div class="col-md-6">
                            <select name="persatuan" class="form-control">
                                  <option value="PM UKM" {{ old('persatuan', $user->profile->persatuan) == 'PM UKM' ? 'selected' : '' }}>Persatuan Mahasiswa Universiti Kebangsaan Malaysia</option>
                                  <option value="Pertubuhan Akademik Fakulti" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Akademik Fakulti' ? 'selected' : '' }}>Pertubuhan Akademik Fakulti</option>
                                  <option value="Persatuan FST" {{ old('persatuan', $user->profile->persatuan) == 'Persatuan FST' ? 'selected' : '' }}>Persatuan Sains dan Teknologi</option>
                                  <option value="Pertubuhan Kebajikan Kolej" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Kebajikan Kolej' ? 'selected' : '' }}>Pertubuhan Kebajikan Kolej</option>
                                  <option value="Pertubuhan Anak Negeri" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Anak Negeri' ? 'selected' : '' }}>Pertubuhan Anak Negeri</option>
                                  <option value="Pertubuhan Khusus" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Khusus' ? 'selected' : '' }}>Pertubuhan Khusus</option>
                                  <option value="Pertubuhan Luar" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Luar' ? 'selected' : '' }}>Pertubuhan Luar</option>
                                  <option value="Pertubuhan Siswazah" {{ old('persatuan', $user->profile->persatuan) == 'Pertubuhan Siswazah' ? 'selected' : '' }}>Pertubuhan Siswazah</option>
                                  <option value="Pusat Perkembangan Pendidikan" {{ old('persatuan', $user->profile->persatuan) == 'Pusat Perkembangan Pendidikan' ? 'selected' : '' }}>Pusat Perkembangan Pendidikan</option>
                                  <option value="Urusetia HEPA" {{ old('persatuan', $user->profile->persatuan) == 'Urusetia HEPA' ? 'selected' : '' }}>Urusetia HEPA</option>

                            </select>
                        </div>
                    </div>

                    @if ($user->userRole == 'pengarang')
                        <div class="form-group">
                            <label for="jawatan" class="col-md-4 control-label">Jawatan</label>
                            <div class="col-md-6">
                                <input id="jawatan" type="text" class="form-control" name="jawatan" value="{{ old('jawatan', $user->profile->jawatan) }}" required>
                            </div>
                        </div>
                    
                    @else
                        <div class="form-group">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $user->profile->jabatan) }}" required>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="gambar" class="col-md-4 control-label">Gambar Profil</label>
                            <div class="col-md-6">
                            <input type="file" name="gambar" id="fileUpload" class="hide">
                                <label for="fileUpload" style="width: 500px">
                                    <img class="image-placeholder" src="{{ asset($user->profile->gambar) }}" width="50%"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ action('ProfilesController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Batal</a>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>
                                Kemaskini 
                            </button>
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
