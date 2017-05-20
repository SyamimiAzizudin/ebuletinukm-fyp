@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li class="active">Hebahan Berita</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Senarai Berita<a href="{{ url('/berita/create') }}" class="btn btn-primary pull-right btn_md" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cipta Berita Baru</a></h2>
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
                <th width="15%">Gambar</th>
                <th width="18%">Tajuk</th>
                <th width="15%">Lokasi</th>
                <th width="18%">Dicipta Pada</th>
                <th width="15%">Published</th>
                <th width="25%"></th>
              </tr>
            </thead>
            <tbody pull-{right}>
              <?php $i = 0 ?>
              @forelse($beritas as $berita)
              <tr>
                <td >{{ $beritas->firstItem() + $i }}</td>
                <td><img src="{{ asset($berita->gambar) }}" style="width:150px"></td>
                <td><a href="{{ url('show.berita', $berita->id) }}"> {{ $berita->tajuk }} </a></td>
                <td> {{ $berita->lokasi }} </td>
                <td> {{ $berita->created_at->diffForHumans()}}</td>
                <td> {{ $berita->is_published == 1 ? 'Ya' : 'Tidak' }}</td>
                <td>
                  @if( $berita->user_id == Auth::user()->id)
                  <a class="btn btn-warning btn-xs" href="{{ action('BeritasController@published', $berita) }}"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> {{ $berita->is_published == 1 ? 'Tidak Papar' : 'Papar' }}</a>
                  <a href="{{ action('BeritasController@edit', $berita->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kemas</a>
                  <a href="{{ action('BeritasController@destroy', $berita->id) }}" class="btn btn-danger btn-xs" id="confirm-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Padam</a>
                  @endif
                </td>
              </tr>
              <?php $i++ ?>
              @empty
              <tr>
                <td colspan="6">Tiada berita dihebahkan.</td>
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

    <div class="container">

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 2017 eBuletin UKM - Nur Syamimi Ahmat Azizudin (FYP)</p>
                    </div>
                </div>
            </footer>

        </div>
  </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
