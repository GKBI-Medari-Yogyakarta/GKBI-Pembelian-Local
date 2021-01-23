<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\NegaraRequest;
use App\Http\Requests\Pemesan\NegaraReqUpdate;
use App\Model\Pemesan\Kabupaten;
use App\Model\Pemesan\Negara;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class NegaraController extends Controller
{
    //to index
    public function index() {
        if (Auth::guard('pemesan')->check()) {
            $alamat = DB::table('negaras')
                ->join('provinsis', 'negaras.id', '=', 'provinsis.negara_id')
                ->join('kabupatens', 'provinsis.id', '=', 'kabupatens.prov_id')
                ->select('kabupatens.nama as nm_kab', 'provinsis.nama as nm_prov', 'negaras.nama', 'negaras.kode')
                ->paginate(10);
            $n = Negara::paginate(5);
            $p = Provinsi::paginate(5);
            $k = Kabupaten::paginate(5);
            return \view('pemesan.alamat.index', \compact('alamat', 'n', 'p', 'k'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(NegaraRequest $req) {
        if (Auth::guard('pemesan')->check()) {
            Negara::create([
                'nama' => \ucwords($req->nama),
                'kode' => $req->kode,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah negara $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::guard('pemesan')->check()) {
            $negara = Negara::find($id);
            return \view('pemesan.alamat.negara.edit', \compact('negara'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(NegaraReqUpdate $req,  $id) {
        if (Auth::guard('pemesan')->check()) {
            $negara = Negara::find($id);
            $negara->nama = \ucwords($req->nama);
            $negara->kode = $req->kode;
            $negara->save();
            return \redirect()->route('negara.index')->with(['msg' => "Berhasil mengubah negara $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::guard('pemesan')->check()) {
            $negara = Negara::find($id);
            $negara->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus negara $negara->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
