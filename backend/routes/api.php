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
Route::group(['prefix' => 'auth',], function () {
    Route::post('signin', 'Auth\SignInController');
    Route::post('signout', 'Auth\SignOutController');
    Route::get('authenticate', 'Auth\AuthenticateController');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('bahan', 'BahanController');
    Route::resource('produk', 'ProdukController');
    Route::resource('paket', 'PaketController');
    Route::resource('pesanan', 'PesananController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('user', 'UserController');

    Route::get('paketProduk', 'PaketController@ProdukPaket');
    Route::get('produkBahan', 'ProdukController@BahanProduk');
    Route::get('pesananPaket', 'PesananController@PaketPesanan');

    Route::get('rekap/bahan/{waktu_mulai}/{waktu_akhir}', 'BahanController@ExportBahan');
    Route::get('rekap/produk/{waktu_mulai}/{waktu_akhir}', 'ProdukController@ExportProduk');
});

Route::get('/android/{key}/rekap/bahan/{waktu_mulai}/{waktu_akhir}', 'BahanController@androExportBahan');
Route::get('/android/{key}/rekap/produk/{waktu_mulai}/{waktu_akhir}', 'ProdukController@androExportProduk');
Route::get('/android/{key}/list/AndroBahan', 'BahanController@androBahan');
Route::get('/android/{key}/list/AndroProduk', 'ProdukController@androProduk');
Route::get('/android/{key}/list/AndroUser', 'UserController@androUser');
