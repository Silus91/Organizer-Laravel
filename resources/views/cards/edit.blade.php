@extends('layouts.app')

@section('content')

    <h1>Edit card {{ $card->name }}</h1>
    <a href="/cards">Return</a>

    <form action="/cards/{{$card->id}}" method="POST">
@method('PATCH')
        <div class="input-group">
            <input type="text" value="{{ $card->name }}" name="name">
            <button type="submit">Update card</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('name') }}


@endsection
