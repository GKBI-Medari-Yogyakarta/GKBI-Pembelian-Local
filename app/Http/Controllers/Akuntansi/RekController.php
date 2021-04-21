<?php

namespace App\Http\Controllers\Akuntansi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akuntansi\RekReqUpdate;
use App\Http\Requests\Akuntansi\RekRequest;
use App\Model\Akuntansi\Rekening;
use App\Model\Niagabeli\Supplier;

class RekController extends Controller
{
    //to index
    public function index()
    {
        $rek = Rekening::all();
        $sup = Supplier::all();
        return \view('akuntansi.rek.index', \compact('rek', 'sup'));
    }
    //nothing, just for completed of resources in routing
    public function create()
    {
        return \redirect()->route('akuntansi.index');
    }
    //to store
    public function store(RekRequest $req)
    {
        $t = Rekening::create([
            'bank' => $req->bank,
            'no_rekening' => $req->no_rekening,
            'saldo' => $req->saldo,
            'sup_id' => $req->sup_id,
            'status' => $req->status,
        ]);
        // \dd($t);
        return \redirect()->back()->with(['msg' => "Berhasil menambah data bank $req->bank"]);
    }
    public function edit($id)
    {

        $rek = Rekening::findOrFail($id);
        $sup = Supplier::all();
        return \view('akuntansi.rek.edit', \compact('rek', 'sup'));
    }
    public function update(RekReqUpdate $req, $id)
    {
        $rek = Rekening::findOrFail($id);
        $rek->bank = $req->bank;
        $rek->no_rekening = $req->no_rekening;
        $rek->saldo = $req->saldo;
        $rek->sup_id = $req->sup_id;
        $rek->status = $req->status;
        // \dd($rek);
        $rek->save();
        return \redirect()->route('rekening.index')->with(['msg' => "Berhasil merubah data bank $req->bank"]);
    }
    public function destroy($id)
    {
        $rek = Rekening::findOrFail($id);
        $rek->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus data bank $rek->bank"]);
    }
}
