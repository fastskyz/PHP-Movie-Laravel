@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-5 mt-5 container">
            <h2 class="text-center text-uppercase">Actors</h2>
        </div>

        <div class="row justify-content-center">

            @foreach( $actors as $actor )
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset(str_replace(" ", "" ,'img/profile/'.$actor->fname.''.$actor->name.'.jpg'))}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$actor->name.' '.$actor->fname}}</h5>
                        @auth
                            <hr>
                            <a href="#" class="btn btn-warning btn-block">Edit</a>
                            <a href="#" class="btn btn-danger btn-block">Delete</a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
