<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\PesananRequest;
use App\Model\Bagian;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    //to index
    public function index() {
        if (Auth::guard('pemesan')->check()) {
            $unit = Bagian::all();
            $permintaan = DB::table('permintaans')
            ->select('id','nm_barang','spesifikasi','unit_stok','gudang_stok','jumlah','tgl_diperlukan','keterangan','bagian_id')
            ->get();
            return \view('pemesan.permintaan.index',\compact('unit','permintaan'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('permintaan-pembelian.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(PesananRequest $req) {
        if (Auth::guard('pemesan')->check()) {
            $user_pemesan_id = Auth::guard('pemesan')->user()->getAuthIdentifier();
            Permintaan::create([
                'pemesan' => $req->pemesan,
                'no_pemesan' => $req->no_pemesan,
                'tgl_pesanan' => $req->tgl_pesanan,
                'nm_barang' => $req->nm_barang,
                'spesifikasi' => $req->spesifikasi,
                'unit_stok' => $req->unit_stok,
                'gudang_stok' => $req->gudang_stok,
                'jumlah'=>$req->jumlah,
                'tgl_diperlukan' => $req->tgl_diperlukan,
                'bagian_id' => $req->bagian_id,
                'user_pemesan_id'=> $user_pemesan_id,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah daftar permintaan dari $req->pemesan"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //detail
    public function show($id) {
        if (Auth::guard('pemesan')->check()) {
            $unit = Bagian::all();
            $permintaan = Permintaan::find($id);
            return \view('pemesan.permintaan.show',\compact('permintaan','unit'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit() {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('permintaan-pembelian.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(PesananRequest $req, $id) {
        if (Auth::guard('pemesan')->check()) {
            $pesanan = Permintaan::find($id);
            $user_pemesan_id = Auth::guard('pemesan')->user()->getAuthIdentifier();
            $pesanan->update([
                'pemesan' => $req->pemesan,
                'no_pemesan' => $req->no_pemesan,
                'tgl_pesanan' => $req->tgl_pesanan,
                'nm_barang' => $req->nm_barang,
                'spesifikasi' => $req->spesifikasi,
                'unit_stok' => $req->unit_stok,
                'gudang_stok' => $req->gudang_stok,
                'jumlah'=>$req->jumlah,
                'tgl_diperlukan' => $req->tgl_diperlukan,
                'bagian_id' => $req->bagian_id,
                'user_pemesan_id' => $user_pemesan_id,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil merubah daftar permintaan dari $pesanan->pemesan"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::guard('pemesan')->check()) {
            $pesanan = Permintaan::find($id);
            if ($pesanan->status_direktur == '1') {
                return \redirect()->back()->with(['msg' => "Tidak dapat menghapus daftar permintaan dari $pesanan->pemesan, karena sudah disahkan oleh direktur"]);
            }
            $pesanan->delete();
            return \redirect()->route('permintaan-pembelian.index')->with(['msg' => "Berhasil menghapus daftar permintaan dari $pesanan->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
