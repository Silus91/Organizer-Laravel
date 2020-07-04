@extends('layouts.app')

@section('content')

    <h1>Edit collection {{ $collection->name }}</h1>
    <a href="/cards/{{$collection->card_id}}/collections">Return</a>

    <form action="/cards/{{$collection->card_id}}/collections/{{$collection->id}}" method="POST">
        @method('PATCH')
        <div class="input-group">
            <input type="text" value="{{ $collection->name }}" name="name">
            <button type="submit">Update Collection</button>
        </div>
        @csrf
    </form>
    {{ $errors->first('name') }}


@endsection
