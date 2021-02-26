<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\TransactionDetailRequest;
use App\Model\Niagabeli\SPBarang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Controller
{
    public function __invoke(TransactionDetailRequest $req,$id)
    {
        if (Auth::guard('pembelian')->check()) {
            DB::beginTransaction();
            try {
                $spb = SPBarang::where('transaction_id',$id)->first();
                $transDetail = \App\Model\Niagabeli\TransactionDetail::where('transaction_id',$id)->first();
                $transDetail->_terbeli = $req->_terbeli;
                $transDetail->_terbayar = $req->_terbayar;
                $transDetail->tgl_beli = $req->tgl_beli;
                $nota = null;
                if (!empty($req->nota)) {
                    $nota = $req->nota;
                }
                $transDetail->nota = $nota;
                $peritem = null;
                if (!empty($req->harga_item)) {
                    $peritem = $req->harga_item;
                }
                $transDetail->harga_item = $peritem;
                $ppn = null;
                if (!empty($req->ppn)) {
                    $ppn = $req->ppn;
                }
                $transDetail->ppn = $ppn;
                $transDetail->spb_id = $spb->id;
                if (!empty($transDetail->_terbeli)) {
                    $transDetail->transaction->status_beli = '1';
                }
                $satuan = null;
                if (!empty($req->satuan)) {
                    $satuan = $req->satuan;
                }
                $spb->satuan = $satuan;
                $spb->sup_id = $req->sup_id;
                $spb->ppn = $ppn;
                $spb->nota_spb = $req->nota_spb;
                $spb->jadwal_datang = $req->jadwal_datang;
                $spb->tempo_pembayaran = $req->tempo_pembayaran;
                $spb->total_hrg = $req->_terbayar;
                $spb->save();
                $transDetail->save();
                $transDetail->transaction->save();
                DB::commit();
                return \redirect()->route('transaction.index')->with(['msg' => 'Berhasil memproses data permintaan pembelian dengan nomor transaksi ' . $transDetail->transaction->no_transaction]);
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('warning', 'Something Went Wrong!, tidak berhasil merubah data!!');
            }
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
