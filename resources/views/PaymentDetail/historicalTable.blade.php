@extends('layouts.app')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    :message
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>')) !!}
@endif
<div class='container'>
    @include('filterAndButton')
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover align-middle" id="table">
            <thead class="table-dark">
                <tr class="align-middle">
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
                        <form method="POST" action="{{ route('EditPaymentDetail', $value->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('DestroyPaymentDetail', $value->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar este registro?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
