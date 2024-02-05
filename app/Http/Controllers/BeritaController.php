<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;

class BeritaController extends Controller
{
    function index()
    {
        $berita = berita::all();
        return view('halaman_admin.admin.pages.index', compact('berita'));
    }
}
