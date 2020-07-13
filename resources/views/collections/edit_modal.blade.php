<div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$collection->id}}">
        Edit
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$collection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$collection->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/cards/{{$card->id}}/collections/{{$collection->id}}" method="POST">
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Collection {{ $collection->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $collection->name }}" id="title" name="name" placeholder="Name">
                            {{ $errors->first('name') }}
                        </div>
                        @csrf
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Update Collection</button>
                </div>
            </form>
        </div>
    </div>
</div>
