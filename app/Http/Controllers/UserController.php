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
        $data['currentView'] = 'User';
        $data['views'] = array('PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('spotifyDetail', 'netflixDetail', 'disneyDetail');

        return view('User.index', $data);
    }

    public function usersList()
    {
        $data['values'] = DB::select('SELECT id, texName FROM User WHERE boolStatus = 1');

        return view('FirstScreen.index', $data);
    }
}
