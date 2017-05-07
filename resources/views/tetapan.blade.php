@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Tetapan Buletin</h2>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            		<h3>Filter By:</h3>

                    <span>News/Event: </span>
                    <select style="width: 200px" class="berita" id="beritas_id">
                        <option value="0" disabled="true" selected="true">-Select-</option>
                        @foreach($beritas as $berita)
                            <option value="{{$berita->id}}">{{$berita->name}}</option>
                        @endforeach
                    </select>

                    <span>Category: </span>
                    <select style="width: 200px" class="category" id="categories_id">
                        <option value="0" disabled="true" selected="true">-Select-</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->pname}}</option>
                        @endforeach
                    </select>

                    <span>Sasaran: </span>
                    <select style="width: 200px" class="berita" id="beritas_id">
                        <option value="0" disabled="true" selected="true">-Select-</option>
                        @foreach($beritas as $berita)
                            <option value="{{$berita->id}}">{{$berita->kumpulan_sasaran}}</option>
                        @endforeach
                    </select>

            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection 
