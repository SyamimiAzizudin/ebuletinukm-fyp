@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li class="active">Hebahan Acara</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
        <h2>Senarai Acara <a href="{{ url('/event/create') }}" class="btn btn-primary pull-right" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cipta Acara Baru</a></h2>
  </div>

  <div class="panel-body">
      {{-- <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('event') }}">
          <input class="form-control mr-sm-2" type="text" placeholder="Carian Acara" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
      </form> --}}
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th width="15%">Poster</th>
                <th width="18%">Tajuk</th>
                <th width="15%">Dikemaskini Pada</th>
                <th width="15%">Tambahan Poster</th>
                <th width="15%">Published</th>
                <th width="25%"></th>
              </tr>
            </thead>
            <tbody pull-{right}>
              <?php $i = 0 ?>
              @forelse ($events as $event)
              <tr>
                <td >{{ $events->firstItem() + $i }}</td>
                <td><img src="{{ asset($event->gambar) }}" style="width:200px"></td>
                <td><a href="{{ url('show.event', $event->id) }}"> {{ $event->tajuk }} </a></td>
                <td>{{ $event->updated_at->diffForHumans() }}</td>
                <td>{{ count($event->MultipleGambar) }} Gambar</td>
                <td> {{ $event->is_published == 1 ? 'Ya' : 'Tidak' }}</td>
                <td>
                  @if( $event->user_id == Auth::user()->id)
                  <a class="btn btn-warning btn-xs" href="{{ action('EventsController@published', $event) }}"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> {{ $event->is_published == 1 ? 'Tidak Papar' : 'Papar' }}</a>
                  <a href="{{ action('EventsController@edit', $event->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kemas</a>
                  <a href="{{ action('EventsController@destroy', $event->id) }}" class="btn btn-danger btn-xs" id="confirm-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Padam</a>
                  @endif
                </td>
              </tr>
              <?php $i++ ?>
              @empty
              <tr>
                <td colspan="6">Tiada program dihebahkan.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <div class="text-center">
              {{ $events->links() }}
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
