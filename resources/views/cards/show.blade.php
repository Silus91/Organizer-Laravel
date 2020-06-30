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
    <form action="/tasks" method="POST">

        <div class="input-group">
            <input type="text" name="name">
            <button type="submit">Save Task List</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('name') }}


</div>




</div>
@endsection
