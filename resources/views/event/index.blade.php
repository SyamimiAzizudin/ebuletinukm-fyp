@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">

    <h2>Senarai Acara <a href="{{ url('/event/create') }}" class="btn btn-info pull-right" role="button">Cipta Acara Baru</a></h2>

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
                <th width="10%">Gambar</th>
                <th width="25%">Tajuk</th>
                <th width="10%">Masa</th>
                <th width="10%">Tarikh</th>
                <th width="15%">Gambar</th>
                <th width="15%"></th>
              </tr>
            </thead>
            <tbody pull-{right}>
              <?php $i = 0 ?>
              @forelse ($events as $event)
              <tr>
                <td >{{ $events->firstItem() + $i }}</td>
                <td><img src="{{ asset($event->gambar) }}" style="width:200px"></td>
                <td> {{ $event->tajuk }} </td>
                <td> {{ $event->masa }} </td>
                <td>{{ $event->tarikh }}</td>
                <td>{{ count($event->MultipleGambar) }} Gambar</td>
                <td>
                  @if( $event->user_id == Auth::user()->id)
                  <a href="{{ action('EventsController@edit', $event->id) }}" class="btn btn-primary btn-sm">Kemas</a>
                  <a href="{{ action('EventsController@destroy', $event->id) }}" class="btn btn-danger btn-sm" id="confirm-modal">Padam</a>
                  @endif
                </td>
              </tr>
              <?php $i++ ?>
              @empty
              <tr>
                <td colspan="6">Looks like there is no event available.</td>
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
  </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
