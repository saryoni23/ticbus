<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Company;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;




class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get posts
        $posts = Tiket::latest()->paginate(5);
        $categories = Kategori::all();
        $logo = Company::all();




        //render view with posts
        return view('halaman_admin.pages.tiket.index', compact('posts', 'logo'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Kategori::all();
        $rute = Rute::all();
        $logo = Company::all();

        return view('halaman_admin.pages.tiket.create', compact('categories', 'rute', 'logo'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'nama_tiket'   => 'required|min:5',
            'jenis_tiket'  => 'required',
            'harga_tiket'  => 'required|min:2',
            'jumlah_tiket' => 'required|min:1'
        ], [
            'nama_tiket.required'  => 'Nama Tiket Wajib Diisi',
            'nama_tiket.min'       => 'Nama Tiket Minimal 5 Karakter',
            'jenis_tiket.required' => 'Jenis Tiket Wajib Diisi',
            'harga_tiket.required' => 'Harga Tiket Wajib Diisi',
            'harga_tiket.min'      => 'Harga Tiket Minimal 4 Karakter',

            'jumlah_tiket.required' => 'Jumlah Tiket Wajib Diisi',
            'jumlah_tiket.min'     => 'Jumlah Tiket Minimal 1 Karakter',
        ]);

        $harga_tiket = str_replace('.', '', $request->input('harga_tiket'));

        // Create Tiket
        Tiket::create([
            'name_tiket'    => $request->nama_tiket,
            'jenis_tiket'   => $request->jenis_tiket,
            'harga_tiket'   => $harga_tiket,
            'categori_id'   => $request->categori_id,
            'rute_id'       => $request->rute_id,
            'jumlah_tiket'  => $request->jumlah_tiket,
        ]);

        // Flash success message
        Session::flash('success', 'Tiket Berhasil Ditambahkan');

        // Redirect back to index
        return redirect()->route('kelolatiket.index');
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
        $post = Berita::findOrFail($id);


        //render view with post
        return view('halaman_admin.pages.tiket.show', compact('post'));
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
        $post = Tiket::findOrFail($id);
        $categories = Kategori::all();
        $rute = Rute::all();
        $logo = Company::all();

        //render view with post
        return view('halaman_admin.pages.tiket.edit', compact('post', 'categories', 'rute', 'logo'));
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
            'nama_tiket'   => 'required|min:5',
            'jenis_tiket'  => 'required',
            'harga_tiket'  => 'required|min:2',
            'jumlah_tiket' => 'required|min:1'
        ], [
            'nama_tiket.required'  => 'Nama Tiket Wajib Diisi',
            'nama_tiket.min'       => 'Nama Tiket Minimal 5 Karakter',
            'jenis_tiket.required' => 'Jenis Tiket Wajib Diisi',
            'harga_tiket.required' => 'Harga Tiket Wajib Diisi',
            'harga_tiket.min'      => 'Harga Tiket Minimal 2 Karakter',
            'jumlah_tiket.required' => 'Jumlah Tiket Wajib Diisi',
            'jumlah_tiket.min'     => 'Jumlah Tiket Minimal 1 Karakter',
        ]);

        //get post by ID
        $tiket = Tiket::findOrFail($id);

        //update tiket dengan data yang baru
        $tiket->update([
            'nama_tiket'    => $request->nama_tiket,
            'jenis_tiket'   => $request->jenis_tiket,
            'harga_tiket'   => $request->harga_tiket,
            'jumlah_tiket'  => $request->jumlah_tiket,
            'rute_id'       => $request->rute_id
        ]);

        //redirect to index
        return redirect()->route('kelolatiket.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $post = Tiket::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('kelolatiket.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
