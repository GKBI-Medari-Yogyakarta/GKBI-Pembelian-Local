<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\PesananRequest;
use App\Model\Pemesan\PermintaanTemporary;
use Illuminate\Support\Facades\Auth;
use App\Model\Niagabeli\Transaction;
use Illuminate\Support\Facades\DB;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use App\Model\Bagian;

class PermintaanController extends Controller
{
    //to index
    public function index(Request $req)
    {
        $unit = Bagian::all();
        $permintaan = Permintaan::when($req->keyword, function ($query) use ($req) {
            $query->where('nm_barang', 'like', "%{$req->keyword}%")
                ->orwhere('kd_barang', 'like', "%{$req->keyword}%")
                ->orderBy('id', 'ASC');
        })->paginate($req->limit ?? 10);
        $permintaan->appends($req->only('keyword', 'limit'));
        return \view('pemesan.permintaan.index', \compact('unit', 'permintaan'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('permintaan-pembelian.index');
    }
    //save / store data
    public function store(PesananRequest $req)
    {
        $user_pemesan_id = Auth::guard('pemesan')->user()->getAuthIdentifier();
        Permintaan::create([
            'pemesan' => $req->pemesan,
            'no_pemesan' => $req->no_pemesan,
            'tgl_pesanan' => $req->tgl_pesanan,
            'nm_barang' => $req->nm_barang,
            'kd_barang' => $req->kd_barang,
            'spesifikasi' => $req->spesifikasi,
            'unit_stok' => $req->unit_stok,
            'gudang_stok' => $req->gudang_stok,
            'jumlah' => $req->jumlah,
            'tgl_diperlukan' => $req->tgl_diperlukan,
            'bagian_id' => $req->bagian_id,
            'user_pemesan_id' => $user_pemesan_id,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah daftar permintaan dari $req->pemesan"]);
    }
    //detail
    public function show($id)
    {
        $unit = Bagian::all();
        $permintaan = Permintaan::findOrFail($id);
        $t = DB::table('transactions as t')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->select('t.tgl_status', 't.no_niaga')
            ->where('t.id', $permintaan->id)->first();
        return \view('pemesan.permintaan.show', \compact('permintaan', 'unit', 't'));
    }
    //to form edit
    public function edit()
    {
        return \redirect()->route('permintaan-pembelian.index');
    }
    //update
    public function update(Request $req, $id)
    {
        $pesanan = Permintaan::findOrFail($id);
        $user_pemesan_id = Auth::guard('pemesan')->user()->getAuthIdentifier();
        if ($req->input('action') == 'Simpan') {
            $this->validate($req,[
                'no_pemesan'=>'required',
                'tgl_pesanan'=>'required',
                'unit_stok'=>'required',
                'tgl_diperlukan'=>'required',
            ],[
                'no_pemesan.required'=>'no pemesan belum diisi. TIDAK BOLEH KOSONG!!',
                'tgl_pesanan.required'=>'tanggal pesanan belum diisi. TIDAK BOLEH KOSONG!!',
                'unit_stok.required'=>'stok dari unit belum diisi. TIDAK BOLEH KOSONG!!',
                'tgl_diperlukan.required'=>'tanggal diperlukan belum diisi. TIDAK BOLEH KOSONG!!',
            ]);
            $pesanan->update([
                'pemesan' => $req->pemesan,
                'no_pemesan' => $req->no_pemesan,
                'tgl_pesanan' => $req->tgl_pesanan,
                'nm_barang' => $req->nm_barang,
                'kd_barang' => $req->kd_barang,
                'spesifikasi' => $req->spesifikasi,
                'unit_stok' => $req->unit_stok,
                'jumlah' => $req->jumlah,
                'tgl_diperlukan' => $req->tgl_diperlukan,
                'bagian_id' => $req->bagian_id,
                'user_pemesan_id' => $user_pemesan_id,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil merubah daftar permintaan dari $pesanan->pemesan"]);
        } else if ($req->input('action') == 'acc') {
            DB::beginTransaction();
            try {
                Transaction::create([
                    'permintaan_id' => $pesanan->id,
                    'rencana_beli' => $pesanan->jumlah,
                ]);
                $pesanan->status_direktur = '1';
                $pesanan->save();
                DB::commit();
                return \redirect()->back()->with(['msg' => "Permintaan pesanan dari $pesanan->pemesan berhasil di acc"]);
            } catch (\Exception $e) {
                DB::rollBack();
                return \redirect()->back()->with(['msg' => 'something went wrong!!']);
            }
        } else if ($req->input('action') == 'tidak') {
            DB::beginTransaction();
            try {
                PermintaanTemporary::create([
                    'pemesan' => $pesanan->pemesan,
                    'no_pemesan' => $pesanan->no_pemesan,
                    'tgl_pesanan' => $pesanan->tgl_pesanan,
                    'nm_barang' => $pesanan->nm_barang,
                    'kd_barang' => $pesanan->kd_barang,
                    'spesifikasi' => $pesanan->spesifikasi,
                    'unit_stok' => $pesanan->unit_stok,
                    'gudang_stok' => $pesanan->gudang_stok,
                    'jumlah' => $pesanan->jumlah,
                    'tgl_diperlukan' => $pesanan->tgl_diperlukan,
                    'bagian_id' => $pesanan->bagian_id,
                    'user_pemesan_id' => $pesanan->user_pemesan_id,
                    'status_ka_bpemesan' => $pesanan->status_ka_bpemesan,
                    'status_ka_unit' => $pesanan->status_ka_unit,
                    'status_direktur' => $pesanan->status_direktur,
                ]);
                $pesanan->status_direktur = '0';
                $pesanan->save();
                DB::commit();
                return \redirect()->back()->with(['danger' => "Permintaan pesanan dari $pesanan->pemesan ditolak!!"]);
            } catch (\Exception $e) {
                DB::rollBack();
                return \redirect()->back()->with(['msg' => 'something went wrong!!']);
            }
        }
        return \redirect()->back()->with(['msg' => 'tidak ada aksi!!']);
    }
    //delete
    public function destroy($id)
    {
        $pesanan = Permintaan::findOrFail($id);
        if ($pesanan->status_direktur == '1') {
            return \redirect()->back()->with(['msg' => "Tidak dapat menghapus daftar permintaan dari $pesanan->pemesan, karena sudah disahkan oleh direktur"]);
        }
        DB::beginTransaction();
        try {
            PermintaanTemporary::create([
                'pemesan' => $pesanan->pemesan,
                'no_pemesan' => $pesanan->no_pemesan,
                'tgl_pesanan' => $pesanan->tgl_pesanan,
                'nm_barang' => $pesanan->nm_barang,
                'spesifikasi' => $pesanan->spesifikasi,
                'unit_stok' => $pesanan->unit_stok,
                'gudang_stok' => $pesanan->gudang_stok,
                'jumlah' => $pesanan->jumlah,
                'tgl_diperlukan' => $pesanan->tgl_diperlukan,
                'bagian_id' => $pesanan->bagian_id,
                'user_pemesan_id' => $pesanan->user_pemesan_id,
                'status_ka_bpemesan' => $pesanan->status_ka_bpemesan,
                'status_ka_unit' => $pesanan->status_ka_unit,
                'status_direktur' => $pesanan->status_direktur,
            ]);
            $pesanan->delete();
            return \redirect()->route('permintaan-pembelian.index')->with(['msg' => "Berhasil menghapus daftar permintaan dari $pesanan->nama"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return \redirect()->back()->with(['msg' => 'something went wrong!!']);
        }
    }
}
