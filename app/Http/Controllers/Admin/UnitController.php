<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BagianReqUpdate;
use App\Http\Requests\UnitRequest;
use App\Http\Requests\UnitReqUpdate;
use App\Model\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $unit = Unit::paginate(10);
        return \view('admin.unit.index', \compact('unit'));
    }
    public function create() {
        return \redirect()->route('admin-unit.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $req) {
        Unit::create([
            'nama' => $req->nama,
            'alias' => $req->alias,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah data unit $req->nama"]);
    }
    public function show() {
        return \redirect()->route('admin-unit.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $unit = Unit::find($id);
        return \view('admin.unit.edit', \compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitReqUpdate $req, $id) {
        $unit = Unit::find($id);
        $unit->nama = $req->nama;
        $unit->alias = $req->alias;
        $unit->save();
        return \redirect()->route('admin-unit.index')->with(['msg' => "Berhasil merubah data unit $req->nama"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $unit = Unit::find($id);
        $unit->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus data unit $unit->nama"]);
    }
}
