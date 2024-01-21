<h1>{{ $currentView }}</h1>
<br>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Inserción de multiples Registros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('CreatePaymentDetail') }}">
                    @csrf
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" name="numRegisters" id="numRegisters" autocomplete="off"
                                required>
                                <option value="" selected>Seleccione un Valor</option>
                                @isset($numRegisters)
                                    @for ($i = 1; $i <= $numRegisters; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                @endisset
                            </select>
                            <label for="floatingSelectGrid">Seleccione la cantidad de Registros a Insertar</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Aceptar</button>
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="filterAndButton">
    <div class="row g-3">
        <div class="col-md-6 col-xl-6">
            <div class="input-group">
                <label class="input-group-text">Filtro</label>
                <input type="text" class="form-control" id="searchInput" autocomplete="off" placeholder="Filtrar"
                    aria-label="Search" aria-describedby="basic-addon1" oninput="searchFilter()">
                @isset($years)
                    <select name="yearFilterInput" class="form-select" id="yearFilterInput" autocomplete="off"
                        onchange="searchFilter()">
                        <option selected value="">Seleccione un Año</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                        @endforeach
                    </select>
                @endisset
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            @if (isset($numRegisters))
                <button id="insertButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button"
                    class="btn btn-secondary">Insertar</button>
            @else
                @isset($insertURL)
                    <button id="insertButton" type="button" class="btn btn-secondary"
                        onclick="location.href='{{ route($insertURL) }}'">Insertar</button>
                @endisset
            @endif
        </div>
    </div>
</div>
