@include('headers')
@include('navbar')
@if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
@endif
<div class="loginPasswordForm">
    <h1>Cambio de Contraseña</h1>
    <br>
    <br>
    <br>
    <form method="post" action="{{ route('passwordChangeStep') }}">
        @csrf

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" class="form-control" required autocomplete="off" id="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,35}$" placeholder="Contraseña de 8 a 35 caractéres" />
            <label class="form-label" for="password">Contraseña</label>
        </div>

        <!-- ConfirmPassword input -->
        <div class="form-outline mb-4">
            <input type="password" class="form-control" required autocomplete="off" id="confirmPassword" name="confirmPassword" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,35}$" placeholder="Repita la contraseña" />
            <label class="form-label" for="confirmPassword">Confirmación de Contraseña</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Cambiar Contraseña</button>

        <div class="alert alert-secondary" role="alert">
            La contraseña:
            <br>- Debe tener al menos 8 caratéres.
            <br>- Debe tener máximo 35 caratéres.
            <br>- Debe tener al menos una inúscula.
            <br>- Debe tener al menos una mayúscula.
        </div>
    </form>
</div>
