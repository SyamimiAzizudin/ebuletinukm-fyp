@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('papar') }}">
            <input class="form-control mr-sm-2" type="text" placeholder="Carian Buletin" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
        <h2>Buletin UKM</h2>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="table-responsive" >
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="20%"></th>
                                <th width="80%"></th>
                            </tr>
                        </thead>
                        <tbody pull-{right}>
                        <?php $i = 0 ?>
                        @forelse($beritas as $berita)
                        <tr>
                            <td><br><img src="{{ asset($berita->gambar) }}" style="width:200px"></td>
                            <td>
                                <h5><a href="{{ url('papar', $berita->id) }}"><strong>{{ $berita->tajuk }} </strong></a></h5>
                                <p> Diterbitkan pada {{ $berita->created_at->format('d/m/Y')}}</p>
                                <p> {{ $berita->lokasi }}</p>

                            </td>
                        </tr>
                        <?php $i++ ?>
                        @empty
                        @endforelse

                       {{--  @foreach ($berita->categories as $category)

                            <P>{{ $category->name}}</P>

                        @endforeach --}}
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
