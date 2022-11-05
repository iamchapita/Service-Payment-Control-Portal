<div class="input-group mb-3">
    <label class="input-group-text" for="userInput">Usuario</label>
    <select name="userInput" class="form-select" id="userInput" required autocomplete="off">
        <option selected value="">Seleccione un Usuario</option>
        @foreach( $users as $user )
        @if(isset($values))
        <option @foreach($values as $value) @if( $value->idUserFK == $user->id)
            selected
            @endif
            @endforeach
            value="{{ $user->id }}">
            {{ $user->texName }}
        </option>
        @else
        <option value="{{ $user->id }}">{{ $user->texName }}</option>
        @endif
        @endforeach
    </select>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="serviceInput">Servicio</label>
    <select class="form-select" name="serviceInput" id="serviceInput" required autocomplete="off">
        <option selected value="">Seleccione un Servicio</option>
        @foreach( $services as $service )
        @if(isset($values))
        <option @foreach($values as $value) @if( $value->idServiceFK == $service->id)
            selected
            @endif
            @endforeach
            value="{{ $service->id }}">
            {{ $service->texName }}
        </option>
        @else
        <option value="{{ $service->id }}">{{ $service->texName }}</option>
        @endif
        @endforeach
    </select>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="monthInput">Mes</label>
    <select class="form-select" name="monthInput" id="monthInput" required autocomplete="off">
        <option selected value="">Seleccione un Mes</option>
        @foreach( $months as $month )
        @if(isset($values))
        <option @foreach($values as $value) @if( $value->idMonthFK == $month->id)
            selected
            @endif
            @endforeach
            value="{{ $month->id }}">
            {{ $month->texName }}
        </option>
        @else
        <option value="{{ $month->id }}">{{ $month->texName }}</option>
        @endif
        @endforeach
    </select>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="payDateInput">Fecha de Pago</label>
    <input type="date" class="date form-control" name="payDateInput" id="payDateInput" @if(isset($values)) @foreach($values as $value) value={{ $value->datDate }} @endforeach @endif required autocomplete="off">
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="moneyAmountInput">Cuota</label>
    <input type="number" class="form-control" name="moneyAmountInput" id="moneyAmountInput" @if(isset($values)) @foreach($values as $value) value={{ $value->numPaid }} @endforeach @endif required autocomplete="off">
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="depositStatus">Estado del Depósito</label>
    <select class="form-select" name="depositStatus" id="depositStatus" required autocomplete="off" onchange="checkDepositeStatus()">
        <option value="">Seleccione el Estado</option>
        <option value="0" @if(isset($values)) @foreach($values as $value) @if($value->boolDeposited == 0)
            selected
            @endif
            @endforeach
            @endif
            >
            Pediente
        </option>
        <option value="1" @if(isset($values)) @foreach($values as $value) @if($value->boolDeposited == 1)
            selected
            @endif
            @endforeach
            @endif
            >
            Depósito Realizado
        </option>
    </select>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="depositDateInput">Fecha de Depósito</label>
    <input type="date" class="date form-control" name="depositDateInput" @if(isset($values)) @foreach($values as $value) value={{ $value->datDepositedDate }} @endforeach @endif id="depositDateInput" autocomplete="off">
</div>

<br>
<button type="submit" class="submitButton btn btn-dark">{{ $action }}</button>
