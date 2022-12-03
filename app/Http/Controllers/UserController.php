<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected function validator(Request $request){

        // Estableciendo los nombres personalizados de los atributos
        $attributes = [
            'texName' => 'Nombre',
            'boolStatus' => 'Estado del Usuario',
            'boolAdminStatus' => 'Rol del Usuario',
        ];

        // Personalizando los mensajes de error
        $messages = [
            'texName.required' => 'El atributo Nombre es requerido.',
            'texName.min' => 'El atributo Nombre debe tener como mínimo 4.',
            'texName.max' => 'El atributo Nombre debe tener como máximo 8.',
            'boolStatus.required' => 'El atributo Estado es requerido.',
            'boolAdminStatus.required' => 'El atributo Rol es requerido.'
        ];

        // Estableciendo las reglas de validacion
        $rules = [
            'texName' => 'required|string|min:4|max:20',
            'boolStatus' => 'required|numeric|in:0,1',
            'boolAdminStatus' => 'required|numeric|in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variables para la vista
        $data['values'] = User::all(['id', 'texName', 'boolStatus', 'boolAdminStatus']);
        $data['currentView'] = 'User';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'NetflixDetail', 'DisneyDetail');
        // URL del formulario
        $data['insertURL'] = 'CreateUser';

        return view('User.index', $data);
    }

    // Obtiene todos los usuarios activos y con rol de cliente y los retorna a la vista
    public function usersList()
    {
        $data['values'] = User::where([['boolStatus', '=', '1'], ['boolAdminStatus', '=', '0']])->get();
        return view('FirstScreen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Variables para la vista
        $data['currentView'] = 'Create User';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'NetflixDetail', 'DisneyDetail');
        // URL del formulario
        $data['formURL'] = 'InsertUser';
        $data['title'] = 'Insertar Nuevo Registro en User';
        // Texto del boton del formulario
        $data['action'] = 'Insertar';

        return view('User.headerForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validando los campos
        $validator = $this->validator($request);

        // Verificando si la validacion es correcta o no
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);

        }else{

            // Instancia de User para la posterior insecion
            $user = new User();
            $user->texName = $request->input('texName');
            $user->boolStatus = $request->input('boolStatus');
            $user->boolAdminStatus = $request->input('boolAdminStatus');

            $user->save();

            return redirect(route('User'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id){

        // Variables para la vista
        $data['currentView'] = 'Actualizar User';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'NetflixDetail', 'DisneyDetail');
        // URL del formulario
        $data['formURL'] = 'UpdateUser';
        $data['title'] = 'Actualizar User';
        // Texto del boton del formulario
        $data['action'] = 'Actualizar';

        // Campos del formulario
        $data['values'] = User::where('id', $id)->get();

        return view('User.headerForm', $data);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // Validando los campos
        $validator = $this->validator($request);

        // Verificando si la validacion es correcta o no
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);

        }else{

            // Instancia de User para la posterior actualizacion
            $user = User::find($id);
            $user->texName = $request->input('texName');
            $user->boolStatus = $request->input('boolStatus');
            $user->boolAdminStatus = $request->input('boolAdminStatus');

            $user->save();

            return redirect(route('User'));
        }

    }
}
