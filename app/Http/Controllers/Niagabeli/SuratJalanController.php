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
            //            $permintaan = DB::table('transactions as t')
            //                ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            //                ->select('p.nm_barang', 'p.spesifikasi', 'p.unit_stok', 'p.gudang_stok', 'p.tgl_diperlukan', 'p.realisasi', 'p.keterangan', 't.*')
            //                ->paginate(10);
            $surat_jalan = SuratJalan::all();
            return view('niagabeli.surat-jalan.index', \compact('surat_jalan'));
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
