<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\TransactionDetailRequest;
use App\Model\Niagabeli\BarangDatang;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\Supplier;
use App\Model\Niagabeli\Transaction;
use App\Model\Niagabeli\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            // \dd($spb);
            // \dd($id);
            // $transDetail = DB::table('transaction_details as td')
            //     ->join('transactions as t', 't.id', '=', 'td.transaction_id')
            //     ->select('td.*')
            //     ->where('td.transaction_id', '=', 't.id')
            //     ->first();
            // $spb = DB::table('s_p_barangs as spb')
            //     ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
            //     ->select('spb.*')
            //     ->where('spb.id', 'td.spb_id')
            //     ->first();
            // \dd($transDetail);
            $sup = Supplier::all();
            return \view('niagabeli.pembelian.edit', \compact('transDetail', 'sup', 'spb'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(Request $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            DB::beginTransaction();
            try {
                // $spb = SPBarang::find($id);
                // $transDetail = TransactionDetail::find($id);
                $transDetail = DB::table('transaction_details as td')
                    ->join('transactions as t', 't.id', '=', 'td.transaction_id')
                    ->select('td.*')
                    ->where('td.transaction_id', '=', 't.id')
                    ->first();
                $spb = DB::table('s_p_barangs as spb')
                    ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                    ->select('spb.*')
                    ->where('spb.transaction_id', 't.id')
                    ->first();
                \dd($id);
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
                $satuan = null;

                if ($transDetail->_terbeli !== \null) {
                    $transDetail->transaction->status_beli = '1';
                }
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
                // \dd('ok');
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
    public function destroy($id)
    {
        //
    }
}
