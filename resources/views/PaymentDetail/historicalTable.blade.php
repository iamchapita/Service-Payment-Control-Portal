@include('navbar')
<div class='container'>
    @include('filterAndButton')
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover" id="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Mes</th>
                    <th>Fecha Pago</th>
                    <th>Cuota</th>
                    <th>Estado de Deposito</th>
                    <th>Fecha de Deposito</th>
                    <th>Editar</th>
                    <th>Borrar</th>
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
                        Pendiente
                        @else
                        Depósito Realizado
                        @endif
                    </td>
                    <td>{{ $value->FechaDeposito }}</td>
                    <td>
                        <form method="POST" action="{{ route('editPaymentDetail', $value->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Editar</button>
                        </form>
                    </td>
                    <!-- <td>
                        <form method="POST" action="{{ route('editPaymentDetail', $value->id) }}">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
