<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserControController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::view('/','halaman_depan/index');
Route::middleware(['guest'])->group(function(){
    Route::get('/sesi',[AuthController::class,'index'])->name('auth');
    Route::post('/sesi',[AuthController::class,'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('registrasi');
    Route::post('/reg', [AuthController::class, 'register'])->name('registrasi');
    Route::get('/verify/{verify_key}',[AuthController::class, 'verify']);
});

Route::middleware(['auth'])->group(function(){
    Route::redirect('/home', '/user');
    Route::get('/admin',[AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user',[UserController::class, 'index'])->name('user')->middleware('userAkses:user');
    Route::get('/karyawan',[KaryawanController::class, 'index'])->name('karyawan')->middleware('userAkses:karyawan');
    
    Route::get('/settings',[AdminController::class, 'settings'])->name('settings')->middleware('userAkses:admin');
    Route::get('/usercontrol',[UserControController::class,'index'])->name('usercontrol')->middleware('userAkses:admin');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});


