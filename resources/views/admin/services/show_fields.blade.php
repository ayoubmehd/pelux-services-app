<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $service->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $service->description }}</p>
</div>

<!-- Lat Field -->
<div class="col-sm-12">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{{ $service->lat }}</p>
</div>

<!-- Long Field -->
<div class="col-sm-12">
    {!! Form::label('long', 'Long:') !!}
    <p>{{ $service->long }}</p>
</div>

<!-- City Id Field -->
<div class="col-sm-12">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{{ $service->city_id }}</p>
</div>

<!-- Provider Id Field -->
<div class="col-sm-12">
    {!! Form::label('provider_id', 'Provider Id:') !!}
    <p>{{ $service->provider_id }}</p>
</div>

<!-- Is Publised Field -->
<div class="col-sm-12">
    {!! Form::label('is_publised', 'Is Publised:') !!}
    <p>{{ $service->is_publised }}</p>
</div>

