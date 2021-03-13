<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexPayment extends Controller
{
    public function __invoke()
    {
        $payment_iscoming = DB::table('unit_stoks as us')
            ->join('items as it', 'it.id', '=', 'us.item_id')
            ->select('it.pemesan', 'it.nm_barang', 'it.spek_barang', 'it.kd_barang', 'it.tempo_pembayaran', 'it.harga_item', 'it.tgl_beli', 'it.ppn_barang', 'it.hrg_barang', 'us.*')
            ->get();
        return \view('akuntansi.pembayaran.index', \compact('payment_iscoming'));
    }
}
