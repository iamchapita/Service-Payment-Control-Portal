<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentDetailController extends Controller
{

    protected function validateData(Request $request)
    {
        // Estableciendo los nombres personalizados de los atributos
        $customAttributes = [
            'userInput' => 'Usuario',
            'serviceInput' => 'Servicio',
            'monthInput' => 'Mes',
            'moneyAmountInput' => 'Cuota',
            'payDateInput' => 'Fecha de Pago',
            'depositStatus' => 'Estado del Depósito',
            'depositDateInput' => 'Fecha de Depósito'
        ];

        // Excluyendo el token de los campos a validar
        $fields = $request->except('_token');

        // Estableciendo reglas de cada campo respectivamente
        $rules = array(
            'userInput' => ['required', 'numeric'],
            'serviceInput' => ['required', 'numeric'],
            'monthInput' => ['required', 'numeric'],
            'moneyAmountInput' => ['required', 'numeric'],
            'payDateInput' => ['required', 'date'],
            'depositStatus' => ['required', 'numeric'],
            'depositDateInput' => ['nullable', 'date']
        );

        // Mensajes personalizados para los errores
        $messages = array(
            'required' => 'El campo :attribute es requerido.',
            'numeric' => 'El campo :attribute es de tipo numerico',
            'date' => 'El campo :attribute es de tipo fecha.'
        );

        // Validando los datos
        $validator = Validator::make($fields, $rules, $messages);

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
        // Variables para la navbar
        $data['currentView'] = 'PaymentDetail';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['insertURL'] = 'createPaymentDetail';

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
        $query = 'SELECT( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 1 AND YEAR(PaymentDetail.datDate) = YEAR(CURRENT_TIMESTAMP())';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Variables para la navbar
        $data['currentView'] = 'Histórico Spotify';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['insertURL'] = 'createPaymentDetail';

        return view('PaymentDetail.historicalTable', $data);
    }
    /**
     * Display a listing of SpotifyDetail only.
     *
     * @return \Illuminate\Http\Response
     */
    public function netflixDetail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 2 AND YEAR(PaymentDetail.datDate) = YEAR(CURRENT_TIMESTAMP())';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Variables para la navbar
        $data['currentView'] = 'Histórico Netflix';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['insertURL'] = 'createPaymentDetail';

        return view('PaymentDetail.historicalTable', $data);
    }
    /**
     * Display a listing of SpotifyDetail only.
     *
     * @return \Illuminate\Http\Response
     */
    public function disneyDetail()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id,( select User.texName from User where User.id = PaymentDetail.idUserFK ) AS Usuario, ( select Service.texName from Service where Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( select Month.texName from Month where Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail join ( select User.id AS id from User where User.boolStatus = 1 ) UserInner on ( PaymentDetail.idUserFK = UserInner.id ) ) WHERE PaymentDetail.idServiceFK = 3 AND YEAR(PaymentDetail.datDate) = YEAR(CURRENT_TIMESTAMP())';

        // Datos de consulta SQL
        $data['values'] = DB::select($query);
        // Variables para la navbar
        $data['currentView'] = 'Histórico Disney+';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['insertURL'] = 'createPaymentDetail';

        return view('PaymentDetail.historicalTable', $data);
    }

    /**
     * Display a list of payments of user.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userDetail(Request $request)
    {

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
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Variables para la navbar
        $data['currentView'] = 'Create PaymentDetail';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['formURL'] = 'insertPaymentDetail';
        $data['title'] = 'Insertar Nuevo Registro en PaymentDetail';

        // Datos para los campos del form
        $data['users'] = DB::select('SELECT id, texName FROM User WHERE boolStatus = ? AND boolAdminStatus = ?', [1, 0]);
        $data['services'] = DB::select('SELECT id, texName FROM Service');
        $data['months'] = DB::select('SELECT id, texName FROM Month ORDER BY id');
        $data['depositState'] = array('Pendiente', 'Depósito Realizado');
        $data['action'] = 'Insertar';

        return view('PaymentDetail.headerForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validando los datos recibidos del formulario
        $validator = PaymentDetailController::validateData($request);
        // Exclusion del toke CSRF
        $fields = $request->except('_token');

        if ($validator->fails()) {
            return redirect(route('createPaymentDetail'))->withErrors($validator);

        } else {

            // Desempaquetado de variables para introduccion en consulta sql
            $idUserFK = $fields['userInput'];
            $idServiceFK = $fields['serviceInput'];
            $idMonthFK = $fields['monthInput'];
            $numPaid = $fields['moneyAmountInput'];
            $datDate = $fields['payDateInput'];
            $boolDeposited = $fields['depositStatus'];

            // Comprobando que la fecha de Depósito se ingreso o no
            if (key_exists('depositDateInput', $fields)) {
                $datDepositedDate = $fields['depositDateInput'];
            } else {
                $datDepositedDate = null;
            }

            DB::insert('INSERT INTO PaymentDetail (idUserFK, idServiceFK, idMonthFK, numPaid, datDate, boolDeposited, datDepositedDate) values (?, ?, ? , ?, ?, ?, ?)', [$idUserFK, $idServiceFK, $idMonthFK, $numPaid, $datDate, $boolDeposited, $datDepositedDate]);

            // Se redirecciona a la ruta especificada
            return redirect(route('historicalDetail'));

        }
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
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');
        $data['title'] = 'Editar Registro en PaymentDetail';
        // Obteniendo la informacion a editar
        $data['values'] = DB::select('SELECT * FROM PaymentDetail WHERE id = ?', [$id]);
        // Obteniendo la informacion de los select
        $data['users'] = DB::select('SELECT id, texName FROM User WHERE boolStatus = ? AND boolAdminStatus = ?', [1, 0]);
        $data['services'] = DB::select('SELECT id, texName FROM Service');
        $data['months'] = DB::select('SELECT id, texName FROM Month ORDER BY id');
        $data['depositState'] = array('Pendiente', 'Depósito Realizado');
        // Estableciendo que ruta tendra el form
        $data['formURL'] = 'updatePaymentDetail';
        // Estableciendo el nombre del boton que tendra el form
        $data['action'] = 'Editar';

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
        // Validando los datos recibidos del formulario
        $validator = PaymentDetailController::validateData($request);
        // Exclusion del toke CSRF
        $fields = $request->except('_token');

        if ($validator->fails()) {
            return redirect(route('createPaymentDetail'))->withErrors($validator);

        } else {

            // Desempaquetado de variables para introduccion en consulta sql
            $idUserFK = $fields['userInput'];
            $idServiceFK = $fields['serviceInput'];
            $idMonthFK = $fields['monthInput'];
            $numPaid = $fields['moneyAmountInput'];
            $datDate = $fields['payDateInput'];
            $boolDeposited = $fields['depositStatus'];

            // Comprobando que la fecha de Depósito se ingreso o no
            if (key_exists('depositDateInput', $fields)) {
                $datDepositedDate = $fields['depositDateInput'];
            } else {
                $datDepositedDate = null;
            }

            DB::update('UPDATE PaymentDetail SET idUserFK = ?, idServiceFK = ?, idMonthFK = ?, numPaid = ?, datDate = ?, boolDeposited = ?, datDepositedDate = ? WHERE id = ?', [$idUserFK, $idServiceFK, $idMonthFK, $numPaid, $datDate, $boolDeposited, $datDepositedDate, $id]);

            // Se redirecciona a la ruta especificada
            return redirect(route('historicalDetail'));
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
        return redirect(route('historicalDetail'));
    }
}
