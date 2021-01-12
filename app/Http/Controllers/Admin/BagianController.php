<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BagianRequest;
use App\Http\Requests\BagianReqUpdate;
use App\Model\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = Bagian::paginate(10);
        return \view('admin.bagian.index', \compact('bagian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BagianRequest $req)
    {
        Bagian::create([
            'no_identitas' => $req->no_identitas,
            'unit_id' => $req->unit_id,
            'nama' => $req->nama,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah data bagian $req->nama"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bagian = Bagian::find($id);
        return \view('admin.bagian.edit', \compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BagianReqUpdate $req, $id)
    {
        $bagian = Bagian::find($id);
        $bagian->no_identitas = $req->no_identitas;
        $bagian->unit_id = $req->unit_id;
        $bagian->nama = $req->nama;
        $bagian->save();
        return \redirect()->route('admin-bagian.index')->with(['msg' => "Berhasil merubah data bagian $req->nama"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian = Bagian::find($id);
        $bagian->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus data bagian $bagian->nama"]);
    }
}
