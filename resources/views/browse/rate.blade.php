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

        <div class="row justify-content-center ">

                <div class="card m-2 col-lg-10" style="width: 18rem;">
                    <div class="card-body">
                        <form id="usrform" action="{{route('setRate')}}" method="post">
                            @csrf
                            <select name="movie" class="input-group">
                                @foreach($movies as $mov )
                                    <option value="{{$mov->film_id}}">{{$mov->titel}}</option>
                                @endforeach
                            </select>
                            <br>
                            <select name="rating" class="input-group">
                                @for( $i = 0; $i<6; $i++ )
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <br>
                            <span>Review:</span>
                        </form>
                        <textarea name="review" form="usrform" class="input-group" style="min-height: 200px;"></textarea>
                        <br>
                        <button type="submit" form="usrform" class="btn btn-secondary btn-block">Submit</button>
                    </div>
                </div>
        </div>
    </div>
@endsection



