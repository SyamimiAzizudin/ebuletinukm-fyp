@extends('layouts.app2')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb">
            <li>You are here: <a href="{{ url('/') }}">Halaman Utama</a></li>
            <li class="active">Paparan Buletin</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('papar') }}">
            <input class="form-control mr-sm-2" type="text" placeholder="Carian Buletin" name="search"> 
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><span class="glyphicon glyphicon-search"></span> Cari</button>
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
