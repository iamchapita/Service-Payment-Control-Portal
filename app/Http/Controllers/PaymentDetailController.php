<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Estableciendo la consulta para mostrar valores en lugar de llaves foraneas
        $query = 'SELECT ( SELECT PD.id FROM PaymentDetail as PD WHERE PaymentDetail.id = PD.id ) as id, ( SELECT User.texName FROM User WHERE User.id = PaymentDetail.idUserFK ) AS Usuario, ( SELECT Service.texName FROM Service WHERE Service.id = PaymentDetail.idServiceFK ) AS Servicio, ( SELECT Month.texName FROM Month WHERE Month.id = PaymentDetail.idMonthFK ) AS Mes, PaymentDetail.datDate AS Fecha, PaymentDetail.numPaid AS Pago, PaymentDetail.boolDeposited AS Estado, PaymentDetail.datDepositedDate AS FechaDeposito FROM ( PaymentDetail JOIN( SELECT User.id AS id FROM User WHERE User.boolStatus = 1 ) UserInner ON ( PaymentDetail.idUserFK = UserInner.id ) ) ';

        // Variable de envio de datos a renderizar en la vista
        $data['values'] = DB::select($query);
        $data['currentView'] = 'PaymentDetail';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');

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

        // Variable de envio de datos a renderizar en la vista
        $data['values'] = DB::select($query);
        $data['currentView'] = 'Histórico Spotify';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');

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

        // Variable de envio de datos a renderizar en la vista
        $data['values'] = DB::select($query);
        $data['currentView'] = 'Histórico Netflix';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');

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

        // Variable de envio de datos a renderizar en la vista
        $data['values'] = DB::select($query);
        $data['currentView'] = 'Histórico Disney+';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');

        return view('PaymentDetail.historicalTable', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PaymentDetail $paymentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentDetail $paymentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentDetail $paymentDetail)
    {
        //
    }
}
