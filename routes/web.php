<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KelolaProfilController;
use App\Http\Controllers\UproleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'halaman_depan/index');
// Route::view('/blog', 'halaman_depan/blog');
// Route::view('/tiket', 'halaman_depan/tiket');
// Route::view('/company', 'halaman_depan/company');
Route::get('/',         [Controller::class, 'index'])->name('Home');
Route::get('/blog',     [Controller::class, 'blog'])->name('Blog');
Route::get('/blog/{id}',  [Controller::class, 'blogshow']);
Route::get('/tiket',    [Controller::class, 'tiket'])->name('Tiket');
Route::get('/company',  [Controller::class, 'company'])->name('Company');

Route::middleware(['guest'])->group(function () {
    Route::get('/sesi',             [AuthController::class, 'index'])->name('auth');
    Route::post('/sesi',            [AuthController::class, 'login']);
    Route::get('/reg',              [AuthController::class, 'create'])->name('registrasi');
    Route::post('/reg',             [AuthController::class, 'register'])->name('register');
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/user');
    Route::get('/admin',            [AdminController::class,    'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user',             [UserController::class,     'index'])->name('user')->middleware('userAkses:user');
    Route::get('/karyawan',         [KaryawanController::class, 'index'])->name('karyawan')->middleware('userAkses:karyawan');

    //Route Untuk Mengelola User
    Route::resource('/datauser', \App\Http\Controllers\DataUserController::class)->middleware('userAkses:admin');

    Route::post('/uprole/{id}',     [UproleController::class, 'uprole']);
    Route::post('/downrole/{id}',     [UproleController::class, 'downrole']);


    //Route Untuk Mengelola Profil Halaman Perusahaan
    Route::post('/logout',          [AuthController::class,     'logout'])->name('logout');

    Route::resource('/berita', \App\Http\Controllers\BeritaController::class)->middleware('userAkses:admin');
    Route::resource('/beritakar', \App\Http\Controllers\BeritaKarController::class)->middleware('userAkses:karyawan');
    Route::resource('/profilusaha', \App\Http\Controllers\HalamanDepan\KelolaProfilController::class)->middleware('userAkses:admin');
    Route::resource('/kelolatiket', \App\Http\Controllers\TiketController::class)->middleware('userAkses:admin');
    Route::resource('/kelolarute', \App\Http\Controllers\RuteController::class)->middleware('userAkses:admin');
    // Route::resource('/profilusaha', \App\Http\Controllers\HalamanDepan\KelolaProfil1Controller::class)->middleware('userAkses:admin');

    // Route::get('/profilusaha/{id}',     [KelolaProfilController::class,    'showgambar'])->name('profilgambar')->middleware('userAkses:admin');
    Route::get('/profilshow/{id}',     [AdminController::class,    'profilshow'])->name('profilshow')->middleware('userAkses:admin');
    Route::put('/profilupdate/{id}',     [AdminController::class,    'profilupdate'])->name('profilupdate')->middleware('userAkses:admin');
    Route::post('/addgambar', [AdminController::class, 'addgambar'])->name('addgambar');
    Route::get('/buatprofil', [AdminController::class, 'buatprofil'])->name('buatprofil');
    Route::post('/buatprofilcreate', [AdminController::class, 'buatprofilcreate'])->name('buatprofilcreate');
});
