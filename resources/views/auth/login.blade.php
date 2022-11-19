@include('headers')
@include('navbar')
<form class="loginRegistrationForm">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" class="form-control" required autocomplete="off" id="email" name="email"/>
        <label class="form-label" for="form2Example1">Nombre de Usuario</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" class="form-control" required autocomplete="off" id="password" name="password"/>
        <label class="form-label" for="form2Example2">Contraseña</label>
    </div>

    <!-- Submit button -->
    <button type="button" class="btn btn-primary btn-block mb-4">Iniciar Sesión</button>
</form>
