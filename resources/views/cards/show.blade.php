@extends('layouts.app')
@section('title','Card ' . $card->name)
@section('content')

    <h1>{{$card->name}}</h1>
    <a href="/cards">Return</a>

<p>{{ $card->user->name }}</p>


@endsection
