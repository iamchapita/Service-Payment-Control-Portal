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
        $fields['values'] = DB::select('SELECT id, texName, boolStatus FROM User ORDER BY boolStatus DESC');
        $fields['view'] = 'User';
        return view('User.index', $fields);
    }
}
