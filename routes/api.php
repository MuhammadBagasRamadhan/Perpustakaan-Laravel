<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'petugas@register');
Route::post('login', 'petugas@login');
Route::put('/ubah_petugas/{id}', 'petugas@update');
Route::delete('/hapus_petugas/{id}', 'petugas@destroy');
Route::get('/tampil_petugas', 'petugas@tampil_petugas');


Route::get('user', 'petugas@getAuthenticatedUser')->middleware('jwt.verify');

Route::post('/simpan_buku','buku@store');
Route::put('/ubah_buku/{id}', 'buku@update');
Route::delete('/hapus_buku/{id}', 'buku@destroy');
Route::get('buku', 'buku@index')->middleware('jwt.verify');

Route::post('/simpan_anggota','anggota@simpan');
Route::put('/ubah_anggota/{id}', 'anggota@update');
Route::delete('/hapus_anggota/{id}', 'anggota@destroy');