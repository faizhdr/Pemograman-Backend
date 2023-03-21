<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\MahasantriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login
Route::get(
    '/log_view',
    function () {
        Log::info('Hello saya informasi dari log');
        return view('welcome');
    }
);
Route::get('/log_debug', function () {
    Log::debug('IP ' . Request::getClientIP() .
        'Hello saya Log::debug');
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

// PEGWAI
Route::get('/home', [HomeController::class, 'index']);
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::resource('pegawai', PegawaiController::class);

// MAHASANTRI
Route::get('/jurusan', [MahasantriController::class, 'jurusan']);
Route::get('/mahasantri', [MahasantriController::class, 'index']);
Route::resource('mahasantri', MahasantriController::class);

// PERPUSTKAAN
Route::resource('pengarang', PengarangController::class)->middleware('auth');
Route::resource('penerbit', PenerbitController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('buku', BukuController::class)->middleware('auth');
// export buku
Route::get('bukupdf', [BukuController::class, 'bukuPDF']);
Route::get('bukucsv', [BukuController::class, 'bukucsv']);
//export penerbit
Route::get('penerbitpdf', [PenerbitController::class, 'penerbitPDF']);
Route::get('penerbitcsv', [PenerbitController::class, 'penerbitcsv']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
