<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;


class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get posts
        $posts = Rute::latest()->paginate(5);
        $categories = Kategori::all();
        $logo = Company::all();
        $tiket = Tiket::all();



        //render view with posts
        return view('halaman_admin.pages.rute.index', compact('posts', 'categories', 'tiket', 'logo'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $tikets = Tiket::all();
        $logo = Company::all();

        return view('halaman_admin.pages.rute.create', compact('tikets', 'logo'));
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
            'nama_rute'   => 'required|min:5',
            'jenis_rute'  => 'required',
            'harga_rute'  => 'required|min:2',
            // 'categori_id'  => 'required',
            'jumlah_rute' => 'required|min:1'
        ], [
            'nama_rute.required'  => 'Nama rute Wajib Diisi',
            'nama_rute.min'       => 'Nama rute Minimal 5 Karakter',
            'jenis_rute.required' => 'Jenis rute Wajib Diisi',
            'harga_rute.required' => 'Harga rute Wajib Diisi',
            'harga_rute.min'      => 'Harga rute Minimal 4 Karakter',
            // 'categori_id.required' => 'Kategori rute Wajib Diisi',
            'jumlah_rute.required' => 'Jumlah rute Wajib Diisi',
            'jumlah_rute.min'     => 'Jumlah rute Minimal 1 Karakter',
        ]);

        $harga_rute = str_replace('.', '', $request->input('harga_rute'));

        // Create rute
        rute::create([
            'name_rute'    => $request->nama_rute,
            'jenis_rute'   => $request->jenis_rute,
            'harga_rute'   => $harga_rute,
            'categori_id'   => $request->categori_id,
            'jumlah_rute'  => $request->jumlah_rute,
        ]);

        // Flash success message
        Session::flash('success', 'rute Berhasil Ditambahkan');

        // Redirect back to index
        return redirect()->route('kelolarute.index');
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
        $post = Rute::findOrFail($id);
        $logo = Company::all();


        //render view with post
        return view('halaman_admin.pages.rute.show', compact('post', 'logo'));
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
        $post = Rute::findOrFail($id);
        $categories = Kategori::all();
        $logo = Company::all();

        //render view with post
        return view('halaman_admin.pages.rute.edit', compact('post', 'categories', 'logo'));
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
            'nama_rute'   => 'required|min:5',
            'jenis_rute'  => 'required',
            'harga_rute'  => 'required|min:2',
            'jumlah_rute' => 'required|min:1'
        ], [
            'nama_rute.required'  => 'Nama rute Wajib Diisi',
            'nama_rute.min'       => 'Nama rute Minimal 5 Karakter',
            'jenis_rute.required' => 'Jenis rute Wajib Diisi',
            'harga_rute.required' => 'Harga rute Wajib Diisi',
            'harga_rute.min'      => 'Harga rute Minimal 2 Karakter',
            'jumlah_rute.required' => 'Jumlah rute Wajib Diisi',
            'jumlah_rute.min'     => 'Jumlah rute Minimal 1 Karakter',
        ]);

        //get post by ID
        $rute = rute::findOrFail($id);

        //update rute dengan data yang baru
        $rute->update([
            'nama_rute'  => $request->nama_rute,
            'jenis_rute' => $request->jenis_rute,
            'harga_rute' => $request->harga_rute,
            'jumlah_rute' => $request->jumlah_rute
        ]);

        //redirect to index
        return redirect()->route('kelolarute.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $post = Rute::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('kelolarute.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
