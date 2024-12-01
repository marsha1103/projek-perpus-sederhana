<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\AuthController;

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


//CRUD Staff
Route::get('/input',[StafController::class, 'index'])->name('s.index');
Route::get('/inputt',[StafController::class, 'create'])->name('s.create');
Route::post('/imput',[StafController::class, 'store'])->name('s.store');
Route::get('/staf/{staf}/edit', [StafController::class, 'edit'])->name('s.edit');
Route::patch('staf/{staf}', [StafController::class, 'update'])->name('s.update');
Route::delete('/s/{staf}', [StafController::class, 'destroy'])->name('s.destroy');

// CRUD Pengunjung
Route::get('/tambah',[PengunjungController::class, 'index'])->name('p.index');
Route::get('/tambahh',[PengunjungController::class, 'create'])->name('p.create');
Route::post('/tamba',[PengunjungController::class, 'store'])->name('p.store');
Route::get('/pengunjung/{pengunjung}/edit', [PengunjungController::class, 'edit'])->name('p.edit');
Route::patch('pengunjung/{pengunjung}', [PengunjungController::class, 'update'])->name('p.update');
Route::delete('/p/{oengunjung}', [PengunjungController::class, 'destroy'])->name('p.destroy');


// Form login dll
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/loginn', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// sebagai admin dan pengunjung
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::get('/', function () {
    return view('perpus.master');})->name('pengunjung');



