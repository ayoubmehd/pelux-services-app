<div class="table-responsive">
    <table class="table" id="services-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                {{-- <th>Lat</th>
                <th>Long</th> --}}
                <th>City</th>
                <th>Provider</th>
                <th>Is Publised</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td>{{ $service->description }}</td>
                {{-- <td>{{ $service->lat }}</td>
                <td>{{ $service->long }}</td> --}}
                <td>
                    <a href="{{ route('admin.cities.show', [$service->city->id]) }}">{{ $service->city->label }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.cities.show', [$service->provider->id]) }}">{{ $service->provider->name }}</a>
                </td>
                <td>{{ $service->is_publised }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.services.destroy', $service->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.services.show', [$service->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.services.edit', [$service->id]) }}" class='btn btn-default btn-xs'>
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
