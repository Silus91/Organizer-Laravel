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
        <div>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create New Card
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/cards" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Card</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                                <div class="col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="title" name="name" placeholder="Name">
                                    {{ $errors->first('name') }}
                                </div>
                                @csrf
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit">Create Card</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
