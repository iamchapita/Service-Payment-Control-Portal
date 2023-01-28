@isset( $inputsName )
@foreach ($inputsName as $inputName)
<br>
<h3>Registro No.{{ $inputName }}</h3>
<div class="col-md-6 col-xl-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="userInput{{ $inputName }}">Usuario</label>
        <select name="userInput{{ $inputName }}" class="form-select" id="userInput{{ $inputName }}" required autocomplete="off">
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
</div>
<div class="col-md-6 col-xl-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="serviceInput{{ $inputName }}">Servicio</label>
        <select class="form-select" name="serviceInput{{ $inputName }}" id="serviceInput{{ $inputName }}" required autocomplete="off">
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
</div>
<div class="col-md-6 col-xl-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="monthInput{{ $inputName }}">Mes</label>
        <select class="form-select" name="monthInput{{ $inputName }}" id="monthInput{{ $inputName }}" required autocomplete="off">
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
</div>
<div class="col-md-6 col-xl-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="payDateInput{{ $inputName }}">Fecha de Pago</label>
        <input type="date" class="date form-control" name="payDateInput{{ $inputName }}" id="payDateInput{{ $inputName }}" @if(isset($values)) @foreach($values as $value) value={{ $value->datDate }} @endforeach @endif required autocomplete="off">
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="input-group mb-3">
        <label class="input-group-text" for="moneyAmountInput{{ $inputName }}">Cuota</label>
        <input type="number" class="form-control" name="moneyAmountInput{{ $inputName }}" id="moneyAmountInput{{ $inputName }}" @if(isset($values)) @foreach($values as $value) value={{ $value->numPaid }} @endforeach @endif required autocomplete="off">
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="input-group mb-3">
        <label class="input-group-text" for="depositStatus{{ $inputName }}">Estado del Depósito</label>
        <select class="form-select" name="depositStatus{{ $inputName }}" id="depositStatus{{ $inputName }}" required autocomplete="off" onchange="checkDepositeStatus({{ $inputName }})">
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
</div>
<div class="col-md-12 col-xl-4">
    <div class="input-group mb-3" id="dateField">
        <label class="input-group-text" for="depositDateInput{{ $inputName }}">Fecha de Depósito</label>
        <input type="date" @if(!isset($values)) disabled @endif @if(isset($values)) @foreach($values as $value) @if($value->boolDeposited == 0)
        disabled
        @endif
        @endforeach
        @endif class="date form-control" id="depositDateInput{{ $inputName }}" name="depositDateInput{{ $inputName }}" @if(isset($values)) @foreach($values as $value) value={{ $value->datDepositedDate }} @endforeach @endif autocomplete="off">
    </div>
</div>
@endforeach
@else

<div class="col-md-6 col-xl-3">
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
</div>
<div class="col-md-6 col-xl-3">
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
</div>
<div class="col-md-6 col-xl-3">
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
</div>
<div class="col-md-6 col-xl-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="payDateInput">Fecha de Pago</label>
        <input type="date" class="date form-control" name="payDateInput" id="payDateInput" @if(isset($values)) @foreach($values as $value) value={{ $value->datDate }} @endforeach @endif required autocomplete="off">
    </div>
</div>
<div class="col-md-6 col-xl-4">
    <div class="input-group mb-3">
        <label class="input-group-text" for="moneyAmountInput">Cuota</label>
        <input type="number" class="form-control" name="moneyAmountInput" id="moneyAmountInput" @if(isset($values)) @foreach($values as $value) value={{ $value->numPaid }} @endforeach @endif required autocomplete="off">
    </div>
</div>
<div class="col-md-6 col-xl-4">
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
</div>
<div class="col-md-12 col-xl-4">
    <div class="input-group mb-3" id="dateField">
        <label class="input-group-text" for="depositDateInput">Fecha de Depósito</label>
        <input type="date" @if(!isset($values)) disabled @endif @if(isset($values)) @foreach($values as $value) @if($value->boolDeposited == 0)
        disabled
        @endif
        @endforeach
        @endif class="date form-control" id="depositDateInput" name="depositDateInput" @if(isset($values)) @foreach($values as $value) value={{ $value->datDepositedDate }} @endforeach @endif id="depositDateInput" autocomplete="off">
    </div>
</div>
@endisset
