<?php

namespace App\Http\Controllers;

use App\Models\DataBerita;
use Illuminate\Http\Request;
use App\Models\mUserControl;
use Database\Factories\MUserControlFactory;

class AdminController extends Controller
{
    function index()
    {
        return view('pointakses.admin.index');
    }
    function settings()
    {
        $data = mUserControl::all();
        return view('pointakses.admin.setting', ['data' => $data]);
    }
    function datauser()
    {
        $data = mUserControl::all();
        return view('pointakses.admin.datauser.index', ['data' => $data]);
    }
    function databerita()
    {
        $data = mUserControl::all();
        $berita = DataBerita::all();
        return view('pointakses.admin.pages.berita', ['berita' => $berita, 'data' => $data]);
    }
}
