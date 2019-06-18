@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3>Ratings</h3>
                            <br>
                            <div class="row justify-content-center">
                                @foreach( $ratings as $rat )
                                    <div class="card m-2 col-md-5" style="width: 18rem;">
                                        <div class="card-body">
                                            @foreach( $movies as $mov )
                                                @if( $mov->film_id == $rat->film_id )
                                                    <h4 class="card-title text-center">{{$mov->titel}}</h4>
                                                    <hr>
                                                @endif
                                            @endforeach
                                            <h5 class="card-title text-center">Rating: {{$rat->score}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        <h3 class="mt-5">Reviews</h3>
                        <br>
                        <div class="row justify-content-center">
                            @foreach( $reviews as $rev )
                                <div class="card m-2 col-md-5" style="width: 18rem;">
                                    <div class="card-body">
                                        @foreach( $movies as $mov )
                                            @if( $mov->film_id == $rev->film_id )
                                                <h4 class="card-title text-center">{{$mov->titel}}</h4>
                                                <hr>
                                            @endif
                                        @endforeach
                                        <h5 class="card-title text-center">Rating: {{$rev->rating}}</h5>
                                        <p class="card m-1 p-4" style="min-height: 50px;">{{$rev->review}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
