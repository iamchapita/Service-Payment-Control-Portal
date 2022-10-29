@include('navbar')
<div class='container'>
    @include('filterAndTitle')
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover" id="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Mes</th>
                    <th>Pago</th>
                    <th>Cuota</th>
                    <th>Deposito</th>
                    <th>Deposito</th>
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

</div>
