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
            // ->join('npb_qties as qty', 'qty.id', '=', 'it.npb_id')
            // ->join('testing_items as ti', 'ti.id', '=', 'qty.ti_id')
            // ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            // ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            // ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            // ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            // ->join('transaction_details as td', 't.id', '=', 'td.transaction_id')
            // ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            // ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('it.pemesan', 'it.nm_barang', 'it.spek_barang', 'it.kd_barang', 'it.tempo_pembayaran', 'it.harga_item', 'it.tgl_beli', 'it.ppn_barang', 'it.hrg_barang', 'us.*')
            ->get();
        // \dd($payment_iscoming);
        return \view('akuntansi.pembayaran.index', \compact('payment_iscoming'));
    }
}
