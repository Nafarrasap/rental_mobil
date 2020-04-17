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

Route::post('register', 'petugascontroller@register');
Route::post('login', 'petugascontroller@login');
Route::get('user', 'petugascontroller@getAuthenticatedUser')->middleware('jwt.verify');

//penyewa
Route::post('/simpan_penyewa','penyewacontroller@store')->middleware('jwt.verify');
Route::put('/ubah_penyewa/{id}','penyewacontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_penyewa/{id}','penyewacontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_penyewa','penyewacontroller@tampil_penyewa')->middleware('jwt.verify');

// mobil
Route::post('/simpan_mobil','mobil_controller@store')->middleware('jwt.verify');
Route::put('/ubah_mobil/{id}','mobil_controller@update')->middleware('jwt.verify');
Route::delete('/hapus_mobil/{id}','mobil_controller@destroy')->middleware('jwt.verify');
Route::get('/tampil_mobil','mobil_controller@tampil_mobil')->middleware('jwt.verify');

// jenismobil
Route::post('/simpan_jenis','jenismobilcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_jenis/{id}','jenismobilcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_jenis/{id}','jenismobilcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_jenis','jenismobilcontroller@tampil_jenis')->middleware('jwt.verify');
