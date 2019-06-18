@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="text-center text-uppercase">Lists:</h4>
                        <div class="row justify-content-center" >
                            <a class="btn btn-dark text-white m-2" href="{{route('movies')}}">Movies</a>
                            <a class="btn btn-dark text-white m-2" href="{{route('directors')}}">Directors</a>
                            <a class="btn btn-dark text-white m-2" href="{{route('actors')}}">Actors</a>
                        </div>

                        <hr>
                        <br>

                        <h4 class="text-center text-uppercase">Order by:</h4>
                        <div class="row justify-content-center" >
                            <a class="btn btn-dark text-white m-2" href="{{route('movies')}}">Rating</a>
                            <a class="btn btn-dark text-white m-2" href="{{route('movies')}}">Reviews</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
