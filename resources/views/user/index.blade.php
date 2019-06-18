@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4 class="text-center text-uppercase">Add:</h4>
                    <div class="row justify-content-center" >
                        <a class="btn btn-dark text-white m-2" href="{{route('add')}}">Add Movie</a>
                        <a class="btn btn-dark text-white m-2" href="{{route('add')}}">Add Director</a>
                        <a class="btn btn-dark text-white m-2" href="{{route('add')}}">Add Actor</a>
                    </div>

                        <hr>
                        <br>


                    <h4 class="text-center text-uppercase">Lists:</h4>
                    <div class="row justify-content-center" >
                        <a class="btn btn-dark text-white m-2" href="{{route('movies')}}">Movies</a>
                        <a class="btn btn-dark text-white m-2" href="{{route('directors')}}">Directors</a>
                        <a class="btn btn-dark text-white m-2" href="{{route('actors')}}">Actors</a>

                        <span class="text-center m-3">To edit or delete an item, select the option in the card of the item.</span>

                    </div>

                        <hr>
                        <br>

                    <h4 class="text-center text-uppercase">Rating/Review:</h4>
                    <div class="row justify-content-center" >
                        <a class="btn btn-dark text-white m-2" href="{{route('rate')}}">Add rating or review</a>
                        <a class="btn btn-dark text-white m-2" href="{{route('rateList')}}">view ratings and reviews</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
