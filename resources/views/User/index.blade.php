@extends('layouts.app')
@section('content')
<div class='container'>
    @include('filterAndButton')
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover  align-middle" id="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Administrador</th>
                    <th>Editar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ( $values as $value )
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->texName }}</td>
                    <td>
                        @if ( $value->boolStatus == 0 )
                        Inactivo
                        @else
                        Activo
                        @endif
                    </td>
                    <td>
                        @if ( $value->boolAdminStatus == 0 )
                        No
                        @else
                        Sí
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('EditUser', $value->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Editar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
