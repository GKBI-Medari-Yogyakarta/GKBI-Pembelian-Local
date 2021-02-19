<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\TransactionDetailRequest;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\Supplier;
use App\Model\Niagabeli\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transDetail = TransactionDetail::find($id);
            $spb = SPBarang::find($id);
            $sup = Supplier::all();
            return \view('niagabeli.pembelian.edit', \compact('transDetail', 'sup', 'spb'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(TransactionDetailRequest $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $spb = SPBarang::find($id);
            $transDetail = TransactionDetail::find($id);
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
            $satuan = null;
            if (!empty($req->satuan)) {
                $satuan = $req->satuan;
            }
            $spb->satuan = $satuan;
            $spb->sup_id = '1';
            $spb->ppn = $ppn;
            $spb->nota_spb = $req->nota_spb;
            $spb->jadwal_datang = $req->jadwal_datang;
            $spb->tempo_pembayaran = $req->tempo_pembayaran;
            $spb->total_hrg = $req->_terbayar;
            $spb->save();
            $transDetail->save();
            return \redirect()->route('transaction.index')->with(['msg' => 'Berhasil memproses data permintaan pembelian dengan nomor transaksi ' . $transDetail->transaction->no_transaction]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function destroy($id)
    {
        //
    }
}
