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
        Route::resource('pembelian', 'TransactionController')->only('create', 'store');
        Route::get('pembelian/{transaction}/detail', 'TransactionController@show')->name('transaction.show');
        //detail in the below of this words
        Route::get('pembelian/{id}/proses', 'TransactionController@edit')->name('detail.edit');
        Route::put('pembelian/{transaction}', 'TransactionController@update')->name('transaction.update');
        // Route::delete('pembelian/{transaction}', 'TransactionDetailController@destroy')->name('transaction.destroy');
        //detail update in the below of this words
        Route::put('pembelian/{id}/proses', 'TransactionDetail')->name('detail.update');
    });
    //Barang Datang
    Route::group(['prefix' => 'surat'], function () {
        Route::resource('jalan', 'SuratJalanController')->except('store');
        Route::post('jalan/{id}', 'SuratJalanController@store')->name('jalan.store');
        //Surat Ijin Masuk Barang Datang
        Route::namespace('Surat')->group(function () {
            Route::get('ijin-masuk', 'IndexSuratIjinMasuk')->name('sim.index');
            Route::get('ijin-masuk/{id}', 'EditSuratIjinMasuk')->name('sim.edit');
            Route::put('ijin-masuk/{id}', 'UpdateSuratIjinMasuk')->name('sim.update');
        });
        Route::namespace('Mikeluar')->group(function () {
            Route::get('mikeluar', 'IndexMikeluar')->name('mikeluar.index');
            Route::get('mikeluar/{id}', 'EditMikeluar')->name('mikeluar.edit');
            Route::put('mikeluar/{id}', 'UpdateMikeluar')->name('mikeluar.update');
            Route::put('mikeluar/{id}/store', 'StoreMikeluarToOther')->name('mikeluar.store');
            Route::namespace('Ijin')->prefix('MI')->group(function () {
                Route::get('ijin-keluar', 'IndexIjinController')->name('ijin-keluar.index');
                Route::get('ijin-keluar/{id}', 'EditIjinController')->name('ijin-keluar.edit');
                Route::put('ijin-keluar/{id}', 'UpdateIjinController')->name('ijin-keluar.update');
            });
        });
    });
});
Route::namespace('Gudang')->prefix('user-gudang')->group(function () {
    Route::resource('permintaan', 'GudangPermintaanController');
    Route::get('pesanan', 'DaftarPesananController@index')->name('pesanan.index');
    //Barang Datang
    Route::namespace('BarangDatang')->group(function () {
        Route::get('barang-datang', 'IndexBarangDatang')->name('bd.index');
        Route::get('barang-datang/{id}', 'EditBarangDatang')->name('bd.edit');
        Route::put('barang-datang/{id}', 'UpdateBarangDatang')->name('bd.update');
    });
    //Pengecekan barang
    Route::namespace('TestingItem')->prefix('barang-datang-proses')->group(function () {
        Route::get('pengecekan', 'IndexTestingItem')->name('test.index');
        Route::get('pengecekan/{id}', 'EditTestingItem')->name('test.edit');
        Route::post('pengecekan/{id}', 'StoreTestingItem')->name('test.store');
        Route::put('pengecekan/{id}', 'UpdateTestingItem')->name('test.update');
    });
    Route::prefix('barang-datang-proses')->namespace('NPB')->group(function () {
        Route::post('qty/{id}', 'StoreQtyController')->name('qty.store');
        Route::get('qty', 'IndexQtyController')->name('qty.index');
        Route::get('qty/{id}/edit', 'EditQtyController')->name('qty.edit');
        Route::put('qty/{id}', 'UpdateQtyController')->name('qty.update');
        Route::put('qty/{id}/posting', 'PostQtyController')->name('qty.post');
    });
});
Route::namespace('Akuntansi')->prefix('user-akuntansi')->group(function () {
    Route::resource('rekening', 'RekController');
});
