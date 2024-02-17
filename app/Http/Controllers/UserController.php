<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        $data = User::all();
        return view('halaman_user.pages.home.index', ['data' => $data]);
    }
}
