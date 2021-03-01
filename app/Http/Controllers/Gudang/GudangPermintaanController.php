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
    public function index()
    {
        if (Auth::guard('gudang')->check()) {
            $permintaans = Permintaan::all();
            return \view('gudang.daftar-permintaan.index', \compact('permintaans'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function store()
    {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to detail
    public function show($id)
    {
        if (Auth::guard('gudang')->check()) {
            $permintaan = Permintaan::find($id);
            return \view('gudang.daftar-permintaan.show', \compact('permintaan'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function edit($id)
    {
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(Request $req, $id)
    {
        $pesanan = Permintaan::find($id);
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
        if (Auth::guard('gudang')->check()) {
            return \redirect()->route('permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
