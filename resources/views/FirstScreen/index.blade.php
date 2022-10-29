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
    <div class="card">
        <img src="{{ asset('images/receipt.png') }}" class="card-img-top" alt="Histórico de Pagos">
        <div class="card-body">
            <p class="card-text">Consulte su histórico de pagos, con fechas, y montos.</p>
        </div>
    </div>
    <div class="card">
        <img src="{{ asset('images/bd.png') }}" class="card-img-top" alt="Administrador">
        <div class="card-body">
            <p class="card-text">Inicie sesión como administrador y registre, elimine o modifique la información de los usuarios.</p>
        </div>
    </div>
</div>
