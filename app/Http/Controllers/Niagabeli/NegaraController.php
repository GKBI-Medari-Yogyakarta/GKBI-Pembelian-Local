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
    public function index(Request $req)
    {
        $alamat = DB::table('negaras')
            ->join('provinsis', 'negaras.id', '=', 'provinsis.negara_id')
            ->join('kabupatens', 'provinsis.id', '=', 'kabupatens.prov_id')
            ->select('kabupatens.nama as nm_kab', 'provinsis.nama as nm_prov', 'negaras.nama', 'negaras.kode')
            ->get();
        // $n = Negara::when($req->negara, function ($query) use ($req) {
        //     $query->where('nama', 'like', "%{$req->negara}%")
        //         ->orwhere('kode', 'like', "%{$req->negara}%")
        //         ->orderBy('id', 'ASC');
        // })->paginate($req->limit ?? 10);
        // $n->appends($req->only('negara', 'limit'));
        // $alamat = DB::table('negaras')
        //     ->join('provinsis', 'negaras.id', '=', 'provinsis.negara_id')
        //     ->join('kabupatens', 'provinsis.id', '=', 'kabupatens.prov_id')
        //     ->select('kabupatens.nama as nm_kab', 'provinsis.nama as nm_prov', 'negaras.nama', 'negaras.kode')
        //     ->when($req->alamat, function ($query) use ($req) {
        //         $query->where('kabupatens.nama', 'like', "%{$req->alamat}%")
        //             ->orwhere('provinsis.nama', 'like', "%{$req->alamat}%")
        //             ->orwhere('negaras.nama', 'like', "%{$req->alamat}%")
        //             ->orderBy('negaras.id', 'ASC');
        //     })->paginate($req->limit ?? 10);
        // $alamat->appends($req->only('alamat', 'limit'));

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
