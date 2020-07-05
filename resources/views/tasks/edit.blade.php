@extends('layouts.app')

@section('content')

    <h1>Edit collection {{ $task->title }}</h1>
    <a href="/cards/{{$task->collection->card_id}}">Return</a>

    <form action="/cards/{{$task->collection->card_id}}/collections/{{$task->collection->id}}" method="POST">
        @method('PATCH')
        <div class="input-group">
            <input type="text" value="{{ $task->title }}" name="name">
            <input type="text" value="{{ $task->value }}" name="name">
            <input type="text" value="{{ $task->body }}" name="name">
            <button type="submit">Update Task</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('title') }}
@endsection
