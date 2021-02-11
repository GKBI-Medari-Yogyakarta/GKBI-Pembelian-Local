<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\ProvRequest;
use App\Model\Niagabeli\Negara;
use App\Model\Niagabeli\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinsiController extends Controller
{
    //to index
    public function index()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(ProvRequest $req)
    {
        if (Auth::guard('pembelian')->check()) {
            Provinsi::create([
                'negara_id' => $req->negara_id,
                'nama' => \ucwords($req->nama),
                'alias' => \ucwords($req->alias),
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah provinsi $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $prov = Provinsi::find($id);
            $n = Negara::all();
            return \view('niagabeli.alamat.prov.edit', \compact('prov', 'n'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(Request $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $prov = Provinsi::find($id);
            $prov->negara_id = $req->negara_id;
            $prov->nama = \ucwords($req->nama);
            $prov->alias = \ucwords($req->alias);
            $prov->save();
            return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah provinsi $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $prov = Provinsi::find($id);
            $prov->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus provinsi $prov->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
