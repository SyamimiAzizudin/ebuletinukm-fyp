@extends('layouts.app')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">

        <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('acara') }}">
            <input class="form-control mr-sm-2" type="text" placeholder="Carian Buletin" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
        <h2>Buletin UKM</h2>
    </div>

    <div class="container">

    <div class="row">
                <div class="col-md-3">
                    <h2 class="lead">Kategori:</h2>
                                    
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a class="list-group-item" href="{{ url('category/event', $category->id) }}">{{ $category->name }}</a>
                        @endforeach()
                    </div>
                    
                <br>
                {{-- p class="lead">Lokasi</p>
                <div class="list-group">
                    <a href="home.php?cat=sort&item=az" class="list-group-item">UKM Bangi</a>
                    <a href="home.php?cat=sort&item=low" class="list-group-item">UKM KL</a>
                </div> --}}

            </div>

    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            
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
                    @forelse($events as $event)
                    <tr>
                        <td><br><img src="{{ asset($event->gambar) }}" style="width:200px"></td>
                        <td>
                            <h5><a href="{{ url('acara', $event->id) }}"><strong>{{ $event->tajuk }} </strong></a></h5>
                            <p> {{ $event->tarikh->format('F d, Y') }} , {{ $event->masa }}</p>
                            <p><strong>{{ $event->lokasi }}</strong></p>

                        </td>
                    </tr>

                    <?php $i++ ?>
                    @empty
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
