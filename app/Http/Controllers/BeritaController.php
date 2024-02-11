<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;
use App\Models\berita;

class BeritaController extends Controller
{
    function index()
    {
        $berita = artikel::all();
        return view('halaman_admin.admin.pages.index', compact('berita'));
    }
}
