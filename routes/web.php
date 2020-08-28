<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Start Landing page Routing
Route::get('/', 'DataController@html2pdf');
// End Landing Page Routing

// Start Page Routing
Route::get('/masuk', 'PageController@masuk');
Route::get('/masuk/konfirmasi', 'PageController@masuk');

Route::middleware(['isadmin'])->group(function(){
    Route::get('/data_pengguna', 'PageController@data_pengguna');
    Route::get('/data_pengguna/tambah', 'PageController@data_pengguna_tambah');
    Route::get('/data_pengguna/ubah/{id}', 'PageController@data_pengguna_ubah');
    Route::get('/cabang', 'PageController@cabang');
    Route::get('/cabang/tambah', 'PageController@cabang_tambah');
    Route::get('/cabang/ubah/{id}', 'PageController@cabang_ubah');
});

Route::middleware(['iskasiroradmin'])->group(function(){
    Route::get('/paket_laundry', 'PageController@paket_laundry');
    Route::get('/data_member', 'PageController@data_member');
    Route::get('/data_non_member', 'PageController@data_non_member');
    Route::get('/transaksi_member', 'PageController@transaksi_member');
    Route::get('/transaksi_non_member', 'PageController@transaksi_non_member');
});

Route::middleware(['isalluserlevel'])->group(function(){
    Route::get('/dasbor', 'PageController@dasbor');
    Route::get('/laporan', 'PageController@laporan');
});

Route::get('/keluar', 'PageController@keluar');
// End Page Routing

// Start Data Processing Route
Route::post('/masuk/konfirmasi', 'DataPenggunaController@konfirmasi_masuk');

Route::prefix('data_pengguna')->group(function(){
    Route::post('/tambah/konfirmasi', 'DataPenggunaController@tambah_data_pengguna');
    Route::post('/ubah/konfirmasi', 'DataPenggunaController@ubah_data_pengguna');
    Route::post('/hapus', 'DataPenggunaController@hapus_data_pengguna');
});

Route::prefix('cabang')->group(function(){
    Route::post('/tambah/konfirmasi', 'CabangController@tambah_cabang');
    Route::post('/ubah/konfirmasi', 'CabangController@ubah_cabang');
});

// End Data Processing Route

// Start Page Not Found Routing
Route::fallback(function(){
    return 'Halaman tidak ditemukan';
});
// End Page Not Found Routing

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});