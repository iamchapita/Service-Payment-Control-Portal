@include('navbar')
<div class='container'>
    @include('filterAndTitle')
    <table class="table table-bordered table-ligth table-striped" id="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            @foreach ( $values as $value )
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->texName }}</td>
                <td>
                    @if ( $value->boolStatus == 0 )
                    No Activo
                    @else
                    Activo
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
