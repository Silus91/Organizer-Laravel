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


    @yield('modal')

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
                        <div>
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$collection->id}}">
                                Edit
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$collection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$collection->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/cards/{{$card->id}}/collections/{{$collection->id}}" method="POST">
                                        @method('PATCH')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Collection {{ $collection->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="col-sm-12">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" value="{{ $collection->name }}" id="title" name="name" placeholder="Name">
                                                    {{ $errors->first('name') }}
                                                </div>
                                                @csrf
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-success" type="submit">Update Collection</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                        @if($task->completed)
                            <div class="col-sm">
                                <p class="text-capitalize text-info"><s>{{$task->title}}</s>  </p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize text-info"> <s>{{$task->value}}</s></p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize text-info"><s>{{$task->body}}</s></p>
                            </div>
                        @else
                            <div class="col-sm">
                                <p class="text-capitalize"> {{$task->title}} </p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize"> {{$task->value}}.</p>
                            </div>
                            <div class="col-sm">
                                <p class="text-capitalize">{{$task->body}}</p>
                            </div>
                        @endif


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
                        <div>
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$task->id}}">
                                Edit
                            </button>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$task->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/cards/{{$card->id}}/collections/{{$task->collection_id}}/tasks/{{$task->id}}" method="POST">
                                            @method('PATCH')
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Task {{ $task->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="form">
                                                    <div class="col-sm-12">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" value="{{ $task->title }}" id="title" name="title" placeholder="Title">
                                                        {{ $errors->first('title') }}
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="value">Value</label>
                                                        <input type="text" class="form-control" value="{{ $task->value }}" id="value" name="value" placeholder="Value">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="body">Description</label>
                                                        <input type="text" class="form-control" value="{{ $task->body }}" id="body" name="body" placeholder="Description">
                                                    </div>
                                                </div>
                                                @csrf
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-success" type="submit">Update task</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>





                        <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">x</button>
                        </form>
                            </div>
                    </div>
                    @endforeach
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
        @endforeach
        <div>
            <div class="card">
                <div class="card-header">
                    <form action="/cards/{{$card->id}}/collections" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Create New Collection name">
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
