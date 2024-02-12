<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\company;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthMail;




use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    //mengelola User
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
        return view('halaman_admin.pages.datauser.index', ['data' => $data]);
    }
    function tambah()
    {
        return view('halaman_admin.pages.datauser.add');
    }
    function create(Request $request)
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
    function edituser($id)
    {
        $data = User::where('id', $id)->get();
        return view(
            'halaman_admin.pages.datauser.edit',
            [
                'uc' => $data,
            ]
        );
    }
    function change(Request $request)
    {
        $request->validate([
            'gambar' => 'image|file|max:1024',
            'fullname' => 'required|min:4',
            'tgllahir'  =>  'required|date',
            'nomor'     =>  'required|min:9',


        ], [
            'gambar.image' => 'File Wajib Image',
            'gambar.file' => 'Wajib File',
            'gambar.max' => 'Bidang gambar tidak boleh lebih besar dari 1024 kilobyte',
            'fullname.required' => 'Nama Wajib Di isi',
            'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
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
        $user->fullname = $request->tgllahir;
        $user->fullname = $request->nomor;
        $user->password = $request->password;
        $user->save();

        Session::flash('success', 'User berhasil diedit');

        return redirect('/datauser');
    }
    function hapususer(Request $request)
    {
        User::where('id', $request->id)->delete();
        Session::flash('success', 'User Dihapus');
        return redirect('/datauser');
    }

    //mengelola Berita
    function databerita()
    {
        $data = User::all();
        $berita = artikel::all();
        return view(
            'halaman_admin.pages.berita.index',
            ['berita' => $berita, 'data' => $data]
        );
    }
    // function addberita(Request $request)
    // {
    //     artikel::where('id', $request->id)->();

    //     return redirect('/databerita');
    // }
    function editberita($id)
    {
        $data = artikel::find($id);

        return view('halaman_admin.pages.berita.editberita', ['berita' => $data]);
    }
    function hapusberita(Request $request)
    {
        artikel::where('id', $request->id)->delete();
        // $request->session()->flash('status', 'Task was successful!');
        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('/databerita');
    }




    // mengelola Profil Perusahaan
    function kelolaprofil()
    {
        $profil = company::all();


        return view(
            'halaman_admin.pages.profil.index',
            [
                'profil' => $profil,

            ]

        );
    }
}
