<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mUserControl;

class UserController extends Controller
{
    function index()
    {
        $data = mUserControl::all();
        return view('pointakses/user/index', ['data' => $data]);
    }
}
