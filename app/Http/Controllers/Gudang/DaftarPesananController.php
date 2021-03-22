<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Pemesan\Permintaan;

class DaftarPesananController extends Controller
{
    //to dashboard user gudang
    public function index()
    {
        $permintaans = Permintaan::all();
        $bdnull = BarangDatang::notification();
        return \view('gudang.daftar-pesanan.index', \compact('permintaans', 'bdnull'));
    }
}
