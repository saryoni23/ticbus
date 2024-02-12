<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $logo = company::limit(1)->get();
        return view('halaman_depan.page.home', [
            'title' => 'Home',
            'logos' => $logo
        ]);
    }
    public function blog()
    {

        $berita = artikel::limit(6)->get();
        $logo = company::limit(1)->get();
        return view('halaman_depan.page.blog', compact('berita'), [
            'title' => 'Blog',
            'logos' => $logo
        ]);
    }
    public function tiket()

    {
        $logo = company::limit(1)->get();

        return view('halaman_depan.page.tiket', [
            'title' => 'Tiket',
            'logos' => $logo
        ]);
    }
    public function company()
    {
        $data = company::all();
        $logo = company::all();

        return view('halaman_depan.page.company', [
            'title' => 'Company',
            'data' => $data,
            'logos' => $logo
        ]);
    }
}
