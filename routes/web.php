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
Route::namespace('Pemesan')->group(function(){
    Route::prefix('user-pemesan')->group(function(){
        Route::resource('permintaan-pembelian', 'PermintaanController');
    });
});
Route::namespace('Niagabeli')->group(function () {
    Route::prefix('user-pembelian')->group(function(){
        Route::get('alamat', 'NegaraController@index')->name('negara.index');
        Route::resource('negara', 'NegaraController')->except('index');
        Route::resource('provinsi', 'ProvinsiController');
        Route::resource('kabupaten', 'KabupatenController');
    });
});
Route::namespace('Gudang')->group(function(){
    Route::prefix('user-gudang')->group(function(){
        Route::resource('permintaan', 'GudangPermintaanController');
        Route::get('pesanan', 'DaftarPesananController@index')->name('pesanan.index');
    });
});
