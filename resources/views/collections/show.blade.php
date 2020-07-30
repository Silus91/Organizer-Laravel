@extends('layouts.app')
@section('title','Task ')
@section('content')
    <div class="container">
        <form action="/lists/{{ $task->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete task</button>
        </form>
        <h1>Lists</h1>
    </div>
@endsection
