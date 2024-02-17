<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\AuthMail;
use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Company::all();
        $data = User::paginate(10);
        return view('halaman_admin.pages.datauser.index', ['data' => $data, 'logo' => $logo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $logo = Company::all();

        return view('halaman_admin.pages.datauser.add', ['logo' => $logo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $str = Str::random(100);
        $request->validate([
            'fullname'  =>  'required|min:4',
            'email'     =>  'required|unique:users|email',
            'password'  =>  'required|min:5',
            'nomor'     =>  'required|min:9',
            'tgllahir'  =>  'required|date',
            'gambar'    =>  'required|image|file|max:2048'
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
            'gambar.max'            =>  'Ukuran File Gambar Terlalu Besar'
        ]);
        // Mengonversi tanggal ke format Y-m-d
        $formattedDate = date('Y-m-d', strtotime($request->tgllahir));

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'mimes:jpeg,jpg,png,gif|image|file|max:2048']);
            // $gambar_file        = $request->file('gambar');
            // $foto_ekstensi      = $gambar_file->extension();
            // $nama_foto          = $gambar_file->hashName() . $foto_ekstensi;
            // $gambar_file->storeAs('public/accounts', $gambar_file->hashName());
            // $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar_file = $request->file('gambar');
            $nama_foto = $gambar_file->hashName(); // Nama file yang di-hash dengan ekstensi otomatis
            $gambar_file->storeAs('public/accounts', $nama_foto); // Simpan gambar ke direktori yang ditentukan
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

        return redirect()->route('datauser.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = User::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.datauser.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->get();
        $logo = Company::all();

        return view(
            'halaman_admin.pages.datauser.edit',
            [
                'uc'    => $data,
                'logo'  => $logo,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $this->validate($request, [
            'fullname'  => 'required|min:4',
            'tgllahir'   => 'required|date',
            'nomor'     => 'required|min:9',
            'gambar'     => 'image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'fullname.required' => 'Nama Wajib Di isi',
            'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
            'gambar.image' => 'File Wajib Image',
            'gambar.file' => 'Wajib File',
            'gambar.max' => 'Bidang gambar tidak boleh lebih besar dari 2048 kilobyte',
            'tgllahir.required' => 'Harap Mengisi Tanggal Lahir',
            'tgllahir.date'     => 'Harap Mengisi Tanggal Lahir dengan Benar',
            'nomor.required' => 'Harap Mengisi Nomor Telepon',
            'nomor.min'     => 'Harap Mengisi minimal 10 angka Nomor'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $nama_foto = $gambar_file->hashName(); // Nama file yang di-hash dengan ekstensi otomatis
            $gambar_file->storeAs('public/accounts', $nama_foto); // Simpan gambar ke direktori yang ditentukan
            Storage::delete('public/accounts/' . $user->gambar);
            $user->gambar = $nama_foto;
        }

        // Convert the date format before saving to database
        $user->fullname = $request->fullname;
        $user->tgllahir = date('Y-m-d', strtotime($request->tgllahir)); // Convert the date format here
        $user->nomor    = $request->nomor;
        $user->password = $request->password;

        // Save the changes to the user
        $user->save();

        Session::flash('success', 'User berhasil diedit');

        return redirect()->route('datauser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        try {
            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus gambar pengguna dari penyimpanan
            Storage::delete('public/accounts/' . $user->gambar);

            // Hapus pengguna dari basis data
            $user->delete();

            // Tampilkan pesan sukses
            Session::flash('success', 'User telah dihapus.');
        } catch (ModelNotFoundException $exception) {
            // Tangani jika pengguna tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        // Redirect ke halaman indeks
        return redirect()->route('datauser.index');
    }
}
