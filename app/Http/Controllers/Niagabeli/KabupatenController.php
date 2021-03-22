<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\KabRequest;
use App\Http\Requests\Niagabeli\KabReqUpdate;
use App\Model\Niagabeli\Kabupaten;
use App\Model\Niagabeli\Provinsi;

class KabupatenController extends Controller
{
    //to index
    public function index()
    {
        return \redirect()->route('negara.index');
    }
    //to form create / make
    public function create()
    {
        return \redirect()->route('negara.index');
    }
    //store / save data
    public function store(KabRequest $req)
    {
        Kabupaten::create([
            'prov_id' => $req->prov_id,
            'nama' => \ucwords($req->nama),
            'kota' => \ucwords($req->kota),
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah kabupaten $req->nama"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('negara.index');
    }
    //to form edit
    public function edit($id)
    {
        $kab = Kabupaten::findOrFail($id);
        $p = Provinsi::all();
        return \view('niagabeli.alamat.kab.edit', \compact('kab', 'p'));
    }
    //update
    public function update(KabReqUpdate $req, $id)
    {
        $k = Kabupaten::findOrFail($id);
        $k->nama = \ucwords($req->nama);
        $k->kota = \ucwords($req->kota);
        $k->prov_id = $req->prov_id;
        $k->save();
        return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah kabupaten $req->nama"]);
    }
    //delete / hapus
    public function destroy($id)
    {
        $kab = Kabupaten::findOrFail($id);
        $kab->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus kabupaten $kab->name"]);
    }
}
