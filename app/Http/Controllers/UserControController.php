<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControController extends Controller
{
    function index(){
        return view('user_control.index');
    }
}
