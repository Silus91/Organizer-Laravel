<div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create New Card
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {!! Form::open(['action' => 'CardsController@store', 'method' => 'POST']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="col-sm-12">
                            {{Form::label('name', 'New Card Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Card Name'])}}
                            {{ $errors->first('name') }}
                        </div>
                        @csrf
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



