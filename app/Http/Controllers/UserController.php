<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mUserControl;

class UserController extends Controller
{
    function index()
    {
        $data = mUserControl::all();
        return view('halaman_user.index', ['data' => $data]);
    }
}
