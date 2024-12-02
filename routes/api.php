<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum', 'verified')->group(function () {
// Definisikan rute-rute API yang membutuhkan autentikasi dan verifikasi email disini
// });

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/aset/{id}', 'App\Http\Controllers\ApiController@scanAset');
Route::get('/lokasi', 'App\Http\Controllers\ApiController@getLokasi');

Route::post('/aset/perbaiki', 'App\Http\Controllers\ApiController@addPemeliharaan');
Route::put('/aset/pindah/{id}', 'App\Http\Controllers\ApiController@changeAset');

Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout');
