<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SupplierRequest;
use App\Http\Requests\Niagabeli\SupplierReqUpdate;
use App\Model\Niagabeli\Kabupaten;
use App\Model\Niagabeli\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //to index
    public function index()
    {
        if (Auth::guard('pembelian')->check()) {
            $kabupatens = Kabupaten::all();
            $supplier = DB::table('suppliers as s')
                ->join('kabupatens as k', 'k.id', '=', 's.kab_id')
                ->join('provinsis as p', 'p.id', '=', 'k.prov_id')
                ->select('s.*', 'k.nama as nm_kab', 'p.nama as nm_prov')
                ->paginate(10);
            return \view('niagabeli.supplier.index', \compact('kabupatens', 'supplier'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function store(SupplierRequest $req)
    {
        if (Auth::guard('pembelian')->check()) {
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
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show($id)
    {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function edit($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $s = Supplier::find($id);
            $k = Kabupaten::all();
            return \view('niagabeli.supplier.edit', \compact('s', 'k'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function update(SupplierReqUpdate $req, $id)
    {
        if (Auth::guard('pembelian')->check()) {
            $s = Supplier::find($id);
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
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function destroy($id)
    {
        if (Auth::guard('pembelian')->check()) {
            $s = Supplier::find($id);
            $s->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus data supplier $s->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
