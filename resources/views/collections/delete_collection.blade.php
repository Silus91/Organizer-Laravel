<div class="modal fade" id="deleteCollection{{$collection->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="deleteCollection{{$collection->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/cards/{{$card->id}}/collections/{{$collection->id}}" method="POST">
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Delete Collection {{ $collection->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="col-sm-12">
                            <label for="name">Do you Really want to Delete this Collection?</label>
                        </div>
                        @csrf
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Delete Collection</button>
                </div>
            </form>
        </div>
    </div>
</div>



