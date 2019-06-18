@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-5 mt-5 container">
            <h2 class="text-center text-uppercase">Movies</h2>
        </div>

        <div class="row justify-content-center">

            @foreach( $movies as $movie )
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('img/covers/'.$movie->filmcover.'.jpg')}}" alt="Card image cap">
                    <div class="card-body">

                        <h5 class="card-title">{{ $movie->titel }}</h5>
                        <h5 class="card-text">{{$movie->jaar}}</h5>

                        <a href="#" class="btn btn-primary btn-block mt-4">More</a>
                        @auth
                            <hr>
                            <a href="{{route('editMovie', $movie->film_id)}}" class="btn btn-warning btn-block">Edit</a>
                            <a href="{{route("delMovie", $movie->film_id)}}" onclick="confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-block">Delete</a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
