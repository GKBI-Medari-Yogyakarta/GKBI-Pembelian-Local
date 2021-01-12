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
    Route::resource('user-pemesan', 'AdminPemesanController');
    Route::resource('user-gudang', 'AdminGudangController');
    Route::resource('user-pemesan', 'AdminPemesanController');
    Route::resource('user-pembelian', 'AdminPembelianController');
    Route::resource('user-akuntansi', 'AdminAkuntansiController');
});
Route::namespace('Pemesan')->group(function () {
    Route::resource('negara', 'NegaraController');
    Route::resource('provinsi', 'ProvinsiController');
    Route::resource('kabupaten', 'KabupatenController');
});
