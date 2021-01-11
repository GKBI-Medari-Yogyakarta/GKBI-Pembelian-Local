<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\KabRequest;
use App\Model\Pemesan\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
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
            'nama' => $req->nama,
            'kota' => $req->kota,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
