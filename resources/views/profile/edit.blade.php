@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Kemaskini Profil</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                {{-- {!! Form::model($user, ['class' => 'form-horizontal', 'method' => 'PATCH','action' =>  ['ProfilesController@update', $user->profile->id], 'files' => true]) !!} --}}

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
                            {{-- {{ Form::select('fakulti',
                               ['FTSM' => 'Fakulti Teknologi dan Sains Maklumat', 'FSSK' => 'Fakulti Sains Sosial dan Kemanusiaan', 'FST' => 'Fakulti Sains dan Teknologi', 'FEP' => 'Fakulti Ekonomi dan Pengurusan', 'Farmasi' => 'Fakulti Farmasi', 'FPI' => 'Fakulti Pengajian Islam', 'FSK' => 'Fakulti Sains Kesihatan', 'FKAB' => 'Fakulti Kejuruteraan dan Alam Bina', 'FGG' => 'Fakulti Pergigian', 'FUU' => 'Fakulti Undang-Undang', 'FPEND' => 'Fakulti Pendidikan', 'FPU' => 'Fakulti Perubatan', 'GSB' => 'UKM-GSB Pusat Pengajian Siswazah Perniagaan'], null, ['class' => 'form-control']) }} --}}
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
                            {{-- {{ Form::select('persatuan', --}}
                               {{-- ['PERSATUAN MAHASISWA UNIVERSITI KEBANGSAAN MALAYSIA' => 'PERSATUAN MAHASISWA UNIVERSITI KEBANGSAAN MALAYSIA', 'PERTUBUHAN AKADEMIK FAKULTI' => 'PERTUBUHAN AKADEMIK FAKULTI', 'PERTUBUHAN ANAK NEGERI/KEBAJIKAN' => 'PERTUBUHAN ANAK NEGERI/KEBAJIKAN', 'PERTUBUHAN KEBAJIKAN KOLEJ' => 'PERTUBUHAN KEBAJIKAN KOLEJ', 'PERTUBUHAN KHUSUS' => 'PERTUBUHAN KHUSUS', 'PERTUBUHAN LUAR' => 'PERTUBUHAN LUAR', 'PERTUBUHAN SISWAZAH' => 'PERTUBUHAN SISWAZAH', 'PUSAT KEMBANGAN PENDIDIKAN' => 'PUSAT KEMBANGAN PENDIDIKAN', 'URUSETIA HEPA' => 'URUSETIA HEPA'], null, ['class' => 'form-control']) }} --}}
                            <select name="persatuan" class="form-control">
                                  <option value="PM UKM" {{ old('persatuan', $user->profile->persatuan) == 'PM UKM' ? 'selected' : '' }}>PERSATUAN MAHASISWA UNIVERSITI KEBANGSAAN MALAYSIA</option>
                                  <option value="PAF" {{ old('persatuan', $user->profile->persatuan) == 'FSSK' ? 'selected' : '' }}>PERTUBUHAN AKADEMIK FAKULTI</option>
                                  <option value="FST" {{ old('persatuan', $user->profile->persatuan) == 'FST' ? 'selected' : '' }}>persatuan Sains dan Teknologi</option>
                                  <option value="FEP" {{ old('persatuan', $user->profile->persatuan) == 'FEP' ? 'selected' : '' }}>Fakulti Ekonomi dan Pengurusan</option>
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
                                    <img class="image-placeholder" src="{{ old('gambar', $user->profile->gambar) }}" width="50%"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ action('ProfilesController@index') }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                Hantar
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
