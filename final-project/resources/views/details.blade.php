@extends('layout')

@section('title', "$anime->name Details")

@section('main')
    <h1>{{$anime->name}}</h1>
    <div class="row">
        <div class="col-sm-3">
            <img
                class="img-fluid"
                src={{$anime->images->common}}
                alt={{$anime->name}}
            >
        </div>
        <div class="col-sm-9">
            <div class="row">
                <h5>Summary</h5>
                {{$anime->summary}}
            </div>
            <div class="row">
                <h5>Characters</h5>
                @foreach ($characters as $character)
                    <div class="col-sm-3 mb-3 mb-sm-0" key={{$character->id}}>
                        <div class="card">
                            <img
                            src={{$character->images->grid}}
                            class="card-img-top img-fluid"
                            alt={{$character->name}}
                            >
                            <div class="card-body">
                                <p class="card-text text-center">{{$character->name}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection