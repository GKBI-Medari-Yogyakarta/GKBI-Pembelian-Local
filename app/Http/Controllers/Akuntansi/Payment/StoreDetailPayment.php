<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Akuntansi\Payment;
use App\Model\Gudang\UnitStok;
use Illuminate\Http\Request;

class StoreDetailPayment extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'keterangan' => 'required',
                'payment_status' => 'required',
                'dibayarkan' => 'required',
                'payment_code' => 'required',
                'payment_date' => 'required',
            ],
            [
                'keterangan.required' => 'keterangan pembayaran ke berapa!!',
                'payment_status.required' => 'isi status lunas atau belum!!',
                'dibayarkan.required' => 'isi nominal yang dibayarkan!!',
                'payment_code.required' => 'isi kode pembayaran',
                'payment_date.required' => 'isi tanggal pembayaran',
            ],
        );
        $us = UnitStok::find($id);
        $payment = Payment::where('us_id', $us->id)->first();
        DB::beginTransaction();
        try {
            $payment->payment_code = $req->payment_code;
            $payment->payment_status = $req->payment_status;
            $payment->keterangan = $req->keterangan;
            $payment->hrga_per_item = $us->item->harga_item;
            $payment->dibayarkan = $req->dibayarkan;
            $saldo_sisa = $payment->saldo_awal - $req->dibayarkan;
            $payment->saldo_akhir = "$saldo_sisa";
            $payment->payment_date = $req->payment_date;
            $payment->rekening->saldo = "$saldo_sisa";
            $payment->save();
            $payment->rekening->save();
            DB::commit();
            return \redirect()->route('payment.index')->with(['msg' => 'berhasil menginputkan pembayaran untuk barang' . $us->item->nm_barang]);
        } catch (\Exception $e) {
            DB::rollBack();
            return \redirect()->back()->with(['warning' => 'somethin went wrong!!']);
        }
    }
}
