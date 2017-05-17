@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline" method="get" action="{{ url('papar') }}">
            <input class="form-control" type="text" placeholder="Carian Buletin" name="search">
            <button class="btn btn-outline-success pull-right" type="submit">Cari</button>
        </form>
        <h2>Buletin UKM</h2>
    </div>

    <div class="panel-body">
        <div class="row">
                <div class="col-md-3">
                    <h2 class="lead">Kategori:</h2>
                
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a class="list-group-item" href="{{ url('category/berita', $category->id) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                <br>

                </div>

        <div class="row">
            <div class="col-md-8">

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
                                <p> Diterbitkan pada {{ $berita->created_at->format('F d, Y')}}</p>
                                <p> <strong>{{ $berita->lokasi }}</strong></p>

                            </td>
                        </tr>
                        <?php $i++ ?>
                        @empty
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
