<?php

namespace App\Http\Controllers\Akuntansi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akuntansi\RekRequest;
use App\Http\Requests\Akuntansi\RekReqUpdate;
use App\Model\Akuntansi\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekController extends Controller
{
    //to index
    public function index()
    {
        if (Auth::guard('akuntansi')->check()) {
            $rek = Rekening::all();
            return \view('akuntansi.index', \compact('rek'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to store
    public function store(RekRequest $req)
    {
        if (Auth::guard('akuntansi')->check()) {
            Rekening::create([
                'bank' => $req->bank,
                'no_rekening' => $req->no_rekening,
                'saldo' => $req->saldo,
                'sup_id' => $req->sup_id,
                'status' => $req->status,
            ]);
            return \redirect()->route('rekening.index')->with(['msg' => "Berhasil menambah data bank $req->bank"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function edit($id)
    {
        if (Auth::guard('akuntansi')->check()) {
            $rek = Rekening::find($id);
            return \view('akuntansi.index', \compact('rek'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function update(RekReqUpdate $req, $id)
    {
        if (Auth::guard('akuntansi')->check()) {
            $rek = Rekening::find($id);
            $rek->bank = $req->bank;
            $rek->no_rekening = $req->no_rekening;
            $rek->saldo = $req->saldo;
            $rek->sup_id = $req->sup_id;
            $rek->status = $req->status;
            $rek->save();
            return \redirect()->route('rekening.index')->with(['msg' => "Berhasil merubah data bank $req->bank"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function destroy($id){
        if (Auth::guard('akuntansi')->check()) {
            $rek = Rekening::find($id);
            $rek->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus data bank $rek->bank"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
