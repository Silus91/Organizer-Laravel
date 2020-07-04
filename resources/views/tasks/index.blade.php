@extends('layouts.app')
@section('content')
    <ul>
        @foreach($tasks as $task)
            <li>
                <div class="col-2">{{ $task->title}}</div>
                <div class="col-2">{{ $task->body}}</div>
                <div class="col-2">{{ $task->value}}</div>
            </li>
        @endforeach

    </ul>
@endsection
