<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\request;

class UproleController extends Controller
{
    public function index()
    {
    }
    function uprole($id)
    {
        $data = User::find($id);
        $data->role = 'karyawan';
        $data->save();
        return redirect('/datauser')->with('success', 'Berhasil Mengubah Role.');
    }
}
