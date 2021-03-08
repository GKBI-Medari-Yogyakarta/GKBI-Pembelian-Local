<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratJalanRequest;
use App\Model\Gudang\BarangDatang;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\SuratIjinMasuk;
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
            $surat_jalan = DB::table('s_p_barangs as spb')
                ->join('surat_jalans as sj', 'spb.id', '=', 'sj.spb_id')
                ->join('surat_ijin_masuks as sim', 'sj.id', '=', 'sim.s_jln_id')
                ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
                ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
                ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
                ->select('p.pemesan', 'sj.*', 'sim.no_ijin')
                ->where('t.status_beli', '=', '1')
                ->get();
            return view('niagabeli.surat-jalan.index', \compact('barang_datang', 'surat_jalan'));
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function create()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('jalan.index');
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
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
        if (Auth::guard('pembelian')->check()) {
            $sj = SuratJalan::findOrFail($id);
            return \view('niagabeli.surat-jalan.edit', \compact('sj'));
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $sj = SuratJalan::findOrFail($id);
            return \view('niagabeli.surat-jalan.edit', \compact('sj'));
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function update(SuratJalanRequest $req, $id)
    {
        //        dd($id);
        if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            $sj = SuratJalan::findOrFail($id);
            $suratIjinMasuk = SuratIjinMasuk::where('s_jln_id', $sj->id)->first();
            $barangDatang = BarangDatang::where('s_jln_id', $sj->id)->first();
            DB::beginTransaction();
            if (isset($suratIjinMasuk->s_jln_id) && isset($barangDatang->s_jln_id)) {
                $sj->update([
                    'no_jalan' => $req->no_jalan,
                    'tgl_' => $req->tgl_,
                    'arsip' => $req->arsip,
                    'user_id' => $user_pembelian_id,
                ]);
                DB::commit();
                return redirect()->route('jalan.index')->with(['msg' => "Berhasil mengubah surat jalan, dengan nomor $req->no_jalan"]);
            } else {
                try {
                    $sj->update([
                        'no_jalan' => $req->no_jalan,
                        'tgl_' => $req->tgl_,
                        'arsip' => $req->arsip,
                        'user_id' => $user_pembelian_id,
                    ]);
                    DB::statement("call surat_update(?,?,?,?)", [$sj->id, $user_pembelian_id, now(), now()]);
                    DB::commit();
                    return redirect()->route('jalan.index')->with(['msg' => "Berhasil mengubah surat jalan, dengan nomor $req->no_jalan"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()
                        ->with('warning', 'Something Went Wrong!, tidak berhasil merubah data!!');
                }
            }
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function destroy($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $sj = SuratJalan::findOrFail($id);
            $sj->delete();
            return redirect()->back()->with(['msg' => "Berhasil menghapus surat jalan, dengan nomor $sj->no_jalan"]);
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
