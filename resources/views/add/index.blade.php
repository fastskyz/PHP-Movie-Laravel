@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-5 mt-5 container">
            <h2 class="text-center text-uppercase">Add</h2>
        </div>

        <div class="card m-5">
            <div class="card-header">Add Movie</div>
            <div class="card-body">
                <form action="{{route('addMovie')}}" method="post" >
                    {{ csrf_field() }}
                    <div class="input-group justify-content-center">
                        <input type="text" class="input-group-text col-sm-10" id="title" name="title" placeholder="Title">
                    </div>
                    <br>
                    <div class="input-group justify-content-center">
                        <input type="number" class="input-group-text col-sm-3" id="year" name="year" placeholder="Year">
                        <div class="col-sm-1" ></div>
                        <select id="director" class="input-group-text col-sm-6" name="director">
                            @foreach( $directors as $director )
                                <option value="{{$director->regisseur_id}}">{{$director->fname}} {{$director->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary col-sm-10">ADD</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row justify-content-center">

            <div class="card col-lg-5 m-4">
                <div class="card-header text-center">Add Actor</div>
                <div class="card-body">
                    <form action="{{route('addActor')}}" method="post" >
                        {{ csrf_field() }}
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="name" name="name" placeholder="Name">
                        </div>
                        <br>
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="fname" name="fname" placeholder="First Name">
                        </div>
                        <div class="input-group justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary col-sm-10">ADD</button>
                        </div>
                    </form>
                </div>
            </div>



            <div class="card col-lg-5 m-4">
                <div class="card-header text-center">Add Director</div>
                <div class="card-body">
                    <form action="{{route('addDirector')}}" method="post" >
                        {{ csrf_field() }}
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="name" name="name" placeholder="Name">
                        </div>
                        <br>
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="fname" name="fname" placeholder="First Name">
                        </div>
                        <div class="input-group justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary col-sm-10">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    </div>
@endsection
