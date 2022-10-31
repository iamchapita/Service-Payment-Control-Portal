@include('navbar')
<div class="container">
    <form method="POST" action="{{ route('insertPaymentDetail') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <label class="input-group-text" for="userInput">Usuarios</label>
            <select name="userInput" class="form-select" id="userInput" required autocomplete="off">
                <option selected value="">Seleccione un Usuario</option>
                @foreach( $users as $user )
                <option value="{{ $user->id }}">{{ $user->texName }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="serviceInput">Servicio</label>
            <select class="form-select" name="serviceInput" id="serviceInput" required autocomplete="off">
                <option selected value="">Seleccione un Servicio</option>
                @foreach( $services as $service )
                <option value="{{ $service->id }}">{{ $service->texName }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="monthInput">Mes</label>
            <select class="form-select" name="monthInput" id="monthInput" required autocomplete="off">
                <option selected value="">Seleccione un Mes</option>
                @foreach( $months as $month )
                <option value="{{ $month->id }}">{{ $month->texName }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="payDateInput">Fecha de Pago</label>
            <input type="date" class="date form-control" name="payDateInput" id="payDateInput" required autocomplete="off">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="moneyAmountInput">Cuota</label>
            <input type="number" class="form-control" name="moneyAmountInput" id="moneyAmountInput" required autocomplete="off">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="depositeStatus">Estado del Depósito</label>
            <select class="form-select" name="depositeStatus" id="depositeStatus" required autocomplete="off" onchange="checkDepositeStatus()">
                <option selected value="">Seleccione el Estado</option>
                <option value="0">Pediente</option>
                <option value="1">Depósito Realizado</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="depositeDateInput">Fecha de Depósito</label>
            <input type="date" class="date form-control" name="depositeDateInput" id="depositeDateInput" autocomplete="off">
        </div>

        <br>
        <button type="submit" class="submitButton btn btn-dark">Insertar</button>
    </form>
</div>
