@include('navbar')
<div class='container'>
    <h1>{{ $currentView }}</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover" id="table">
            <thead class="table-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Mes</th>
                    <th>Fecha Pago</th>
                    <th>Cuota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $values as $value )
                <tr>
                    <td>{{ $value->Usuario }}</td>
                    <td>{{ $value->Servicio }}</td>
                    <td>{{ $value->Mes }}</td>
                    <td>{{ $value->Fecha }}</td>
                    <td>{{ $value->Pago }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
