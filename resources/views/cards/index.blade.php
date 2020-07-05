@extends('layouts.app')

@section('content')
    <h1>Cards</h1>
    <a href="cards/create">Create new Card</a>


@foreach($cards as $card)
    <div class="row">
        <div class="col-2"><a href="/cards/{{ $card->id }}">{{ $card->name}}</a></div>
    </div>

@endforeach

@endsection
