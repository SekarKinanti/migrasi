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

Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
Route::get('/', function(){
  return Auth::user()->level;
})->middleware('jwt.verify');
Route::get('user', 'PetugasController@getAuthenticatedUser')->middleware('jwt.verify');

// buku
Route::get('/buku','Buku@index');
Route::post('/simpan_buku','Buku@store');
Route::put('/ubah_buku/{id}','Buku@update');
Route::get('/tampil_buku','Buku@tampil');
Route::delete('/hapus_buku/{id}','Buku@destroy');

// anggota
Route::get('/anggota','Anggota@index');
Route::post('/simpan_anggota','Anggota@store');
Route::put('/ubah_anggota/{id}','Anggota@update');
Route::get('/tampil_anggota','Anggota@tampil');
Route::delete('/hapus_anggota/{id}','Anggota@destroy');
