<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view ('halaman_depan.page.home',[
            'title' => 'Home',
        ]);
    }
    public function blog()
    {
        return view ('halaman_depan.page.blog',[
            'title' => 'Blog',
        ]);
    }
    public function tiket()
    {
        return view ('halaman_depan.page.tiket',[
            'title' => 'Tiket',
        ]);
    }
    public function company()
    {
        return view ('halaman_depan.page.company',[
            'title' => 'Company',
        ]);
    }
}
