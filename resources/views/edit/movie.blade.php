@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-5 mt-5 container">
            <h2 class="text-center text-uppercase">Edit</h2>
        </div>

        <div class="card m-5">
            <div class="card-header">Edit Movie</div>
            <div class="card-body">
                <form action="{{route('updateMovie', $movie[0]->film_id)}}" method="post" >
                    {{ csrf_field() }}
                    <div class="input-group justify-content-center">
                        <input type="text" class="input-group-text col-sm-10" id="title" name="title" placeholder="Title" value="{{ $movie[0]->titel }}">
                    </div>
                    <br>
                    <div class="input-group justify-content-center">
                        <input type="number" class="input-group-text col-sm-3" id="year" name="year" placeholder="Year" value="{{ $movie[0]->jaar }}">
                        <div class="col-sm-1" ></div>

                        <select id="director" class="input-group-text col-sm-6" name="director">
                            @foreach( $directors as $director )
                                <option value="{{$director->regisseur_id}}">{{$director->fname}} {{$director->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary col-sm-10">EDIT</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


    </div>
@endsection
