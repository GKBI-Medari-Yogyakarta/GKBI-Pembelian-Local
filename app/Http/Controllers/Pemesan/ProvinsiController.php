<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\ProvRequest;
use App\Model\Pemesan\Negara;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvRequest $req)
    {
        Provinsi::create([
            'negara_id' => $req->negara_id,
            'nama' => $req->nama,
            'alias' => $req->alias,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah provinsi $req->nama"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prov = Provinsi::find($id);
        return \view('pemesan.alamat.prov.edit', $prov->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $prov = Provinsi::find($id);
        $prov->negara_id = $req->negara_id;
        $prov->nama = $req->nama;
        $prov->alias = $req->alias;
        $prov->save();
        return \redirect()->route('prov.index')->with(['msg' => "Berhasil merubah provinsi $req->nama"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prov = Provinsi::find($id);
        $prov->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus provinsi $prov->name"]);
    }
}
