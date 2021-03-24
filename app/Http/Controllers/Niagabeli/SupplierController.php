<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SupplierReqUpdate;
use App\Http\Requests\Niagabeli\SupplierRequest;
use App\Model\Niagabeli\Kabupaten;
use Illuminate\Support\Facades\DB;
use App\Model\Niagabeli\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //to index
    public function index(Request $req)
    {
        $kabupatens = Kabupaten::all();
        $supplier = DB::table('suppliers as s')
            ->join('kabupatens as k', 'k.id', '=', 's.kab_id')
            ->join('provinsis as p', 'p.id', '=', 'k.prov_id')
            ->select('s.*', 'k.nama as nm_kab', 'p.nama as nm_prov')
            ->when($req->searching, function ($query) use ($req) {
                $query->where('s.nama', 'like', "%{$req->searching}%")
                    ->orwhere('s.attn', 'like', "%{$req->searching}%")
                    ->orwhere('p.nama', 'like', "%{$req->searching}%")
                    ->orwhere('k.nama', 'like', "%{$req->searching}%");
            })->orderBy('s.id', 'ASC')
            ->paginate($req->limit ?? 10);
        $supplier->appends($req->only('seacrching', 'limit'));
        return \view('niagabeli.supplier.index', \compact('kabupatens', 'supplier'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {

        return \redirect()->route('supplier.index');
    }
    public function store(SupplierRequest $req)
    {
        Supplier::create([
            'kab_id' => $req->kab_id,
            'nama' => $req->nama,
            'telp' => $req->telp,
            'fax' => $req->fax,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'attn' => $req->attn,
            'npwp' => $req->npwp,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah data supplier $req->nama"]);
    }
    //nothing, just for completed of resources in routing
    public function show($id)
    {
        return \redirect()->route('supplier.index');
    }
    public function edit($id)
    {
        $s = Supplier::findOrFail($id);
        $k = Kabupaten::all();
        return \view('niagabeli.supplier.edit', \compact('s', 'k'));
    }

    public function update(SupplierReqUpdate $req, $id)
    {
        $s = Supplier::findOrFail($id);
        $s->kab_id = $req->kab_id;
        $s->nama = $req->nama;
        $s->telp = $req->telp;
        $s->fax = $req->fax;
        $s->alamat = $req->alamat;
        $s->email = $req->email;
        $s->attn = $req->attn;
        $s->npwp = $req->attn;
        $s->save();
        return \redirect()->route('supplier.index')->with(['msg' => "Berhasil merubah data supplier $req->nama"]);
    }

    public function destroy($id)
    {
        $s = Supplier::find($id);
        $s->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus data supplier $s->nama"]);
    }
}
