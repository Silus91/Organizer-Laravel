@extends('layouts.app')
@section('content')
    <ul>
        @foreach($collections as $collection)
            <li>
                <div class="col-2">{{ $collection->name}}</div>
            </li>
        @endforeach

    </ul>
<a href="/cards/{{$card_id}}">{{$card_id}}</a>
@endsection
