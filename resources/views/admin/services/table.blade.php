<div class="table-responsive">
    <table class="table" id="services-table">
        <thead>
        <tr>
            <th>Title</th>
        <th>Description</th>
        <th>Lat</th>
        <th>Long</th>
        <th>City Id</th>
        <th>Provider Id</th>
        <th>Is Publised</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
            <td>{{ $service->description }}</td>
            <td>{{ $service->lat }}</td>
            <td>{{ $service->long }}</td>
            <td>{{ $service->city_id }}</td>
            <td>{{ $service->provider_id }}</td>
            <td>{{ $service->is_publised }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.services.destroy', $service->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.services.show', [$service->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.services.edit', [$service->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
