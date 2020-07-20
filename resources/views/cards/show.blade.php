@extends('layouts.app')
@section('title','Card ' . $card->name)
@section('content')

<div class="container">

    <h1 class="text-capitalize">{{$card->name}}</h1>

    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/cards" class="btn btn-info text-white">Return</a>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editCardModal">
            Edit
        </button>
        <button type="submit" class="btn btn-danger" data-toggle="modal"  data-target="#deleteCardModal">
            Delete
        </button>
    </div>
        @include('cards.edit_card')
        @include('cards.delete_card')

    <div class="accordion " id="accordionExample">
        @foreach($collections as $collection)
        <div class="card">
            <div class="card-header row" id="{{$collection->name}}">
                <div class="col-sm">
                    <button class="btn btn-link text-capitalize font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{$collection->id}}" aria-expanded="true" aria-controls="collapseOne">
                        {{$collection->name}}
                    </button>
                </div>

                <div class="col-sm d-flex flex-row-reverse">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editCollection{{$collection->id}}Modal">
                            Edit
                        </button>
                        <button type="submit" class="btn btn-danger" data-toggle="modal"  data-target="#deleteCollection{{$collection->id}}Modal">
                            Delete
                        </button>
                    </div>
                    @include('collections.edit_collection')
                    @include('collections.delete_collection')
                </div>
            </div>



            <div id="collapse{{$collection->id}}" class="collapse show" aria-labelledby="{{$collection->name}}" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Value</td>
                                <td>Description</td>
                                <td>Actions</td>

                            </tr>
                            </thead>
                            @foreach($collection->tasks as $task)
                            <tbody>
                                <tr>
                                    <td>
                                        @if($task->completed)<s>{{$task->title}}</s>@else{{$task->title}}@endif
                                    </td>
                                    <td>
                                        @if($task->completed)<s>{{$task->value}}</s>@else{{$task->value}}@endif
                                    </td>
                                    <td>
                                        @if($task->completed)<s>{{$task->body}}</s>@else{{$task->body}}@endif
                                    </td>

                                    <td>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}/completed" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="completed" value="{{$task->completed}}" />
                                                    <button class="btn @if($task->completed)btn-info @else btn-dark @endif" type="submit">Completed</button>
                                                </form>
                                                @include('tasks.edit_modal')
                                                <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">x</button>
                                                </form>
                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                            @endforeach

                        </table>






                    </div>
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
                    {!! Form::open(['action' => ['CollectionsController@store', $card->id], 'method' => 'POST']) !!}
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








