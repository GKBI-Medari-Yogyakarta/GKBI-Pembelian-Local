<?php

use Illuminate\Support\Facades\Route;

Route::view('welcome', 'admin.layouts.main');
Route::redirect('/', 'login', 301);
Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@index')->name('login.index');
    Route::post('post-login', 'LoginController@formLogin')->name('post.login');
});
Route::namespace('Admin')->group(function () {
    Route::get('admin', 'AdminController@index')->name('admin.index');
    Route::get('logout', 'AdminController@logout')->name('logout');
    Route::resource('admin-gudang', 'GudangController');
    Route::resource('admin-pemesan', 'PemesanController');
    Route::resource('admin-pembelian', 'PembelianController');
    Route::resource('admin-akuntansi', 'AkuntansiController');
    //bukan buat user
    Route::resource('admin-unit', 'UnitController');
    Route::resource('admin-bagian', 'BagianController');
});
Route::namespace('User')->group(function () {
    Route::get('user-pemesan', 'AdminPemesanController@index')->name('user-pemesan.index');
    Route::get('user-gudang', 'AdminGudangController@index')->name('user-gudang.index');
    Route::get('user-pembelian', 'AdminPembelianController@index')->name('user-pembelian.index');
    Route::get('user-akuntansi', 'AdminAkuntansiController@index')->name('user-akuntansi.index');
});
Route::namespace('Pemesan')->group(function () {
    Route::prefix('user-pemesan')->group(function () {
        Route::resource('permintaan-pembelian', 'PermintaanController');
    });
});
Route::namespace('Niagabeli')->prefix('user-pembelian')->group(function () {
    Route::get('alamat', 'NegaraController@index')->name('negara.index');
    Route::resource('negara', 'NegaraController')->except('index');
    Route::resource('provinsi', 'ProvinsiController');
    Route::resource('kabupaten', 'KabupatenController');
    Route::group(['prefix' => 'alamat'], function () {
        Route::resource('supplier', 'SupplierController');
    });
});
Route::namespace('Gudang')->prefix('user-gudang')->group(function () {
    Route::resource('permintaan', 'GudangPermintaanController');
    Route::get('pesanan', 'DaftarPesananController@index')->name('pesanan.index');
});
Route::namespace('Akuntansi')->prefix('user-akuntansi')->group(function () {
    // Route::get('rekening', 'RekController@index')->name('rekening.index');
    // Route::post('rekening', 'RekController@store')->name('rekening.store');
    // Route::get('rekening/{id}/edit', 'RekController@edit')->name('rekening.edit');
    // Route::put('rekening/{id}', 'RekController@update')->name('rekening.update');
    // Route::delete('rekening/{id}', 'RekController@destroy')->name('rekening.destroy');
    Route::resource('rekening', 'RekController');
});
