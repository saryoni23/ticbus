<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Berita;
use App\Models\Gambar;
use App\Models\Profil;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    //mengelola User
    function index()
    {
        $logo = Company::limit(1)->get();
        return view('halaman_admin.pages.home.index', [
            'logo' => $logo,
        ]);
    }
    function hapususer(Request $request)
    {
        User::where('id', $request->id)->delete();
        Session::flash('success', 'User Dihapus');
        return redirect()->route('datauser.index');
        //
    }

    public function profilshow(string $id): View
    {
        //get post by ID
        $post = Company::findOrFail($id);
        $logo = Company::limit(1)->get();

        //render view with post
        return view('halaman_admin.pages.profil.show', compact('post', 'logo'));
    }
    public function  profilupdate(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'isi'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Berita::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/' . $post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'judul'     => $request->judul,
                'isi'   => $request->isi
            ]);
        } else {

            //update post without image
            $post->update([
                'judul'     => $request->judul,
                'isi'   => $request->isi
            ]);
        }

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function store(string $id, string $gambar): View
    {
        // Ambil semua data profil
        $profil = Profil::all();

        // Ambil semua data gambar
        $gambar = Gambar::all();

        //render view with posts and gambar
        return view('halaman_admin.pages.profil.index', compact('posts', 'gambar'));
    }
    public function addgambar(Request $request)
    {
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        //upload image

        $image = $request->file('image');
        $image->storeAs('public/carosel', $image->hashName());

        //create post
        Gambar::create([
            'image'     => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('profilusaha.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function buatprofil(): View
    {
        //get posts
        $posts = Berita::latest()->paginate(5);
        $logo = Company::all();

        //render view with posts
        return view('halaman_admin.pages.profil.create', compact('posts', 'logo'));
    }
    public function buatprofilcreate(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_perusahaan'       => 'required|min:5',
            'singkatan_namausaha'   => 'required|min:5',
            'visi'                  => 'required|min:10',
            'isi'                   => 'required|min:10',
            'alamat'                => 'required|min:10',
            'kodepos'               => 'required|min:4',
            'logo'                  => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('logo')) {
            // Unggah gambar
            $gambar_file = $request->file('logo');

            // Periksa apakah terjadi kesalahan saat mengunggah gambar
            if ($gambar_file->isValid()) {
                $nama_foto = $gambar_file->hashName(); // Nama file yang di-hash dengan ekstensi otomatis
                $gambar_file->storeAs('public/logo', $nama_foto);

                // Buat profil
                Gambar::create([
                    'nama_perusahaan'       => $request->nama_perusahaan,
                    'singkatan_namausaha'   => $request->singkatan_namausaha,
                    'visi'                  => $request->visi,
                    'alamat'                => $request->alamat,
                    'kodepos'               => $request->kodepos,
                    'logo'                  => $nama_foto,
                ]);

                // Redirect ke indeks dengan pesan sukses
                return redirect()->route('profilusaha.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                // Jika terjadi kesalahan saat mengunggah gambar
                return redirect()->back()->withErrors(['logo' => 'Gagal mengunggah gambar.']);
            }
        } else {
            // Jika tidak ada file yang diunggah
            return redirect()->back()->withErrors(['logo' => 'Silakan unggah gambar.']);
        }
    }
}
