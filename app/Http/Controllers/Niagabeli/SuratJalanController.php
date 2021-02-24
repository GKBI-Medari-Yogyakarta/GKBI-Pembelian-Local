<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratJalanRequest;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\SuratJalan;
use App\Model\Pemesan\Permintaan;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
    public function store($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            $spb = SPBarang::find($id);
            $permintaan = Permintaan::find($spb->transaction->permintaan_id);
            $status = SuratJalan::where('spb_id', $spb->id)->first();
            if (isset($status->spb_id)) {
                return redirect()->back()->with(['msg' => "Permintaan dari $permintaan->pemesan untuk barang $permintaan->nm_barang Sudah ditambahkan"]);
            } else {
                SuratJalan::create([
                    'spb_id' => $spb->id,
                    'user_id' => $user_pembelian_id,
                ]);
                return redirect()->back()->with(['msg' => "Berhasil menambah surat jalan, permintaan dari $permintaan->pemesan untuk barang $permintaan->nm_barang "]);
            }
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function show($id)
    {
        return SPBarang::findOrFail($id);
        //
    }
    public function edit($id)
    {
        // \dd('ok');
        if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            $spb = SPBarang::find($id);
            \dd($spb);
            // SuratJalan::create([
            //     'no_jalan' => $req->no_jalan,
            //     'tgl_' => $req->tgl_,
            //     'spb_id' => $req->spb_id,
            //     'user_id' => $user_pembelian_id,
            // ]);
            return redirect()->back()->with(['msg' => "Berhasil menambah surat jalan, dengan nomor $spb->no_jalan"]);
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function update(Request $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            $spb = SPBarang::find($id);
            \dd($spb);
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

    public function destroy($id)
    {
        //
    }
}
