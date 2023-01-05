<h1>{{ $currentView }}</h1>
<br>
<div id="filterAndButton">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" autocomplete="off" onkeyup="searchFilter()" placeholder="Filtrar" aria-label="Search" aria-describedby="basic-addon1">
        @isset($years)
        <select name="yearFilter" class="form-select" id="yearFilterInput" autocomplete="off" onchange="yearFilter()">
            <option selected value="">Seleccione un Año</option>
            @foreach( $years as $year )
                <option value="{{ $year->year }}">{{ $year->year }}</option>
            @endforeach
        </select>
        @endisset
    </div>
    @isset($insertURL)
    <button id="insertButton" type="button" class="btn btn-secondary" onclick="location.href='{{ route($insertURL) }}'">Insertar</button>
    @endisset
</div>
