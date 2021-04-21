<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitReqUpdate;
use App\Http\Requests\UnitRequest;
use App\Model\Unit;

class UnitController extends Controller
{
    //to index
    public function index()
    {
        $unit = Unit::paginate(10);
        return \view('admin.unit.index', \compact('unit'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('admin-unit.index');
    }
    //save / store data
    public function store(UnitRequest $req)
    {
        Unit::create([
            'nama' => $req->nama,
            'alias' => $req->alias,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah data unit $req->nama"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('admin-unit.index');
    }
    //to form edit
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return \view('admin.unit.edit', \compact('unit'));
    }
    //update
    public function update(UnitReqUpdate $req, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->nama = $req->nama;
        $unit->alias = $req->alias;
        $unit->save();
        return \redirect()->route('admin-unit.index')->with(['msg' => "Berhasil merubah data unit $req->nama"]);
    }
    //delete
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus data unit $unit->nama"]);
    }
}
