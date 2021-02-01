<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\KabRequest;
use App\Http\Requests\Niagabeli\KabReqUpdate;
use App\Model\Niagabeli\Kabupaten;
use App\Model\Niagabeli\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KabupatenController extends Controller
{
    //to index
    public function index() {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form create / make
    public function create() {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //store / save data
    public function store(KabRequest $req) {
        if (Auth::guard('pembelian')->check()) {
            Kabupaten::create([
                'prov_id' => $req->prov_id,
                'nama' => \ucwords($req->nama),
                'kota' => \ucwords($req->kota),
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah kabupaten $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::guard('pembelian')->check()) {
            $kab = Kabupaten::find($id);
            $p = Provinsi::all();
            return \view('niagabeli.alamat.kab.edit', \compact('kab', 'p'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(KabReqUpdate $req, $id) {
        if (Auth::guard('pembelian')->check()) {
            $k = Kabupaten::find($id);
            $k->nama = \ucwords($req->nama);
            $k->kota = \ucwords($req->kota);
            $k->prov_id = $req->prov_id;
            $k->save();
            return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah kabupaten $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete / hapus
    public function destroy($id) {
        if (Auth::guard('pembelian')->check()) {
            $kab = Kabupaten::find($id);
            $kab->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus kabupaten $kab->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
