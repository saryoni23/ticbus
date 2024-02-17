<?php

namespace App\Http\Controllers\HalamanDepan;


use App\Models\Profil;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Session;


class KelolaProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Dapatkan data profil, gambar, dan logo
        $posts = Profil::all();
        $gambars = Gambar::all();
        $logo = Company::all();

        // Render view dengan data
        return view('halaman_admin.pages.profil.index', compact('posts', 'gambars', 'logo'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profil = Profil::all();
        $logo = Company::all();

        return view('halaman_admin.pages.profil.poto.add', compact('profil', 'logo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:4096',
            'profil_id'     => 'required'
        ]);

        //upload image
        $image  = $request->file('image');
        $image_name  = date('ymdhis') . "." . $image;
        $image->storeAs('public/carosel');

        //create post
        Gambar::create([
            'image'     => $image_name,
            'profil_id'   => '2',
        ]);

        //redirect to index
        return redirect()->route('profilusaha.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {

        //get post by ID
        $post = Profil::findOrFail($id);
        $logo = Company::all();

        //render view with post
        return view('halaman_admin.pages.profil.show', compact('post', 'logo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Profil::findOrFail($id);
        $logo = Company::all();

        //render view with post
        return view('halaman_admin.pages.profil.edit', compact('post', 'logo'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'logo'                  => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_perusahaan'       => 'required|min:5',
            'singkatan_namausaha'   => 'required|min:5',
            'visi'                  => 'required|min:5',
            'isi'                   => 'required|min:10'
        ]);

        //get post by ID
        $post = Profil::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('logo')) {

            //upload new image
            $image = $request->file('logo');
            $image->storeAs('public/logo/', $image->hashName());

            //delete old image
            Storage::delete('picture/logo/' . $post->image);

            //update post with new image
            $post->update([
                'logo'                  => $image->hashName(),
                'nama_perusahaan'       => $request->nama_perusahaan,
                'singkatan_namausaha'   => $request->singkatan_namausaha,
                'visi'                  => $request->visi,
                'isi'                   => $request->isi
            ]);
        } else {

            //update post without image
            $post->update([
                'nama_perusahaan'       => $request->nama_perusahaan,
                'singkatan_namausaha'   => $request->singkatan_namausaha,
                'visi'                  => $request->visi,
                'isi'                   => $request->isi
            ]);
        }

        //redirect to index
        return redirect()->route('profilusaha.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Gambar::findOrFail($id);

        //delete image
        Storage::delete('public/carosel/' . $post->image);

        //delete post
        $post->delete();

        //redirect to index
        Session::flash('success', 'User Dihapus');
        return redirect()->route('profilusaha.index');
    }
}
