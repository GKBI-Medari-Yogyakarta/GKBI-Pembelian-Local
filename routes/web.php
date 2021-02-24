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
    Route::group(['prefix' => 'permintaan-pembelian'], function () {
        Route::get('pembelian', 'TransactionController@index')->name('transaction.index');
        Route::resource('pembelian', 'TransactionController')->only('create', 'store', 'edit');
        Route::get('pembelian/{transaction}/detail', 'TransactionController@show')->name('transaction.show');
        Route::put('pembelian/{transaction}', 'TransactionController@update')->name('transaction.update');
        Route::delete('pembelian/{transaction}', 'TransactionDetailController@destroy')->name('transaction.destroy');
        //detail
        Route::get('pembelian/{transaction}/proses', 'TransactionDetailController@edit')->name('detail.edit');
        Route::put('pembelian/{transaction}/proses', 'TransactionDetailController@update')->name('detail.update');
    });
    Route::group(['prefix' => 'surat'], function () {
        Route::resource('jalan', 'SuratJalanController')->except('store');
        Route::post('jalan/{id}', 'SuratJalanController@store')->name('jalan.store');
    });
    Route::prefix('barang')->group(function () {
        Route::resource('datang', 'BarangDatangController');

        // Route::get('datang', 'BarangDatangController@index')->name('datang.index');
        // Route::get('datang/{id}', 'BarangDatangController@edit')->name('datang.edit');
    });
});
Route::namespace('Gudang')->prefix('user-gudang')->group(function () {
    Route::resource('permintaan', 'GudangPermintaanController');
    Route::get('pesanan', 'DaftarPesananController@index')->name('pesanan.index');
});
Route::namespace('Akuntansi')->prefix('user-akuntansi')->group(function () {
    Route::resource('rekening', 'RekController');
});
