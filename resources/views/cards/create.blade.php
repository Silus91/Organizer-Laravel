@extends('layouts.app')

@section('content')

<h1>Create New card</h1>
<a href="/cards">Return</a>

<form action="/cards" method="POST">

    <div class="input-group">
        <input type="text" name="name">
        <button type="submit">Save card</button>
    </div>
@csrf
</form>
{{ $errors->first('name') }}


@endsection
