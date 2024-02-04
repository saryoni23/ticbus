<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBerita;

class BeritaController extends Controller
{
    function index()
    {
        $berita = DataBerita::all();
        return view('pointakses.admin.pages.index', compact('berita'));
    }
}
