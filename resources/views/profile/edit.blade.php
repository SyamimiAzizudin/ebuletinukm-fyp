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

                    <div class="form-group">
                        <label for="no_matrik" class="col-md-4 control-label">Nombor Matrik</label>
                        <div class="col-md-6">
                            <td>{{Auth::user()->no_matrik}}</td>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_matrik" class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="" value="{{ old('username', $user->username) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_matrik" class="col-md-4 control-label">Email</label>
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
                            <input id="fakulti" type="text" class="form-control" name="fakulti" value="{{ old('fakulti', $user->profile->fakulti) }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="persatuan" class="col-md-4 control-label">Persatuan</label>
                        <div class="col-md-6">
                            <input id="persatuan" type="text" class="form-control" name="persatuan" value="{{ old('persatuan', $user->profile->persatuan) }}" required>
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

                    {{-- <div class="form-group">
                        <label for="gambar" class="col-md-4 control-label">Gambar Profil</label>
                        <div class="col-md-6">
                            <input id="gambar" type="file" name="gambar" value="{{ old('gambar') }}">
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="gambar" class="col-md-4 control-label">Gambar Profil</label>
                            <div class="col-md-6">
                            <input type="file" name="gambar" id="fileUpload" class="hide">
                                <label for="fileUpload" style="width: 500px">
                                    <img class="image-placeholder" src="{{ $user->profile->gambar }}" width="50%"/>
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

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
