<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\Transaction;
use App\Model\Niagabeli\TransactionDetail;
use App\Model\Pemesan\PermintaanTemporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::guard('pembelian')->check()) {
            $permintaan = DB::table('transactions as t')
                ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
                ->select('p.nm_barang', 'p.spesifikasi', 'p.unit_stok', 'p.gudang_stok', 'p.tgl_diperlukan', 'p.realisasi', 'p.keterangan', 't.*')
                ->get();
            return \view('niagabeli.pembelian.index', \compact('permintaan'));
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

    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            return \view('niagabeli.pembelian.edit', \compact('transaction'));
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
    public function show($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            $status = $transaction->status_niaga != 'acc' || empty($transaction->no_niaga);
            return \view('niagabeli.pembelian.show', \compact('transaction', 'status'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(Request $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $transaction = Transaction::find($id);
            if ($req->input('action') == 'Simpan') {
                $transaction->tgl_status = $req->tgl_status;
                $transaction->no_niaga = $req->no_niaga;
                $transaction->rencana_beli = $req->rencana_beli;

                $pb = $transaction->perkiraan_biaya;
                if (!empty($req->perkiraan_biaya)) {
                    $pb = $req->perkiraan_biaya;
                }
                $transaction->perkiraan_biaya = $pb;
                $transaction->payment_type = $req->payment_type;
                $transaction->keterangan = $req->keterangan;
                $transaction->no_transaction = $req->no_transaction;
                $transaction->save();
                return \redirect()->back()->with(['msg' => 'Berhasil merubah data pembelian ' . $transaction->permintaan->pemesan]);
            } else if ($req->input('action') == 'acc') {
                $transaction->status_niaga = 'acc';
                $transaction->save();
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                ]);
                $transaction->permintaan->status_niaga_pembelian = '1';
                $transaction->permintaan->save();
                return \redirect()->route('transaction.index')->with(['msg' => 'Data pembelian dari ' . $transaction->permintaan->pemesan . ' sudah di acc. jangan lupa diproses ketika sudah melakukan pembelian!!']);
            } else if ($req->input('action') == 'tidak') {
                $transaction->status_niaga = 'tidak';
                $transaction->save();
                $transaction->permintaan->status_niaga_pembelian = '0';
                $transaction->permintaan->save();
                PermintaanTemporary::create([
                    'pemesan' => $transaction->permintaan->pemesan,
                    'no_pemesan' => $transaction->permintaan->no_pemesan,
                    'tgl_pesanan' => $transaction->permintaan->tgl_pesanan,
                    'nm_barang' => $transaction->permintaan->nm_barang,
                    'spesifikasi' => $transaction->permintaan->spesifikasi,
                    'unit_stok' => $transaction->permintaan->unit_stok,
                    'gudang_stok' => $transaction->permintaan->gudang_stok,
                    'jumlah' => $transaction->permintaan->jumlah,
                    'tgl_diperlukan' => $transaction->permintaan->tgl_diperlukan,
                    'bagian_id' => $transaction->permintaan->bagian_id,
                    'user_pemesan_id' => $transaction->permintaan->user_pemesan_id,
                    'status_ka_bpemesan' => $transaction->permintaan->status_ka_bpemesan,
                    'status_ka_unit' => $transaction->permintaan->status_ka_unit,
                    'status_direktur' => $transaction->permintaan->status_direktur,
                ]);
                return \redirect()->route('transaction.index')->with(['msg' => 'Data pembelian ' . $transaction->permintaan->pemesan . ' tidak di acc']);
            }
            return \redirect()->back()->with(['msg' => 'tidak ada aksi!!']);
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