<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use App\Models\mUserControl;
use App\Models\User;
use Database\Factories\MUserControlFactory;
use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    function index()
    {
        return view('halaman_admin.index');
    }
    function settings()
    {
        $data = mUserControl::all();
        return view('halaman_admin.setting', ['data' => $data]);
    }
    function datauser()
    {
        $data = mUserControl::all();
        return view('halaman_admin.datauser.index', ['data' => $data]);
    }
    function tambahuser()
    {
        return view('halaman_admin.datauser.tambah');
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
        $berita = berita::all();
        return view('halaman_admin.pages.berita', ['berita' => $berita, 'data' => $data]);
    }
    function table()
    {
        return view('halaman_admin.datauser.table');
    }
}
