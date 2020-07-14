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
        @includeIf('cards.edit_modal')
    <div class="accordion " id="accordionExample">
        @foreach($collections as $collection)
            <div class="card">
            <div class="card-header row" id="{{$collection->name}}">
                <div class="col-sm">
                    <button class="btn btn-link text-capitalize" type="button" data-toggle="collapse" data-target="#collapse{{$collection->id}}" aria-expanded="true" aria-controls="collapseOne">
                        {{$collection->name}}
                    </button>
                </div>
                <div class="col-sm text-right">
                    <div>
                        @include('collections.edit_modal')
                    </div>
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
                                <p class="text-capitalize">@if($task->completed)<s>{{$task->title}}</s>@else{{$task->title}}@endif</p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize">@if($task->completed)<s>{{$task->value}}</s>@else{{$task->value}}@endif</p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize">@if($task->completed)<s>{{$task->body}}</s>@else{{$task->body}}@endif</p>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                        <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}/completed" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="completed" value="{{$task->completed}}" />
                            @if($task->completed)
                                <button class="btn btn-info" type="submit">Completed</button>
                            @else
                                <button class="btn btn-dark"  type="submit">Completed</button>
                            @endif
                        </form>
                        @include('tasks.edit_modal')
                        <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">x</button>
                        </form>
                            </div>
                    </div>
                    @endforeach
                    <div>
                        <form action="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/tasks" method="POST">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                    {{ $errors->first('title') }}
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
        </div>
        @endforeach
        <div>
            <div class="card">
                <div class="card-header">
                    {!! Form::open( [$card->id, 'action' => 'CollectionsController@store', 'method' => 'POST']) !!}
                        <div class="form-row">
                            <div class="col">
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Collection Name'])}}
                            </div>
                            {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                            @csrf
                        </div>
                    {!! Form::close() !!}
                    {{ $errors->first('name') }}

                </div>
        </div>
    </div>
</div>
@endsection
