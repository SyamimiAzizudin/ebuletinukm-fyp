@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

<br>

</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


<div class="panel panel-info" style="margin-top:50px">
<div class="panel-heading">
  <h3 class="panel-title">{{ Auth::user()->username }}<p class="pull-right">{{ Auth::user()->created_at->format('g:i A F d, Y') }}</p></h3>

</div>
<div class="panel-body"> 
  <div class="row">
    @foreach ($pembacas as $pembaca)
    <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset($pembaca->gambar) }}" class="img-circle img-responsive"> </div>

    <div class=" col-md-9 col-lg-9 ">
      <table class="table table-user-information">
        <tbody>
          <tr>
            <td>Matrik No: </td>
            <td>{{ $pembaca->user->no_matrik }}</td>
          </tr>
          <tr>
            <td>Nama: </td>
            <td>{{ $pembaca->nama }}</td>
          </tr>
          <tr>
            <td>Email: </td>
            <td>{{ $pembaca->user->email }}</td>
          </tr>
          <tr>
            <td>Telefon: </td>
            <td>{{ $pembaca->telefon }}</td>
          </tr>
          <tr>
            <td>Fakulti: </td>
            <td>{{ $pembaca->fakulti }}</td>
          </tr>
          <tr>
            <td>Jabatan: </td>
            <td>{{ $pembaca->jabatan }}</td>
          </tr>
          <tr>
            <td>Persatuan: </td>
            <td>{{ $pembaca->persatuan }}</td>
          </tr>
          <tr>
            <td>Gambar Profil: </td>
            <td>{{ $pembaca->gambar }}</td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        @if( $pembaca->user_id == Auth::user()->id)
          <a href="{{ action ('PembacasController@edit',   $pembaca->user_id) }}" class="btn btn-success">Kemaskini Maklumat Diri</a>
        @endif  
      </div>
    </div>
    @endforeach
  </div>
</div>
      <div class="panel-footer">
            <a href="{{ url('home') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>  Keluar</a>
      </div>

      </tbody>
  </table>
</div>
</div>
</div>
@stop
