<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use App\Model\Gudang\UnitStok;
use Illuminate\Http\Request;

class StorePayment extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'rek_id' => 'required',
            ],
            [
                'rek_id.required' => 'pilih rekening yang digunakan!!',
            ]
        );
        $us = UnitStok::find($id);
        $payment = Payment::where('us_id', $us->id)->first();
        if (!isset($payment->us_id)) {
            $payment = new Payment;
            $payment->total = $us->item->hrg_barang;
            $payment->terpakai = $us->jumlah_stok;
            $payment->rek_id = $req->rek_id;
            $payment->us_id = $us->id;
            $payment->saldo_awal = $payment->rekening->saldo;
            $payment->save();
            $compare = null;
            return \redirect()->back()->with(['msg' => 'Silahkan lengkapi data pembayaran!!'], \compact('payment', 'compare'));
        }
        $compare = $us->id . $payment->us_id;
        return \redirect()->back()->with(['msg' => 'Data sudah diinput!!'], \compact('payment', 'compare'));
    }
}
