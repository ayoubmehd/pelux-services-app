<div class="table-responsive">
    <table class="table" id="adresses-table">
        <thead>
        <tr>
            <th>Ligne1</th>
        <th>Ligne2</th>
        <th>City Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($adresses as $adress)
            <tr>
                <td>{{ $adress->ligne1 }}</td>
            <td>{{ $adress->ligne2 }}</td>
            <td>{{ $adress->city_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.adresses.destroy', $adress->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.adresses.show', [$adress->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.adresses.edit', [$adress->id]) }}"
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
