<h1>{{ $currentView }}</h1>
<br>
<div id="filterAndButton">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" autocomplete="off" onkeyup="searchFilter()" placeholder="Filtrar" aria-label="Search" aria-describedby="basic-addon1">
    </div>
    <button type="button" class="btn btn-secondary" onclick="location.href='{{ route($insertURL) }}'">Insertar</button>
</div>
