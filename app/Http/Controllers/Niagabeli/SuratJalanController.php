<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratJalanRequest;
use App\Model\Niagabeli\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratJalanController extends Controller
{
    public function index()
    {
        if (Auth::guard('pembelian')->check()) {
            // SELECT b.nama,p.id,p.pemesan,p.nm_barang,t.id,t.permintaan_id, spb.id,spb.transaction_id, td.spb_id,td.transaction_id,td._terbeli FROM s_p_barangs as spb JOIN transactions as t on t.id=spb.transaction_id JOIN transaction_details as td ON spb.id=td.spb_id JOIN permintaans as p on p.id=t.permintaan_id JOIN bagians as b on b.id=p.bagian_id WHERE t.status_beli='1'
            $barang_datang = DB::table('s_p_barangs as spb')
                ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
                ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
                ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
                ->select('b.nama', 'p.pemesan', 'p.nm_barang', 't.status_beli', 'spb.id')
                ->where('t.status_beli', '=', '1')
                ->get();
            $surat_jalan = SuratJalan::all();
            return view('niagabeli.surat-jalan.index', \compact('surat_jalan', 'barang_datang'));
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function create()
    {
        //
    }
    public function store(SuratJalanRequest $req)
    {
        if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            SuratJalan::create([
                'no_jalan' => $req->no_jalan,
                'tgl_' => $req->tgl_,
                'spb_id' => $req->spb_id,
                'user_id' => $user_pembelian_id,
            ]);
            return redirect()->back()->with(['msg' => "Berhasil menambah surat jalan, dengan nomor $req->no_jalan"]);
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
