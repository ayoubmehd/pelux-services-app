<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::number('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long', 'Long:') !!}
    {!! Form::number('long', null, ['class' => 'form-control']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::select('city_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    {!! Form::select('provider_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Is Publised Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_publised', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_publised', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_publised', 'Is Publised', ['class' => 'form-check-label']) !!}
    </div>
</div>
