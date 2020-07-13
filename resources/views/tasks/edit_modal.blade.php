<div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$task->id}}">
        Edit
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$task->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/cards/{{$card->id}}/collections/{{$task->collection_id}}/tasks/{{$task->id}}" method="POST">
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Task {{ $task->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="col-sm-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{ $task->title }}" id="title" name="title" placeholder="Title">
                            {{ $errors->first('title') }}
                        </div>
                        <div class="col-sm-12">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" value="{{ $task->value }}" id="value" name="value" placeholder="Value">
                        </div>
                        <div class="col-sm-12">
                            <label for="body">Description</label>
                            <input type="text" class="form-control" value="{{ $task->body }}" id="body" name="body" placeholder="Description">
                        </div>
                    </div>
                    @csrf
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Update task</button>
                </div>
            </form>
        </div>
    </div>
</div>
