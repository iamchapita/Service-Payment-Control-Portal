<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>

    <tbody>
        @foreach ( $values as $value )
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->texName }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
