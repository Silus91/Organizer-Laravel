@extends('layouts.app')

@section('content')

    <h1>Edit Task {{ $task->title }}</h1>
    <a href="/cards/{{$task->collection->card_id}}">Return</a>

    <form action="/cards/{{$card->id}}/collections/{{$task->collection_id}}/tasks/{{$task->id}}" method="POST">
        @method('PATCH')
        <div class="input-group">
            <input type="text" value="{{ $task->title }}" name="title">
            <input type="text" value="{{ $task->value }}" name="value">
            <input type="text" value="{{ $task->body }}" name="body">
            <button type="submit">Update Task</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('title') }}
@endsection
