<h1>{{ $currentView }}</h1>
<br>
<div id="filterAndButton">
    <div class="row gy-2 gx-6">
        <div class="col-8">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" autocomplete="off" placeholder="Filtrar" aria-label="Search" aria-describedby="basic-addon1">
                @isset($years)
                <select name="yearFilterInput" class="form-select" id="yearFilterInput" autocomplete="off">
                    <option selected value="">Seleccione un Año</option>
                    @foreach( $years as $year )
                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                    @endforeach
                </select>
                @endisset
                <button id="filterButton" type="button" class="btn btn-primary" onclick="searchFilter()">Filtrar</button>
            </div>
        </div>
        <div class="col-4">
            @isset($insertURL)
            <button id="insertButton" type="button" class="btn btn-secondary" onclick="location.href='{{ route($insertURL) }}'">Insertar</button>
            @endisset
        </div>
    </div>
</div>
