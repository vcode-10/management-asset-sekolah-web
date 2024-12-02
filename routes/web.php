<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::resource(
        'users',
        \App\Http\Controllers\UserController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'lokasies',
        \App\Http\Controllers\LokasiController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'tipe-asets',
        \App\Http\Controllers\TipeAsetController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource('asets', \App\Http\Controllers\AsetController::class);
    Route::resource(
        'kondisies',
        \App\Http\Controllers\KondisiController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'pengajuans',
        \App\Http\Controllers\PengajuanAsetController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'disposisies',
        \App\Http\Controllers\DisposisiAsetController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'pemeliharaans',
        \App\Http\Controllers\PemeliharaansAsetController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'peminjamans',
        \App\Http\Controllers\PeminjamanAsetController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'peminjams',
        \App\Http\Controllers\PinjamController::class,
        [
            'except' => ['show']
        ]
    );
    Route::resource(
        'pemindahans',
        \App\Http\Controllers\PemindahanAsetController::class,
        [
            'except' => ['show', 'destroy']
        ]
    );
});
