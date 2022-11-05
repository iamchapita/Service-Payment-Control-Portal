@include('headers')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Control de Pagos Spotify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-view">
                    <a class="nav-link" href="{{ route('historicalDetail') }}">Administrador</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container" id="cardContainer">

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Identificación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('userDetail') }}">
                        @csrf
                        <div class="col-md">
                            <div class="form-floating">
                                <select name="userSelect" class="form-select" id="floatingSelectGrid" autocomplete="off" required>
                                    <option value="" selected>Seleccione su Nombre</option>
                                    @foreach( $values as $value)
                                    <option value="{{$value->id}}">{{ $value->texName }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectGrid">Identifquese</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearSelect();">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Aceptar</button>
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
