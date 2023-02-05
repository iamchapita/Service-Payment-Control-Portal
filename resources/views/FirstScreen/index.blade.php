@extends('layouts.app')
@section('content')
<div class="container" id="cardContainer">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Identificación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('UserDetail') }}">
                        @csrf
                        <div class="col-md">
                            <div class="form-floating">
                                <select name="userSelect" class="form-select" id="userSelect" autocomplete="off" required>
                                    <option value="" selected>Seleccione su Nombre</option>
                                    @foreach( $values as $value)
                                    <option value="{{$value->id}}">{{ $value->texName }}</option>
                                    @endforeach
                                </select>
                                <label for="userSelect">Identifquese</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Aceptar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearSelect('userSelect');">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <img src="{{ asset('images/receipt.png') }}" class="card-img-top" alt="Histórico de Pagos">
        <div class="card-body">
            <p class="card-text">Consulte su histórico de pagos, con fechas, y montos.</p>
        </div>
    </div>
    </a>

    <div class="card" onclick=location.href="{{ route('login') }}">
        <img src="{{ asset('images/bd.png') }}" class="card-img-top" alt="Administrador">
        <div class="card-body">
            <p class="card-text">Inicie sesión como administrador y registre, elimine o modifique la información de los usuarios.</p>
        </div>
    </div>
</div>

@endsection
