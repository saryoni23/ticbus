<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
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


    // Route::get('/table',            [AdminController::class,    'table'])->name('table')->middleware('userAkses:admin');
    //Route Untuk Mengelola User
    Route::resource('/datauser', \App\Http\Controllers\DataUserController::class)->middleware('userAkses:admin');
    // Route::get('/datauser',         [AdminController::class,    'datauser'])->name('datauser')->middleware('userAkses:admin');
    // Route::get('/adduser',          [AdminController::class,    'tambah']);
    // Route::post('/adduser',          [AdminController::class,    'create']);
    // Route::get('/edituser/{id}',    [AdminController::class,    'edituser']);
    // Route::post('/edituser',       [AdminController::class,    'change']);
    // Route::post('/hapususer/{id}',  [AdminController::class,    'hapususer']);
    Route::post('/uprole/{id}',     [UproleController::class, 'uprole']);
    Route::post('/downrole/{id}',     [UproleController::class, 'downrole']);

    //Route Untuk Mengelola Berita
    Route::get('/databerita',       [AdminController::class,    'databerita'])->name('databerita')->middleware('userAkses:admin');
    Route::get('/tambahberita',     [AdminController::class,    'tambahberita'])->name('tambahberita')->middleware('userAkses:admin');
    Route::get('/editberita/{id}',  [AdminController::class,    'editberita'])->name('editberita')->middleware('userAkses:admin');
    Route::post('/hapusberita/{id}', [AdminController::class,    'hapusberita'])->name('hapusberita')->middleware('userAkses:admin');

    //Route Untuk Mengelola Profil Halaman Perusahaan
    Route::post('/logout',          [AuthController::class,     'logout'])->name('logout');

    Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('/profilusaha', \App\Http\Controllers\KelolaProfilController::class);
    Route::get('/kelolaprofil',     [AdminController::class,    'kelolaprofil'])->name('kelolaprofil')->middleware('userAkses:admin');
    Route::get('/profilshow/{id}',     [AdminController::class,    'profilshow'])->name('profilshow')->middleware('userAkses:admin');
    Route::put('/profilupdate/{id}',     [AdminController::class,    'profilupdate'])->name('profilupdate')->middleware('userAkses:admin');
});
