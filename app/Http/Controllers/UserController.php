<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['values'] = DB::select('SELECT id, texName, boolStatus FROM User ORDER BY boolStatus DESC');
        $data['current'] = 'User';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Historico Spotify', 'Historico Netflix', 'Historico Disney+');$data['elementsDropdownLinks'] = array('PaymentDetail/SpotifyDetail', 'PaymentDetail/NetflixDetail', 'PaymentDetail/DisneyDetail');

        return view('User.index', $data);
    }
}
