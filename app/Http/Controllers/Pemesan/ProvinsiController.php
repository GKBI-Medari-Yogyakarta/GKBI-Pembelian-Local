<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\ProvRequest;
use App\Model\Pemesan\Negara;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinsiController extends Controller
{
    public function index()
    {
        if (Auth::guard('pemesan')->check()) {
            return \redirect()->route('negara.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function create()
    {
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
    public function store(ProvRequest $req)
    {
        if (Auth::guard('pemesan')->check()) {
            Provinsi::create([
                'negara_id' => $req->negara_id,
                'nama' => \ucwords($req->nama),
                'alias' => \ucwords($req->alias),
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah provinsi $req->nama"]);
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
            $prov = Provinsi::find($id);
            $n = Negara::all();
            return \view('pemesan.alamat.prov.edit', \compact('prov', 'n'));
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
    public function update(Request $req, $id)
    {
        if (Auth::guard('pemesan')->check()) {
            $prov = Provinsi::find($id);
            $prov->negara_id = $req->negara_id;
            $prov->nama = \ucwords($req->nama);
            $prov->alias = \ucwords($req->alias);
            $prov->save();
            return \redirect()->route('negara.index')->with(['msg' => "Berhasil merubah provinsi $req->nama"]);
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
            $prov = Provinsi::find($id);
            $prov->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus provinsi $prov->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
