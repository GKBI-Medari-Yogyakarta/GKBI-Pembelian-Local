<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BagianRequest;
use App\Http\Requests\BagianReqUpdate;
use App\Model\Bagian;
use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagianController extends Controller
{
    //to index
    public function index() {
        if (Auth::check()) {
            $bagian = DB::table('bagians')
            ->join('units', 'units.id', '=', 'bagians.unit_id')
            ->select('units.nama as nm_akt', 'bagians.nama as nm_bagian', 'bagians.no_identitas', 'bagians.id')
            ->paginate(10);
            $unit = Unit::all();
            return \view('admin.bagian.index', \compact('bagian', 'unit'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::check()) {
            return \redirect()->route('admin-bagian.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(BagianRequest $req) {
        if (Auth::check()) {
            Bagian::create([
                'no_identitas' => $req->no_identitas,
                'unit_id' => $req->unit_id,
                'nama' => $req->nama,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah data bagian $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::check()) {
            return \redirect()->route('admin-bagian.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::check()) {
            $bagian = Bagian::find($id);
            $b = DB::table('bagians')->where('id', $id)->get();
            $unit = Unit::all();
            return \view('admin.bagian.edit', \compact('bagian', 'unit', 'b'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(BagianReqUpdate $req, $id) {
        if (Auth::check()) {
            $bagian = Bagian::find($id);
            $bagian->no_identitas = $req->no_identitas;
            $bagian->unit_id = $req->unit_id;
            $bagian->nama = $req->nama;
            $bagian->save();
            return \redirect()->route('admin-bagian.index')->with(['msg' => "Berhasil merubah data bagian $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::check()) {
            $bagian = Bagian::find($id);
            $bagian->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus data bagian $bagian->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
