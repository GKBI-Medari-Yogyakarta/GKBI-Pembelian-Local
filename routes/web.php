<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('admin.layouts.main');
    // return redirect()->route('login.index');
});
Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login.index');
});
Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@index')->name('login.index');
    Route::post('post-login', 'LoginController@formLogin')->name('post.login');
});
Route::namespace('Admin')->group(function () {
    Route::resource('admin', 'AdminController');
    Route::resource('admin-gudang', 'GudangController');
    Route::resource('admin-pemesan', 'PemesanController');
    Route::resource('admin-pembelian', 'PembelianController');
    Route::resource('admin-akuntansi', 'AkuntansiController');
    Route::get('logout', 'AdminController@logout')->name('logout');

    //Unit
    Route::resource('admin-unit', 'UnitController');
    Route::resource('admin-bagian', 'BagianController');
});
Route::namespace('User')->group(function () {
    Route::get('user-pemesan', 'AdminPemesanController@index')->name('user-pemesan.index');
    Route::get('user-gudang', 'AdminGudangController@index')->name('user-gudang.index');
    Route::get('user-pemesan', 'AdminPemesanController@index')->name('user-pemesan.index');
    Route::get('user-pembelian', 'AdminPembelianController@index')->name('user-pembelian.index');
    Route::get('user-akuntansi', 'AdminAkuntansiController@index')->name('user-akuntansi.index');
});
Route::namespace('Pemesan')->group(function () {
    Route::get('alamat', 'NegaraController@index')->name('negara.index');
    Route::resource('negara', 'NegaraController')->except('index');
    Route::resource('provinsi', 'ProvinsiController');
    Route::resource('kabupaten', 'KabupatenController');
    Route::resource('permintaan-pembelian', 'PermintaanController');
});
