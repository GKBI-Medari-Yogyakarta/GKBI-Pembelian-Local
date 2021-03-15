<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Illuminate\Support\Facades\DB;

class HistoriesPayment extends Controller
{
    public function __invoke()
    {
        // $payment = Payment::all();
        // $payment->whereMonth('created_at', '=', \date('m'));
        // $payment = Payment::all();
        // \dd($payment);
        $payment = DB::table('payments')
            ->join('unit_stoks as us', 'us.id', '=', 'payments.us_id')
            ->join('items as it', 'it.id', '=', 'us.item_id')
            ->select('it.pemesan', 'it.nm_barang', 'it.spek_barang', 'it.kd_barang', 'it.tempo_pembayaran', 'it.harga_item', 'it.tgl_beli', 'it.ppn_barang', 'it.hrg_barang', 'us.*', 'payments.payment_status', 'payments.saldo_awal')
            ->get();
        return \view('akuntansi.pembayaran.history', \compact('payment'));
    }
}
