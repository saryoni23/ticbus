<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\Berita;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;




class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get posts
        $posts = Berita::latest()->paginate(5);
        $logo = Company::all();

        //render view with posts
        return view('halaman_admin.pages.posts.index', compact('posts', 'logo'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $logo = Company::all();
        return view('halaman_admin.pages.posts.create', ['logo' => $logo]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'isi'       => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Berita::create([
            'image'     => $image->hashName(),
            'judul'     => $request->judul,
            'isi'       => $request->isi,
            'user_id'   => '1',
        ]);

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $logo = Company::all();
        $post = Berita::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.posts.show', compact('post', 'logo'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $logo = Company::all();
        $post = Berita::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.posts.edit', compact('post', 'logo'));
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
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Berita::findOrFail($id);

        //delete image
        Storage::delete('public/posts/' . $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
