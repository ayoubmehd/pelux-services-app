<!-- Ligne1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ligne1', 'Ligne1:') !!}
    {!! Form::text('ligne1', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Ligne2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ligne2', 'Ligne2:') !!}
    {!! Form::text('ligne2', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::select('city_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>
