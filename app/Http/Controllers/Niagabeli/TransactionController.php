<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\TransactionRequest;
use App\Model\Niagabeli\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('transaction.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function create()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('transaction.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function store()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('transaction.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function show()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('transaction.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            return \view('niagabeli.pembelian.edit', \compact('transaction'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(TransactionRequest $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            $transaction->permintaan_id = $req->permintaan_id;
            $transaction->tgl_status = $req->tgl_status;
            $transaction->no_niaga = $req->no_niaga;

            $sn = $transaction->status_niaga;
            if (!empty($req->status_niaga)) {
                $sn = $req->status_niaga;
            }
            $transaction->status_niaga = $sn;

            $transaction->rencana_beli = $req->rencana_beli;

            $pb = $transaction->perkiraan_biaya;
            if (!empty($req->perkiraan_biaya)) {
                $pb = $req->perkiraan_biaya;
            }
            $transaction->perkiraan_biaya = $pb;

            $transaction->payment_type = $req->payment_type;
            $transaction->keterangan = $req->keterangan;

            $sb = $transaction->status_beli;
            if (!empty($req->status_beli)) {
                $sb = $req->status_beli;
            }
            $transaction->status_beli = $sb;

            $transaction->no_transaction = $req->no_transaction;

            $transaction->save();
            return \redirect()->route('transaction.index')->with(['msg' => 'Berhasil merubah data pembelian', $transaction->permintaan->pemesan]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function destroy($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            $transaction->delete();
            return \redirect()->back('transaction.index')->with(['msg' => 'Berhasil menghapus data', $transaction->permintaan->pemesan]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
