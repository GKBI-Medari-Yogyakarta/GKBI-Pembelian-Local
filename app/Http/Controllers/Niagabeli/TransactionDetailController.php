<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\TransactionDetailRequest;
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
            return \view('niagabeli.pembelian.edit', \compact('transDetail'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(TransactionDetailRequest $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transDetail = TransactionDetail::find($id);
            $transDetail->_terbeli = $req->_terbeli;
            $transDetail->_terbayar = $req->_terbayar;
            $transDetail->tgl_beli = $req->tgl_beli;
            $ppn = null;
            if (!empty($req->ppn)) {
                $ppn = $req->ppn;
            }
            $transDetail->ppn = $ppn;
            $transDetail->save();
            return \redirect()->route('transaction.index')->with(['msg' => 'Berhasil memproses data peermintaan pembelian dengan nomor transaksi ' . $transDetail->transaction->no_transaction]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function destroy($id)
    {
        //
    }
}
