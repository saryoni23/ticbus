<?php

namespace App\Http\Controllers;

use App\Models\DataBerita;
use Illuminate\Http\Request;
use App\Models\mUserControl;
use App\Models\User;
use Database\Factories\MUserControlFactory;
use Illuminate\Contracts\Session\Session;

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
    function tambahuser()
    {
        return view('pointakses.admin.datauser.tambah');
    }
    function edituser($id)
    {
        $data = User::find($id);
        return $data;
    }
    function hapususer(Request $request)
    {
        mUserControl::where('id', $request->id)->delete();

        return redirect('/datauser');
    }
    function databerita()
    {
        $data = mUserControl::all();
        $berita = DataBerita::all();
        return view('pointakses.admin.pages.berita', ['berita' => $berita, 'data' => $data]);
    }
    function table()
    {
        return view('pointakses.admin.datauser.table');
    }
}
