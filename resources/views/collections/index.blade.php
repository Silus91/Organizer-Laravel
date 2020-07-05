@extends('layouts.app')
@section('content')
    <ul>
        @foreach($collections as $collection)
            <li>
                <div class="col-2">{{ $collection->name}}</div>
                <a href="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/edit">Edit collection</a>
                <form action="/cards/{{ $collection->card_id }}/collections/{{$collection->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete collection</button>
                </form>
                <button class="btn btn-link" href="/cards/{{$collection->card_id}}/collections/{{$collection->id}}/edit">Edit</button>

            </li>
        @endforeach

    </ul>
@endsection
