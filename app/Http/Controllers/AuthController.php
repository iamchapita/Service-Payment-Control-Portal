<?php

namespace App\Http\Controllers;

use App\Model\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function loginView(){

        $data['currentView'] = 'Login';
        return view('auth.login', $data);
    }

    /**
     * Display a listing of the resource.
     *@return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function loginStep(Request $request){

        // Validando los datos recibidos del formulario
        $rules = array(
            'name' => ['required', 'string'],
            'password' => ['required', 'min:8', 'current_password'],
        );

        $customAttributes = array(
            'name' => 'Nombre',
            'password' => 'Contraseña'
        );

        $messages = array(
            'required' => 'El campo :attribute es requerido.',
            'min' => 'El campo :attribute debe tener al menos 8 caracteres.'
            'max' => 'El campo :attribute debe tener máximo 35 caracteres.'
        );

        $validator = Validator::make($rules, $customAttributes, $messages);

        $texName = $request->input('name');
        $password = $request->input('password');

        if (Auth::attempt(['texName' => $texName, 'password' => $password])){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->withSucess('Credenciales incorrectas.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationView(){
        //
    }
    /**
     * Display a listing of the resource.
     *@return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function registrationStep(){
        //
    }

    // Immplementacion de dashboard pendiente
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Incia sesión primero');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout() {

        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
