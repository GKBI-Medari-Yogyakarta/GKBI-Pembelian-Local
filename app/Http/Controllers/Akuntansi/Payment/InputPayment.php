<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use App\Model\Akuntansi\Rekening;
use App\Model\Gudang\UnitStok;
use App\Model\Niagabeli\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputPayment extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $us = UnitStok::find($id);
        $payment = Payment::where('us_id', $us->id)->first();
        $rek = Rekening::where('status', 'PC. GKBI')->get();
        if (!isset($payment->us_id)) {
            $compare = null;
            return \view('akuntansi.pembayaran.edit', \compact('us', 'rek', 'compare'));
        }
        if ($payment->payment_status == '1') return \redirect()->back()->with(['warning' => 'pembayaran sudah lunas, silahkan lakukan pembayaran untuk barang lainnya!!']);
        $compare = $us->id . $payment->us_id;
        return \view('akuntansi.pembayaran.edit', \compact('us', 'rek', 'compare', 'payment'));
    }
}
