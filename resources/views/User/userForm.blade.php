<div class="input-group mb-3">
    <label class="input-group-text" for="userInput">Nombre</label>
    <input type="text" class="form-control" required autocomplete="off" name="texName" id="texName" pattern="[A-Za-z]{4,20}"  placeholder="Ingrese un nombre del Usuario" @if(isset($values)) @foreach($values as $value) value={{ $value->texName }} @endforeach @endif>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="boolStatus">Estado del Usuario</label>
    <select class="form-select" name="boolStatus" id="boolStatus" required autocomplete="off">
        <option value="">Seleccione el Estado del Usuario</option>
        <option value="0" @if(isset($values)) @foreach($values as $value) @if($value->boolStatus == 0)
            selected
            @endif
            @endforeach
            @endif
            >
            Inactivo
        </option>
        <option value="1" @if(isset($values)) @foreach($values as $value) @if($value->boolStatus == 1)
            selected
            @endif
            @endforeach
            @endif
            >
            Activo
        </option>
    </select>
</div>

<div class="input-group mb-3">
    <label class="input-group-text" for="boolAdminStatus">Rol del Usuario</label>
    <select class="form-select" name="boolAdminStatus" id="boolAdminStatus" required autocomplete="off">
        <option value="">Seleccione el Rol del Usuario</option>
        <option value="0" @if(isset($values)) @foreach($values as $value) @if($value->boolAdminStatus == 0)
            selected
            @endif
            @endforeach
            @endif
            >
            Cliente
        </option>
        <option value="1" @if(isset($values)) @foreach($values as $value) @if($value->boolAdminStatus == 1)
            selected
            @endif
            @endforeach
            @endif
            >
            Administrador
        </option>
    </select>
</div>

<br>
<button type="submit" class="submitButton btn btn-dark">{{ $action }}</button>
