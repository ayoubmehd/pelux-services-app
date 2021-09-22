<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!!
    Form::select('status', [
    'inprogress' => 'In Progress',
    'confirmed' => 'Confirmed',
    'canceled' => 'Canceled',
    'finished' => 'Finished'
    ],
    null, ['class' => 'form-control custom-select'])
    !!}

</div>


<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::select('service_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>
