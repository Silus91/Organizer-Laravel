@extends('layouts.app')
@section('title','Card ' . $card->name)
@section('content')

    <h1>{{$card->name}}</h1>
    <a href="/cards">Return</a>


    <a href="/cards/{{$card->id}}/edit">Edit card</a>
<p>{{ $card->user->name }}</p>

<form action="/cards/{{ $card->id }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">Delete</button>

</form>

@endsection
