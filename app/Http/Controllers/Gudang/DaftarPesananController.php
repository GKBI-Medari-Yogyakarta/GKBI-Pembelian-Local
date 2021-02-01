<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPesananController extends Controller
{
    //to dashboard user gudang
    public function index() {
        if (Auth::guard('gudang')->check()) {
            $permintaans = Permintaan::all();
            return \view('gudang.daftar-pesanan.index',\compact('permintaans'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
