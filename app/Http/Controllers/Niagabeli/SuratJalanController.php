<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratJalanRequest;
use App\Model\Niagabeli\SuratIjinMasuk;
use Illuminate\Support\Facades\Auth;
use App\Model\Niagabeli\SuratJalan;
use Illuminate\Support\Facades\DB;
use App\Model\Gudang\BarangDatang;
use App\Model\Niagabeli\SPBarang;
use App\Model\Pemesan\Permintaan;

class SuratJalanController extends Controller
{
    public function index()
    {
        $barang_datang = DB::table('s_p_barangs as spb')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('b.nama', 'p.pemesan', 'p.nm_barang', 't.status_beli', 'spb.id')
            ->where('t.status_beli', '=', '1')
            ->orderBy('id', 'ASC')
            ->get();
        $surat_jalan = DB::table('s_p_barangs as spb')
            ->join('surat_jalans as sj', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('p.pemesan', 'sj.*')
            ->where('t.status_beli', '=', '1')
            ->get();
        return view('niagabeli.surat-jalan.index', \compact('barang_datang', 'surat_jalan'));
    }
    public function create()
    {
        return \redirect()->route('jalan.index');
    }
    public function store($id)
    {
        $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
        $spb = SPBarang::findOrFail($id);
        $permintaan = Permintaan::findOrFail($spb->transaction->permintaan_id);
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
    }
    public function show($id)
    {
        $sj = SuratJalan::findOrFail($id);
        return \view('niagabeli.surat-jalan.edit', \compact('sj'));
    }
    public function edit($id)
    {
        $sj = SuratJalan::findOrFail($id);
        return \view('niagabeli.surat-jalan.edit', \compact('sj'));
    }

    public function update(SuratJalanRequest $req, $id)
    {
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
    }

    public function destroy($id)
    {
        $sj = SuratJalan::findOrFail($id);
        $sim = SuratIjinMasuk::where('s_jln_id', $sj->id)->first();
        if (!empty($sim->no_ijin)) return redirect()->back()->with(['danger' => 'Barang sudah memiliki nomor ijin, TIDAK BOLEH DIHAPUS!!']);
        $sj->delete();
        return redirect()->back()->with(['msg' => "Berhasil menghapus surat jalan, dengan nomor $sj->no_jalan"]);
    }
}
