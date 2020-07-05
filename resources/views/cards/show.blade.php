@extends('layouts.app')
@section('title','Card ' . $card->name)
@section('content')
<div class="container">
    <h1 class="text-capitalize">{{$card->name}}</h1>
    <form action="/cards/{{ $card->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete card</button>
    </form>

    <a href="/cards">Return</a>
    <a href="/cards/{{$card->id}}/edit">Edit card</a>

    <div class="accordion" id="accordionExample">
        @foreach($collections as $collection)
            <div class="card">
            <div class="card-header row" id="{{$collection->name}}">
                <div class="col-sm">
                    <button class="btn btn-link text-capitalize" type="button" data-toggle="collapse" data-target="#collapse{{$collection->id}}" aria-expanded="true" aria-controls="collapseOne">
                        {{$collection->name}}
                    </button>
                </div>
                <div class="col-sm text-right">
                    <button class="btn btn-link" href="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/edit">Edit</button>
                    <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}" method="POST">
                        @method('DELETE')@csrf
                        <button class="btn btn-danger" type="submit">x</button>
                    </form>
                </div>
            </div>
            <div id="collapse{{$collection->id}}" class="collapse show" aria-labelledby="{{$collection->name}}" data-parent="#accordionExample">
                <div class="card-body">
                    @foreach($collection->tasks as $task)
                    <div class="row">
                        <div class="col-sm">
                            <p class="text-capitalize"> {{$task->title}}</p>
                        </div>
                        <div class="col-sm">
                            <p class="text-capitalize"> {{$task->value}}.</p>
                        </div>
                        <div class="col-sm">
                            <p class="text-capitalize">{{$task->body}}</p>
                        </div>
                        <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">x</button>
                        </form>

                    </div>
                    @endforeach
                        <form action="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/tasks" method="POST">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="value" placeholder="Value">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="body" placeholder="Description">
                                </div>
                                <button class="btn btn-success" type="submit">Save task</button>
                            </div>
                            @csrf
                        </form>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            <div class="card">
                <div class="card-header">
                    <form action="/cards/{{$card->id}}/collections" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Collection name">
                            </div>
                            <button class="btn btn-success" type="submit">Save Collection</button>
                            @csrf
                        </div>
                    </form>
                    {{ $errors->first('name') }}
                </div>
        </div>
    </div>
</div>
@endsection
