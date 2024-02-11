<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\berita;
use Illuminate\Http\Request;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    function index()
    {
        return view('halaman_admin.index');
    }
    function settings()
    {
        $data = User::all();
        return view('halaman_admin.setting', ['data' => $data]);
    }
    function datauser()
    {
        $data = User::all();
        return view('halaman_admin.datauser.index', ['data' => $data]);
    }
    function addUser()
    {
        $data = User::all();
        return view('halaman_admin.modal.addUser', ['title' => 'Tambah User']);
    }
    function edituser($id)
    {
        $data = User::find($id);
        return $data;
    }
    function hapususer(Request $request)
    {
        User::where('id', $request->id)->delete();

        return redirect('/datauser');
    }
    function databerita()
    {
        $data = User::all();
        $berita = artikel::all();
        return view('halaman_admin.pages.berita', ['berita' => $berita, 'data' => $data]);
    }
    function table()
    {
        return view('halaman_admin.datauser.table');
    }
}
