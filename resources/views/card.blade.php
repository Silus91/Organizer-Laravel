@extends('layouts.app')

@section('content')

<h1>card test blade</h1>
<form action="cards" method="POST">

    <div class="input-group">
        <input type="text" name="name">
        <button type="submit">Save card</button>
    </div>
@csrf
</form>
{{ $errors->first('name') }}
@foreach($cards as $card)

    <div class="row">
        <div class="col-2"><a href="/cards/{{ $card->id }}">{{ $card->name}}</a></div>
{{--        <div class="col-2">{{ $card->user_id}}</div>--}}
    </div>

@endforeach

@endsection
