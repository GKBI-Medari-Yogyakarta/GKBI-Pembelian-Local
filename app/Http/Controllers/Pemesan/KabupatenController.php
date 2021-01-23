<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\KabRequest;
use App\Http\Requests\Pemesan\KabReqUpdate;
use App\Model\Pemesan\Kabupaten;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KabupatenController extends Controller
{
    public function index()
    {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function create(){
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KabRequest $req)
    {
        if (Auth::guard('pemesan')->check()) {
            // return $req->all();
            Kabupaten::create([
                'prov_id' => $req->prov_id,
                'nama' => \ucwords($req->nama),
                'kota' => \ucwords($req->kota),
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah kabupaten $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function show()
    {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('pemesan')->check()) {
            $kab = Kabupaten::find($id);
            $p = Provinsi::all();
            return \view('pemesan.alamat.kab.edit', \compact('kab', 'p'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
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
        if (Auth::guard('pemesan')->check()) {
            $k = Kabupaten::find($id);
            $k->nama = \ucwords($req->nama);
            $k->kota = \ucwords($req->kota);
            $k->prov_id = $req->prov_id;
            $k->save();
            return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah kabupaten $req->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('pemesan')->check()) {
            $kab = Kabupaten::find($id);
            $kab->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus kabupaten $kab->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
