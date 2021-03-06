@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cards</h1>
    @foreach($cards as $card)
        <div class="row">
            <div class="col-2"><a href="/cards/{{ $card->id }}">{{ $card->name}}</a></div>
        </div>
    @endforeach
    <div>
        @include('cards.create')
    </div>
</div>
@endsection
