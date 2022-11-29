<?php

namespace App\Http\Controllers;

use App\Model\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {

        $data['currentView'] = 'Login';
        return view('auth.login', $data);
    }

    /**
     * Display a listing of the resource.
     *@return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function loginStep(Request $request)
    {

        // Validando los datos recibidos del formulario
        $rules = array(
            'name' => ['required', 'string'],
            'password' => ['required', 'min:8', 'max:35','current_password'],
        );

        $messages = array(
            'name.required' => 'El campo Nombre es requerido.',
            'password.min' => 'El campo Contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'El campo Contraseña debe tener máximo 35 caracteres.'
        );

        // Obteniendo los campos a validar
        $fields = $request->except('_token');

        $validator = Validator::make($fields, $rules, $messages);

        if ($validator->passes()) {

            // Comprobando el intento de inicio de sesión
            if (Auth::attempt($fields)) {
                $request->session()->regenerate();
                return redirect()->intended(route('Home'))->withSuccess('Sesión Iniciada.');
            }
            // Retornando atras si el intento de sesión falla
            // return back()->withSuccess('Credenciales Incorrectas.');

        } else {
            return redirect(route('Login'))->withErrors($validator);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationView()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordChangeView()
    {
        $data['currentView'] = 'Cambio de Contraseña';
        return view('auth.password.passwordChange', $data);
    }
    /**
     * Display a listing of the resource.
     *@return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function passwordChangeStep(Request $request)
    {

        // Validando los datos recibidos del formulario
        $rules = array(
            'password' => ['required', 'min:8', 'max:35', 'confirmed']
        );

        // Definiendo los comentarios personalizados sobre error del input
        $messages = array(
            'password.required' => 'El campo Contraseña es requerido.',
            'password.min' => 'El campo Contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'El campo Contraseña debe tener máximo 35 caracteres.',
            'password.confirmed' => 'La Contraseña y su confirmación deben coincidir.'
        );

        // Obteniendo los campos a validar
        $fields = $request->except('_token');

        // Validando campos con las reglas
        $validator = Validator::make($fields, $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('passwordChange'))->withErrors($validator);

        }else{
            // Actualizando la contraseña
            UserController::updatePassword($request->input('password'));
            return redirect(route('Login'));
        }
    }
    /**
     * Display a listing of the resource.
     *@return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function registrationStep()
    {
        //
    }

    // Immplementacion de dashboard pendiente
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Incia sesión primero');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        Session::flush();
        Auth::logout();

        return redirect('Login');
    }
}
