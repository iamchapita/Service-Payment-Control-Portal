<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['values'] = User::all(['id', 'texName', 'boolStatus'])->sortBy('boolStatus');
        $data['currentView'] = 'User';
        $data['views'] = array('Dashboard', 'PaymentDetail', 'User', 'Service');
        $data['elementsDropdown'] = array('Histórico Spotify', 'Histórico Netflix', 'Histórico Disney+');
        $data['elementsDropdownLinks'] = array('SpotifyDetail', 'NetflixDetail', 'DisneyDetail');

        return view('User.index', $data);
    }

    public function usersList()
    {
        $data['values'] = User::where([['boolStatus', '=', '1'], ['boolAdminStatus', '=', '0']])->get();
        return view('FirstScreen.index', $data);
    }

    public static function updatePassword($password)
    {
        $user = User::where('boolAdminStatus', '1')->first();
        // $user->password = Hash::make($password);
        $user->password = $password;
        $user->save();
    }
}
