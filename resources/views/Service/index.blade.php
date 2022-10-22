@include('navbar')
<div class='container'>
    <table class="table table-bordered table-ligth table-striped">
        <thead  class="table-dark">
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
</div>
