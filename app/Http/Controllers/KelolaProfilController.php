<?php

namespace App\Http\Controllers;


use App\Models\Profil;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;




class KelolaProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get posts
        $posts = Profil::all();
        $gambars = Gambar::all();


        //render view with posts
        return view('halaman_admin.pages.profil.index', compact('posts', 'gambars'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profil = Profil::all();
        return view('halaman_admin.pages.profil.poto.add', compact('profil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'profil_id'     => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/carosel', $image->hashName());

        //create post
        Gambar::create([
            'image'     => $image->hashName(),
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

        //render view with post
        return view('halaman_admin.pages.profil.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Profil::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.profil.edit', compact('post'));
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
            $image->storeAs('picture/logo/', $image->hashName());

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
        return redirect()->route('profilusaha.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
