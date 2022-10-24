@include('navbar')
<div class='container'>
    <h1>{{ $currentView }}</h1>
    <table class="table table-bordered table-ligth table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Servicio</th>
                <th>Mes</th>
                <th>Fecha de Pago</th>
                <th>Pago</th>
                <th>Estado de Deposito</th>
                <th>Fecha de Deposito</th>
            </tr>
        </thead>

        <tbody>
            @foreach ( $values as $value )
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->Usuario }}</td>
                <td>{{ $value->Servicio }}</td>
                <td>{{ $value->Mes }}</td>
                <td>{{ $value->Fecha }}</td>
                <td>{{ $value->Pago }}</td>
                <td>
                    @if ( $value->Estado == 0 )
                    Sin Depóosito
                    @else
                    Depósito Realizado
                    @endif
                </td>
                <td>{{ $value->FechaDeposito }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
