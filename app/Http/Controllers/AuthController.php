<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index()
    {
        return view('halaman_auth/login');
    }
    function login(Request $request)
    {
        $request->validate(
            [
                'email'     => 'required',
                'password'  => 'required',
            ],
            [
                'email.required'    => 'Email Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
            ]
        );

        $infologin = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->email_verified_at != null) {
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin')->with('success', 'Halo Admin, Anda Berhasil Login');
                } elseif (Auth::user()->role === 'user') {
                    return redirect()->route('user')->with('success', 'Halo, Anda Berhasil Login');
                } elseif (Auth::user()->role === 'karyawan') {
                    return redirect()->route('karyawan')->with('success', 'Halo  Anda Berhasil Login');
                }
            } else {
                Auth::logout();
                return redirect()->route('auth')->withErrors('Akun Anda Belum Aktif. Haraf Segera Verifikasi Terlebih Dahulu');
            }
            return "Login Success";
        } else {
            return redirect()->route('auth')->withErrors('Email atau Password Salah');
        }
    }
    function create()
    {
        return view('halaman_auth/register');
    }
    function register(Request $request)
    {
        $str = Str::random(100);
        $request->validate([
            'fullname'  =>  'required|min:5',
            'email'     =>  'required|unique:users|email',
            'password'  =>  'required|min:5',
            'nomor'     =>  'required|min:9',
            'gambar'    =>  'required|image|file'
        ], [
            'fullname.required'     =>  'Full Name Wajib Diisi',
            'fullname.min'          =>  'Full Name Minimal 5 Karakter',
            'email.required'        =>  'Email Wajib Diisi',
            'email.unique'          =>  'Email Sudah Terdaftar',
            'password.required'     =>  'Password Wajib Diisi',
            'password.min'          =>  'Full Name Minimal 6 Karakter',
            'nomor.required'        =>  'Nomor Telepon/Wa Wajib Diisi',
            'nomor.min'             =>  'Nomor Telepon/Wa Minimal 12 Karakter',
            'gambar.image'          =>  'Gambar yang di Upload Harus Image',
            'gambar.file'           =>  'Gambar Harus Berupa File',
        ]);

        $gambar_file        = $request->file('gambar');
        $gambar_ekstensi    = $gambar_file->extension();
        $nama_gambar        = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

        $inforegister = [
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'password'      => $request->password,
            'nomor'         => $request->nomor,
            'gambar'        => $nama_gambar,
            'tgllahir'      => $request->tgllahir,
            'verify_key'    => $str
        ];

        User::create($inforegister);

        $details = [
            'nama'      => $inforegister['fullname'],
            'nomor'     => $inforegister['nomor'],
            'role'      => 'user',
            'datetime'  => date('Y-m-d H:i:s'),
            'website'   => 'TicBus - Pendaftaran User Baru',
            'url'       => 'http://' . request()->getHttpHost() . "/" . "verify/" . $inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Link verfikasi Telah dikirim ke Email anda. Cek Email untuk Melakukan Verifikasi');
    }

    function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();



        if ($keyCheck) {
            $user = User::with('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success', 'Verifikasi Berhasil. Akun Anda sudah Aktif');
        } else {
            return redirect()->route('auth')->withErrors('keys Tidak valid. Pastikan Telah Melakukan Registrasi')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
