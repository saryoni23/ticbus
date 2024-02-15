<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

use App\Mail\AuthMail;


class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('halaman_admin.pages.datauser.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $str = Str::random(100);
        $request->validate([
            'fullname'  =>  'required|min:4',
            'email'     =>  'required|unique:users|email',
            'password'  =>  'required|min:5',
            'nomor'     =>  'required|min:9',
            'tgllahir'  =>  'required|date',
            'gambar'    =>  'required|image|file'
        ], [
            'fullname.required'     =>  'Full Name Wajib Diisi',
            'fullname.min'          =>  'Full Name Minimal 5 Karakter',
            'fullname.required'     =>  'Tanggal Lahir Wajib Diisi',
            'email.required'        =>  'Email Wajib Diisi',
            'email.unique'          =>  'Email Sudah Terdaftar',
            'password.required'     =>  'Password Wajib Diisi',
            'password.min'          =>  'Full Name Minimal 6 Karakter',
            'nomor.required'        =>  'Nomor Telepon/Wa Wajib Diisi',
            'nomor.min'             =>  'Nomor Telepon/Wa Minimal 12 Karakter',
            'gambar.image'          =>  'Gambar yang di Upload Harus Image',
            'gambar.file'           =>  'Gambar Harus Berupa File',
        ]);
        // Mengonversi tanggal ke format Y-m-d
        $formattedDate = date('Y-m-d', strtotime($request->tgllahir));

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'mimes:jpeg,jpg,png,gif|image|file|max:1024']);
            $gambar_file        = $request->file('gambar');
            $foto_ekstensi      = $gambar_file->extension();
            $nama_foto          = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar = $nama_foto;
        } else {
            $gambar = "user.png";
        }

        $accounts = User::create([
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'password'      => $request->password,
            'nomor'         => $request->nomor,
            'gambar'        => $gambar,
            'tgllahir'      => $formattedDate,
            'verify_key'    => $str
        ]);


        $details = [
            'nama'      => $accounts->fullname,
            'nomor'     => $accounts->nomor,
            'role'      => 'user',
            'tgllahir'  => $accounts->tgllahir,
            'datetime'  => date('Y-m-d H:i:s'),
            'website'   => 'TicBus - Pendaftaran User Baru',
            'url'       => 'http://' . request()->getHttpHost() . "/" . "verify/" . $accounts->verify_key,
        ];

        Mail::to($request->email)->send(new AuthMail($details));

        Session::flash('success', 'User berhasil ditambahkan , Harap verifikasi akun sebelum di gunakan.');

        return redirect('/datauser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('halaman_admin.pages.datauser.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->get();
        return view(
            'halaman_admin.pages.datauser.edit',
            [
                'uc' => $data,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fullname'  => 'required|min:4',
            'tgllahir'  =>  'required|date',
            'nomor'     =>  'required|min:9',
            'gambar'    => 'image|file|max:1024',


        ], [
            'fullname.required' => 'Nama Wajib Di isi',
            'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
            'gambar.image' => 'File Wajib Image',
            'gambar.file' => 'Wajib File',
            'gambar.max' => 'Bidang gambar tidak boleh lebih besar dari 1024 kilobyte',
        ]);


        $user = User::find($request->id);


        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('gambar'), $nama_foto);
            $user->gambar = $nama_foto;
        }

        $user->fullname = $request->fullname;
        $user->tgllahir = $request->tgllahir;
        $user->nomor    = $request->nomor;
        $user->password = $request->password;

        // Simpan perubahan pada pengguna
        $user->save();




        Session::flash('success', 'User berhasil diedit');

        return redirect('/datauser');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $destroy = User::where('id', $request->id)->delete();
        Storage::delete('public/posts/' . $destroy->image);
        Session::flash('success', 'User Dihapus');
        return redirect('/datauser');
    }
}
