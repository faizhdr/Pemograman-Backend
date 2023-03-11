<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\PegawaiController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
