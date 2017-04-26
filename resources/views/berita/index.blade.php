@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Senarai Berita<a href="{{ url('/berita/create') }}" class="btn btn-info pull-right" role="button">Cipta Berita Baru</a></h2>
  </div>

  <div class="panel-body">
      {{-- <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('berita') }}">
          <input class="form-control mr-sm-2" type="text" placeholder="Carian Berita" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
      </form> --}}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th width="20%">Gambar</th>
                <th width="35%">Tajuk</th>
                <th width="15%">Lokasi</th>
                <th width="15%">Tarikh Hebahan</th>
                <th width="15%"></th>
              </tr>
            </thead>
            <tbody pull-{right}>
              <?php $i = 0 ?>
              @forelse($beritas as $berita)
              <tr>
                <td >{{ $beritas->firstItem() + $i }}</td>
                <td><img src="{{ asset($berita->gambar) }}" style="width:200px"></td>
                <td> {{ $berita->tajuk }} </td>
                <td> {{ $berita->lokasi }} </td>
                <td>{{ $berita->created_at }}</td>
                <td>
                  @if( $berita->user_id == Auth::user()->id)
                  <a href="{{ action('BeritasController@edit', $berita->id) }}" class="btn btn-primary btn-sm">Kemas</a>
                  <a href="{{ action('BeritasController@destroy', $berita->id) }}" class="btn btn-danger btn-sm" id="confirm-modal">Padam</a>
                  @endif
                </td>
              </tr>
              <?php $i++ ?>
              @empty
              <tr>
                <td colspan="6">Looks like there is no news available.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <div class="text-center">
              {{ $beritas->links() }}
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
