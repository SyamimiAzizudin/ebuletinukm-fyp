@extends('layouts.app2')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Tetapan Buletin</h2>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-11 col-centered">
            		<h3>Filter By:</h3>

                    <div class="col-lg-10 col-centered">
                        <span>Pelajar/Staff: </span>
                        <select style="width: 500px" class="form-group" id="category">
                            <option value="0" disabled="true" selected="true">Pilih Kategori Pelajar</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                            {{-- @foreach($categories as $category)
                                <a class="list-group-item" href="{{ url('tetapan', $category->name) }}">{{ $category->name }}</a>
                            @endforeach --}}
                    </div>

                    <div class="col-lg-10 col-centered">
                        <span>Fakulti: </span>
                        {{-- <select style="width: 200px" class="category" id="categories_id">
                            <option value="0" disabled="true" selected="true">-Select-</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->pname}}</option>
                            @endforeach
                        </select> --}}
                    </div>

                    <div class="col-lg-10 col-centered">
                        <span>Minat: </span>
                        {{-- <select style="width: 200px" class="berita" id="beritas_id">
                            <option value="0" disabled="true" selected="true">-Select-</option>
                            @foreach($beritas as $berita)
                                <option value="{{$berita->id}}">{{$berita->kumpulan_sasaran}}</option>
                            @endforeach
                        </select> --}}
                    </div>

                <div class="col-lg-1 col-centered">
                    <div class="form-group">
                        {{-- <a href="{{ action('EventsController@index') }}" class="btn btn-default">Batal</a> --}}
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Personalize</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection 
