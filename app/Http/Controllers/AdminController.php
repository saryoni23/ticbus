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
use App\Models\Berita;
use App\Models\Gambar;
use App\Models\Profil;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    //mengelola User
    function index()
    {
        return view('halaman_admin.pages.home.index');
    }
    function settings()
    {
        $data = User::all();
        return view('halaman_admin.setting', ['data' => $data]);
    }
    function datauser()
    {
        //
    }
    function tambah()
    {
        // 
    }
    function create(Request $request)
    {
        //   
    }
    function edituser($id)
    {
        //
    }
    function change(Request $request)
    {
        //
    }
    function hapususer(Request $request)
    {
        //
    }

    //mengelola Berita
    function databerita()
    {
        //
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

    public function profilshow(string $id): View
    {
        //get post by ID
        $post = company::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.profil.show', compact('post'));
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
}
