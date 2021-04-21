<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\NegaraRequest;
use App\Http\Requests\Niagabeli\NegaraReqUpdate;
use App\Model\Niagabeli\Kabupaten;
use App\Model\Niagabeli\Negara;
use App\Model\Niagabeli\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegaraController extends Controller
{
    //to index
    public function index()
    {
        $alamat = DB::table('kabupatens as k')
            ->join('provinsis as p', 'p.id', 'k.prov_id')
            ->join('negaras as n', 'n.id', '=', 'p.negara_id')
            ->select('k.*', 'p.nama as nm_prov', 'n.nama as nm_negara', 'n.kode')
            ->get();
        $n = Negara::paginate(3);
        $p = Provinsi::paginate(3);
        $k = Kabupaten::paginate(3);
        return \view('niagabeli.alamat.index', \compact('alamat', 'n', 'p', 'k'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('negara.index');
    }
    //save / store data
    public function store(NegaraRequest $req)
    {
        Negara::create([
            'nama' => \ucwords($req->nama),
            'kode' => $req->kode,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah negara $req->nama"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('negara.index');
    }
    //to form edit
    public function edit($id)
    {
        $negara = Negara::findOrFail($id);
        return \view('niagabeli.alamat.negara.edit', \compact('negara'));
    }
    //update
    public function update(NegaraReqUpdate $req,  $id)
    {
        $negara = Negara::findOrFail($id);
        $negara->nama = \ucwords($req->nama);
        $negara->kode = $req->kode;
        $negara->save();
        return \redirect()->route('negara.index')->with(['msg' => "Berhasil mengubah negara $req->nama"]);
    }
    //delete
    public function destroy($id)
    {
        $negara = Negara::findOrFail($id);
        $negara->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus negara $negara->nama"]);
    }
}
