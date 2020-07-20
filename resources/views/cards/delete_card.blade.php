<!-- Modal -->
<div class="modal fade" id="deleteCardModal" tabindex="-1" role="dialog" aria-labelledby="deleteCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/cards/{{$card->id}}" method="POST">
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Delete Card {{ $card->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="col-sm-12">
                            <label for="name">Do you Really want to Delete this Card?</label>
                        </div>
                        @csrf
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Delete Card</button>
                </div>
            </form>
        </div>
    </div>
</div>



