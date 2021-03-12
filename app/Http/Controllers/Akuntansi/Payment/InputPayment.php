<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Gudang\UnitStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputPayment extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $payment_iscoming = DB::table('unit_stoks as us')
            ->join('items as it', 'it.id', '=', 'us.item_id')
            ->join('npm_qties as qty', 'qty.id', '=', 'it.npb_id')
            ->join('testing_items as ti', 'ti.id', '=', 'qty.ti_id')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('transaction_details as td', 't.id', '=', 'td.transaction_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('p.nm_barang', 'p.spesifikasi', 'p.kd_barang', 'spb.tempo_pembayaran', 'spb.nota_spb', 'td._terbayar', 'td.ppn', 'td._harga_item', 'td.tgl_beli', 'us.*')
            ->where('us.id', $id)->first();
        \dd($payment_iscoming);
        return \view('akuntansi.pembayaran.index', \compact('payemnt_iscoming'));
    }
}
