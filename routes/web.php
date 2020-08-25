<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Start Landing page Routing
Route::get('/', 'DataController@html2pdf');
// End Landing Page Routing

// Start Page Routing
Route::get('/masuk', 'PageController@masuk');
Route::get('/masuk/konfirmasi', 'PageController@masuk');
Route::get('/dasbor', 'PageController@dasbor')->middleware('iskasiroradmin');
Route::get('/paket_laundry', 'PageController@paket_laundry')->middleware('iskasiroradmin');
Route::get('/data_member', 'PageController@data_member')->middleware('iskasiroradmin');
Route::get('/data_non_member', 'PageController@data_non_member')->middleware('iskasiroradmin');
Route::get('/transaksi_member', 'PageController@transaksi_member')->middleware('iskasiroradmin');
Route::get('/transaksi_non_member', 'PageController@transaksi_non_member')->middleware('iskasiroradmin');
Route::get('/data_pengguna', 'PageController@data_pengguna')->middleware('isadmin');
Route::get('/data_pengguna/tambah', 'PageController@data_pengguna_tambah')->middleware('isadmin');
Route::get('/data_pengguna/ubah/{id}', 'PageController@data_pengguna_ubah')->middleware('isadmin');
Route::get('/cabang_toko', 'PageController@cabang_toko')->middleware('isadmin');
Route::get('/laporan', 'PageController@laporan')->middleware('iskasiroradmin');
Route::get('/keluar', 'PageController@keluar');
// End Page Routing

// Start Data Processing Route
Route::post('/masuk/konfirmasi', 'DataController@konfirmasi_masuk');
Route::post('/data_pengguna/tambah/konfirmasi', 'DataController@tambah_data_pengguna');
Route::post('/data_pengguna/hapus', 'DataController@hapus_data_pengguna');
Route::post('/data_pengguna/ubah/konfirmasi', 'DataController@ubah_data_pengguna');
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