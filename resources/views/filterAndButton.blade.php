<h1>{{ $currentView }}</h1>
<br>
<div id="filterAndButton">
    <div class="row g-3">
        <div class="col-md-6 col-xl-6">
            <div class="input-group">
                <span class="input-group-text">Filtro</span>
                <input type="text" class="form-control" id="searchInput" autocomplete="off" placeholder="Filtrar" aria-label="Search" aria-describedby="basic-addon1" oninput="searchFilter()">
                @isset($years)
                <select name="yearFilterInput" class="form-select" id="yearFilterInput"     autocomplete="off" onchange="searchFilter()">
                    <option selected value="">Seleccione un Año</option>
                    @foreach( $years as $year )
                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                    @endforeach
                </select>
                @endisset
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            @isset($insertURL)
            <button id="insertButton" type="button" class="btn btn-secondary" onclick="location.href='{{ route($insertURL) }}'">Insertar</button>
            @endisset
        </div>
    </div>
</div>
