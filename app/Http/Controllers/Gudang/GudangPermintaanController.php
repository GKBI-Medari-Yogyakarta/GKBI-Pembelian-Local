<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\PesananRequest;
use App\Model\Bagian;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GudangPermintaanController extends Controller
{
    //to index
    public function index() {
        if (Auth::guard('gudang')->check()) {
            $permintaans = Permintaan::all();
            return \view('gudang.daftar-permintaan.index',\compact('permintaans'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function store() {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to detail
    public function show($id) {
        if (Auth::guard('gudang')->check()) {
            $unit = Bagian::all();
            $permintaan = Permintaan::find($id);
            return \view('gudang.daftar-permintaan.show',\compact('unit','permintaan'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function edit($id) {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(PesananRequest $req, $id) {
        $this->validate($req,[
            'gudang_stok'=>'required',
        ]);
        $pesanan = Permintaan::find($id);
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
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil merubah daftar permintaan dari $pesanan->pemesan"]);
    }
    //delete
    public function destroy($id) {
        //
    }
}
