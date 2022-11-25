@include('headers')
@include('navbar')
<form class="loginRegistrationForm" method="post" action="{{ route('loginStep') }}">
    @csrf
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" class="form-control" required autocomplete="off" id="name" name="name" placeholder="Un solo nombre" pattern="[A-Za-z]{4,20}" title="Letras y números. Tamaño mínimo: 4. Tamaño máximo: 20"/>
        <label class="form-label" for="name">Nombre</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" class="form-control" required autocomplete="off" id="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,35}$" placeholder="Contraseña de 8 a 35 caractéres"/>
        <label class="form-label" for="form2Example2">Contraseña</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar Sesión</button>
</form>
