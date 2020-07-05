@extends('layouts.app')
@section('title','Card ' . $card->name)
@section('content')
<div class="container">


    <form action="/cards/{{ $card->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete card</button>
    </form>

    <h1>{{$card->name}}</h1>
    <a href="/cards">Return</a>
    <a href="/cards/{{$card->id}}/edit">Edit card</a>
<div>
    <form action="/cards/{{$card->id}}/collections" method="POST">

        <div class="input-group">
            <input type="text" name="name">
            <button type="submit">Save Collection</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('name') }}
    <ul>
        @foreach($collections as $collection)

            <li>
                <div class="col-2">{{ $collection->name}}</div>
                <a href="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/edit">Edit collection</a>
                <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">x</button>
                </form>

                @foreach($collection->tasks as $task)
                    <div>{{$task->title}}</div>
                    <div>{{$task->value}}</div>
                    <div>{{$task->body}}</div>
                    <div>{{$task->collection_id}}</div>
                    <div>{{$card->name}}</div>
                    <div>"/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}"</div>

                    <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}/tasks/{{$task->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete Task</button>
                    </form>

                @endforeach
                <form action="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/tasks" method="POST">
                    <div class="input-group">
                        <input type="text" name="title" value={{$collection->id}}>
                        <input type="text" name="value">
                        <input type="text" name="body">
                        <button type="submit">Save task</button>
                    </div>

                    @csrf
                </form>
            </li>

        @endforeach

    </ul>

</div>



</div>
@endsection
