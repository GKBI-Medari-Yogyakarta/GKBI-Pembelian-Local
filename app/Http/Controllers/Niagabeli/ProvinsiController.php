<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\ProvRequest;
use App\Model\Niagabeli\Provinsi;
use App\Model\Niagabeli\Negara;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    //to index
    public function index()
    {
        return \redirect()->route('negara.index');
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('negara.index');
    }
    //save / store data
    public function store(ProvRequest $req)
    {
        Provinsi::create([
            'negara_id' => $req->negara_id,
            'nama' => \ucwords($req->nama),
            'alias' => \ucwords($req->alias),
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah provinsi $req->nama"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('negara.index');
    }
    //to form edit
    public function edit($id)
    {
        $prov = Provinsi::findOrFail($id);
        $n = Negara::all();
        return \view('niagabeli.alamat.prov.edit', \compact('prov', 'n'));
    }
    //update
    public function update(Request $req, $id)
    {
        $prov = Provinsi::findOrFail($id);
        $prov->negara_id = $req->negara_id;
        $prov->nama = \ucwords($req->nama);
        $prov->alias = \ucwords($req->alias);
        $prov->save();
        return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah provinsi $req->nama"]);
    }
    //delete
    public function destroy($id)
    {
        $prov = Provinsi::findOrFail($id);
        $prov->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus provinsi $prov->nama"]);
    }
}
