<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;

class GudangPermintaanController extends Controller
{
    //to index
    public function index()
    {
        $permintaans = Permintaan::all();
        return \view('gudang.daftar-permintaan.index', \compact('permintaans'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('permintaan.index');
    }
    //nothing, just for completed of resources in routing
    public function store()
    {
        return \redirect()->route('permintaan.index');
    }
    //to detail
    public function show($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        return \view('gudang.daftar-permintaan.show', \compact('permintaan'));
    }
    //nothing, just for completed of resources in routing
    public function edit($id)
    {
        return \redirect()->route('permintaan.index');
    }
    //update
    public function update(Request $req, $id)
    {
        $pesanan = Permintaan::findOrFail($id);
        if ($req->input('action') == 'Simpan') {
            $this->validate($req, [
                'gudang_stok' => 'required',
            ]);
            if ($req->gudang_stok == '0') {
                $pesanan->gudang_stok = 'kosong';
                $pesanan->save();
            } else {
                $pesanan->gudang_stok = $req->gudang_stok;
                $pesanan->save();
            }
            return \redirect()->back()->with(['msg' => "Berhasil merubah daftar permintaan dari $pesanan->pemesan"]);
        } else if ($req->input('action') == 'acc') {
            $pesanan->status_direktur = '1';
            $pesanan->save();
            return \redirect()->back()->with(['msg' => "Permintaan pesanan dari $pesanan->pemesan berhasil di acc"]);
        }
    }
    //nothing, just for completed of resources in routing
    public function destroy()
    {
        return \redirect()->route('permintaan.index');
    }
}
