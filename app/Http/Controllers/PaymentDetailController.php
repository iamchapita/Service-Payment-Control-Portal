<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PaymentDetailController extends Controller
{

    protected function validateData($request)
    {
        // Obteniendo el id de los usuarios
        $users = DB::table('User')->where('boolStatus', '=', '1')->get('id');
        $usersId = [];

        foreach ($users as $user => $value) {
            array_push($usersId, $value->id);
        }

        // Obteniendo el id de los servicios
        $services = DB::table('Service')->get('id');
        $servicesId = [];

        foreach ($services as $service => $value) {
            array_push($servicesId, $value->id);
        }

        // Extrayendo las llaves del arreglo de campos a validar
        $keys = array_keys($request);

        // Estableciendo los nombres personalizados de los atributos
        $customAttributes = array(
            $keys[0] => 'Usuario',
            $keys[1] => 'Servicio',
            $keys[2] => 'Mes',
            $keys[3] => 'Fecha de Pago',
            $keys[4] => 'Cuota',
            $keys[5] => 'Estado del Depósito',
        );

        // Estableciendo reglas de cada campo respectivamente
        $rules = array(
            $keys[0] => ['required', 'numeric', Rule::in($usersId)],
            $keys[1] => ['required', 'numeric', Rule::in($servicesId)],
            $keys[2] => ['required', 'numeric', 'min:1', 'max:12'],
            $keys[3] => ['required', 'date'],
            $keys[4] => ['required', 'numeric', 'min:1'],
            $keys[5] => ['required', 'numeric', 'min:0', 'max:1'],
        );

        // Si el campo depositDateInput contiene datos
        if (count($keys) == 7) {

            $customAttributes[$keys[6]] = 'Fecha del Depósito';
            $rules[$keys[6]] = ['required', 'date'];
        }

        // Mensajes personalizados para los errores
        $messages = array(
            'required' => 'El campo :attribute es requerido.',
            'numeric' => 'El campo :attribute es de tipo numerico',
            'date' => 'El campo :attribute es de tipo fecha.',
            'min' => 'El campo :attribute está fuera de rango.',
            'max' => 'El campo :attribute está fuera de rango.',
        );

        /*
        Validando los datos
        $fields -> Campos del formulario.
        $rules -> Reglas para validar campos.
        $messages -> Mensajes personalizados para mostrar en caso de error.
         */
        $validator = Validator::make($request, $rules, $messages);

        // Estableciendo los nombres de los atributos
        $validator->setAttributeNames($customAttributes);

        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id, ( SELECT User.texName FROM User WHERE User.id = PaymentDetail.idUserFK ) AS Usuario, ( SELECT Service.texName FROM Service WHERE Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( SELECT Month.texName FROM Month WHERE Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail JOIN( SELECT User.id AS id FROM User WHERE User.boolStatus = 1 ) UserInner ON ( PaymentDetail.idUserFK = UserInner.id ) ) ';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Datos para el combobox de años
        $data['years'] = DB::select('SELECT DISTINCT(YEAR(datDate)) as "year" FROM PaymentDetail;');
        // Variables para la navbar
        $data['currentView'] = 'PaymentDetail';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['insertURL'] = 'CreatePaymentDetail';
        // Numero maximo de registros a la vez
        $data['numRegisters'] = 12;
        // URL de filterAndButton
        $data['route'] = "CreatePaymentDetail";

        return view('PaymentDetail.historicalTable', $data);
    }

    /**
     * Display a listing of SpotifyDetail only.
     *
     * @return \Illuminate\Http\Response
     */

    public function spotifyDetail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 1';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Datos para el combobox de años
        $data['years'] = DB::select('SELECT DISTINCT(YEAR(datDate)) as "year" FROM PaymentDetail;');
        // Variables para la navbar
        $data['currentView'] = 'Histórico Spotify';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['insertURL'] = 'CreatePaymentDetail';
        // Numero maximo de registros a la vez
        $data['numRegisters'] = 12;

        return view('PaymentDetail.historicalTable', $data);
    }
    /**
     * Display a listing of SpotifyDetail only.
     *
     * @return \Illuminate\Http\Response
     */

    public function spotify2Detail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 4';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Datos para el combobox de años
        $data['years'] = DB::select('SELECT DISTINCT(YEAR(datDate)) as "year" FROM PaymentDetail;');
        // Variables para la navbar
        $data['currentView'] = 'Histórico Spotify';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['insertURL'] = 'CreatePaymentDetail';
        // Numero maximo de registros a la vez
        $data['numRegisters'] = 12;

        return view('PaymentDetail.historicalTable', $data);
    }
    /**
     * Display a listing of NetflixDetail only.
     *
     * @return \Illuminate\Http\Response
     */
    public function netflixDetail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 2 ';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Datos para el combobox de años
        $data['years'] = DB::select('SELECT DISTINCT(YEAR(datDate)) as "year" FROM PaymentDetail;');
        // Variables para la navbar
        $data['currentView'] = 'Histórico Netflix';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['insertURL'] = 'CreatePaymentDetail';
        // Numero maximo de registros a la vez
        $data['numRegisters'] = 12;

        return view('PaymentDetail.historicalTable', $data);
    }
    /**
     * Display a listing of DisneyDetail only.
     *
     * @return \Illuminate\Http\Response
     */
    public function disneyDetail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 3';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Datos para el combobox de años
        $data['years'] = DB::select('SELECT DISTINCT(YEAR(datDate)) as "year" FROM PaymentDetail;');
        // Variables para la navbar
        $data['currentView'] = 'Histórico Disney+';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['insertURL'] = 'CreatePaymentDetail';
        // Numero maximo de registros a la vez
        $data['numRegisters'] = 12;

        return view('PaymentDetail.historicalTable', $data);
    }

    /**
     * Display a list of payments of user.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userDetail(Request $request)
    {

        if ($request->userSelect) {
            // Obtiene el id del Usuario, obtenido desde el select
            $id = $request->userSelect;

            $query = 'SELECT(select User.texName from User where User.id = PaymentDetail.idUserFK) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE UserInner.id = X AND YEAR(PaymentDetail.datDate) = YEAR(CURRENT_TIMESTAMP())';

            // Reemplaza la X en la query por el id del usuario
            $query = Str::replace('X', $id, $query);
            // Datos de consulta SQL
            $data['values'] = DB::select($query);
            // Variable para la navbar
            $data['currentView'] = 'Histórico de Pago';

            return view('PaymentDetail.userDetailTable', $data);
        } else {
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rows = $request->numRegisters;

        if ($rows >= 1 && $rows <= 12) {
            // Variables para la navbar
            $data['currentView'] = 'Create PaymentDetail';
            $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
            $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
            $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
            $data['formURL'] = 'InsertPaymentDetail';
            $data['title'] = 'Insertar Nuevo Registro en PaymentDetail';

            // Datos para los campos del form
            $data['users'] = DB::select('SELECT id, texName FROM User WHERE boolStatus = ? AND boolAdminStatus = ?', [1, 0]);
            $data['services'] = DB::select('SELECT id, texName FROM Service');
            $data['months'] = DB::select('SELECT id, texName FROM Month ORDER BY id');
            $data['depositState'] = array('Pendiente', 'Depósito Realizado');
            $data['action'] = 'Insertar';
            $data['inputsName'] = $rows;

            return view('PaymentDetail.headerForm', $data);
        } else {
            return redirect(route('PaymentDetail'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Extraccion de numero de registros a insertar
        $rows = $request->rows;
        // Contenedor de los errores del formulario
        $errors = null;

        for ($i = 1; $i <= $rows; $i++) {

            // Extraccion de campos a validar
            $fields = $request->only("userInput" . $i, "serviceInput" . $i, "monthInput" . $i, "payDateInput" . $i, "moneyAmountInput" . $i, "depositStatus" . $i, "depositDateInput" . $i);

            // Validando campos
            $validator = PaymentDetailController::validateData($fields);

            // Comprobando la validacion
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
            }

            // Desempaquetado de variables para introduccion en consulta sql
            $idUserFK = $fields['userInput' . $i];
            $idServiceFK = $fields['serviceInput' . $i];
            $idMonthFK = $fields['monthInput' . $i];
            $numPaid = $fields['moneyAmountInput' . $i];
            $datDate = $fields['payDateInput' . $i];
            $boolDeposited = $fields['depositStatus' . $i];

            // Comprobando que la fecha de Depósito se ingreso o no
            if (key_exists('depositDateInput' . $i, $fields)) {
                $datDepositedDate = $fields['depositDateInput' . $i];
            } else {
                $datDepositedDate = null;
            }

            DB::insert('INSERT INTO PaymentDetail (idUserFK, idServiceFK, idMonthFK, numPaid, datDate, boolDeposited, datDepositedDate) values (?, ?, ? , ?, ?, ?, ?)', [$idUserFK, $idServiceFK, $idMonthFK, $numPaid, $datDate, $boolDeposited, $datDepositedDate]);
        }
        // Se redirecciona a la ruta especificada
        return redirect(route('PaymentDetail'))->withErrors($errors);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentDetail $paymentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // Estableciendo variables que se retornaran a la vista
        $data['currentView'] = 'Editar PaymentDetail';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Spotify 2', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'Spotify2Detail', 'NetflixDetail', 'DisneyDetail');
        $data['title'] = 'Editar Registro en PaymentDetail';
        // Obteniendo la informacion a editar
        $data['values'] = DB::select('SELECT * FROM PaymentDetail WHERE id = ?', [$id]);
        // Obteniendo la informacion de los select
        $data['users'] = DB::select('SELECT id, texName FROM User WHERE boolStatus = ? AND boolAdminStatus = ?', [1, 0]);
        $data['services'] = DB::select('SELECT id, texName FROM Service');
        $data['months'] = DB::select('SELECT id, texName FROM Month ORDER BY id');
        $data['depositState'] = array('Pendiente', 'Depósito Realizado');
        // Estableciendo que ruta tendra el form
        $data['formURL'] = 'UpdatePaymentDetail';
        // Estableciendo el nombre del boton que tendra el form
        $data['action'] = 'Actualizar';

        return view('PaymentDetail.headerForm', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        // Exclusion del toke CSRF
        $fields = $request->except('_token', '_method');
        // Validando los datos recibidos del formulario
        $validator = PaymentDetailController::validateData($fields);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            // Desempaquetado de variables para introduccion en consulta sql
            $idUserFK = $fields['userInput1'];
            $idServiceFK = $fields['serviceInput1'];
            $idMonthFK = $fields['monthInput1'];
            $numPaid = $fields['moneyAmountInput1'];
            $datDate = $fields['payDateInput1'];
            $boolDeposited = $fields['depositStatus1'];

            // Comprobando que la fecha de Depósito se ingreso o no
            if (key_exists('depositDateInput1', $fields)) {
                $datDepositedDate = $fields['depositDateInput1'];
            } else {
                $datDepositedDate = null;
            }

            DB::update('UPDATE PaymentDetail SET idUserFK = ?, idServiceFK = ?, idMonthFK = ?, numPaid = ?, datDate = ?, boolDeposited = ?, datDepositedDate = ? WHERE id = ?', [$idUserFK, $idServiceFK, $idMonthFK, $numPaid, $datDate, $boolDeposited, $datDepositedDate, $id]);

            // Se redirecciona a la ruta especificada
            return redirect(route('PaymentDetail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // Buscando en la Base de Datos
        DB::delete('DELETE FROM PaymentDetail WHERE id = ?', [$id]);
        return redirect(route('PaymentDetail'));
    }
}
