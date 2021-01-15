<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\KabRequest;
use App\Http\Requests\Pemesan\KabReqUpdate;
use App\Model\Pemesan\Kabupaten;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index()
    {
        return \redirect()->route('negara.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KabRequest $req)
    {
        // return $req->all();
        Kabupaten::create([
            'prov_id' => $req->prov_id,
            'nama' => \ucwords($req->nama),
            'kota' => \ucwords($req->kota),
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah kabupaten $req->nama"]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kab = Kabupaten::find($id);
        $p = Provinsi::all();
        return \view('pemesan.alamat.kab.edit', \compact('kab', 'p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KabReqUpdate $req, $id)
    {
        $k = Kabupaten::find($id);
        $k->nama = \ucwords($req->nama);
        $k->kota = \ucwords($req->kota);
        $k->prov_id = $req->prov_id;
        $k->save();
        return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah kabupaten $req->nama"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kab = Kabupaten::find($id);
        $kab->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus kabupaten $kab->name"]);
    }
}
