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

            <div class="card col-lg-5 m-4">
                <div class="card-header text-center">Edit Actor</div>
                <div class="card-body">
                    <form action="{{route('updateActor', $actor[0]->acteur_id )}}" method="post" >
                        {{ csrf_field() }}
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="name" name="name" placeholder="Name" value="{{ $actor[0]->name }}">
                        </div>
                        <br>
                        <div class="input-group justify-content-center">
                            <input type="text" class="input-group-text col-sm-10" id="fname" name="fname" placeholder="First Name" value="{{ $actor[0]->fname }}">
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
