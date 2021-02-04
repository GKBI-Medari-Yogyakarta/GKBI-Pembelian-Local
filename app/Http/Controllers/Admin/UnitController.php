<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BagianReqUpdate;
use App\Http\Requests\UnitRequest;
use App\Http\Requests\UnitReqUpdate;
use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    //to index
    public function index() {
        if (Auth::check()) {
            $unit = Unit::paginate(10);
            return \view('admin.unit.index', \compact('unit'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::check()) {
            return \redirect()->route('admin-unit.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(UnitRequest $req) {
        if (Auth::check()) {
            Unit::create([
                'nama' => $req->nama,
                'alias' => $req->alias,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah data unit $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::check()) {
            return \redirect()->route('admin-unit.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::check()) {
            $unit = Unit::find($id);
            return \view('admin.unit.edit', \compact('unit'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(UnitReqUpdate $req, $id) {
        if (Auth::check()) {
            $unit = Unit::find($id);
            $unit->nama = $req->nama;
            $unit->alias = $req->alias;
            $unit->save();
            return \redirect()->route('admin-unit.index')->with(['msg' => "Berhasil merubah data unit $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::check()) {
            $unit = Unit::find($id);
            $unit->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus data unit $unit->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
