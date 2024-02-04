<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KaryawanController;
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
Route::get('/',         [Controller::class,'index'])    ->name('Home');
Route::get('/blog',     [Controller::class,'blog'])     ->name('Blog');
Route::get('/tiket',    [Controller::class,'tiket'])    ->name('Tiket');
Route::get('/company',  [Controller::class,'company'])  ->name('Company');

Route::middleware(['guest'])->group(function () {
    Route::get('/sesi',             [AuthController::class, 'index'])           ->name('auth');
    Route::post('/sesi',            [AuthController::class, 'login']);
    Route::get('/reg',              [AuthController::class, 'create'])          ->name('registrasi');
    Route::post('/reg',             [AuthController::class, 'register'])        ->name('registrasi');
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/user');
    Route::get('/admin',            [AdminController::class,    'index'])       ->name('admin')         ->middleware('userAkses:admin');
    Route::get('/user',             [UserController::class,     'index'])       ->name('user')          ->middleware('userAkses:user');
    Route::get('/karyawan',         [KaryawanController::class, 'index'])       ->name('karyawan')      ->middleware('userAkses:karyawan');

    Route::get('/posts',            [BeritaController::class,   'index'])       ->name('tambahberita');
    Route::get('/table',            [AdminController::class,   'table'])       ->name('table');
    Route::get('/databerita',       [AdminController::class,    'databerita'])  ->name('databerita')    ->middleware('userAkses:admin');

    Route::get('/datauser',         [AdminController::class,    'datauser'])    ->name('datauser')      ->middleware('userAkses:admin');
    Route::get('/tambahuser',       [AdminController::class,    'tambahuser'])  ->name('tambahuser')    ->middleware('userAkses:admin');    
    Route::get('/edituser/{id}',    [AdminController::class,    'edituser'])    ->name('edituser')      ->middleware('userAkses:admin');
    Route::post('/hapususer/{id}',  [AdminController::class,    'hapususer'])   ->name('hapususer')     ->middleware('userAkses:admin');

    Route::post('/logout',          [AuthController::class,     'logout'])      ->name('logout');
});
