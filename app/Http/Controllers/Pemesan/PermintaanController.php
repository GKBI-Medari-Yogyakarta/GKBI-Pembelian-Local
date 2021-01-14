<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\PesananRequest;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('pemesan')->check()) {
            return \view('pemesan.permintaan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesananRequest $req)
    {
        if (Auth::guard('pemesan')->check()) {
            Permintaan::create([
                'pemesan' => $req->pemesan,
                'no_pemesan' => $req->no_pemesan,
                'tgl_pesanan' => $req->tgl_pesanan,
                'nm_barang' => $req->nm_barang,
                'spesifikasi' => $req->spesifikasi,
                'unit_stok' => $req->unit_stok,
                'gudang_stok' => $req->gudang_stok,
                'tgl_diperlukan' => $req->tgl_diperlukan,
                'bagian_id' => $req->bagian_id,
            ]);
            return \redirect()->back()->with(['msg' => "Berhasil menambah daftar permintaan dari $req->pemesan"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $pesanan = Permintaan::find($id);
            if ($pesanan->status_direktur == '1') {
                return \redirect()->back()->with(['msg' => "Tidak dapat mengubah daftar permintaan dari $pesanan->pemesan, karena permintaan sudah terealisasi pada tgl $pesanan->realisasi"]);
            }
            return \view('pemesan.permintaan.edit', \compact('pesanan'));
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
    public function update(PesananRequest $req, $id)
    {
        if (Auth::guard('pemesan')->check()) {
            $pesanan = Permintaan::find($id);
            $pesanan->update([
                'pemesan' => $req->pemesan,
                'no_pemesan' => $req->no_pemesan,
                'tgl_pesanan' => $req->tgl_pesanan,
                'nm_barang' => $req->nm_barang,
                'spesifikasi' => $req->spesifikasi,
                'unit_stok' => $req->unit_stok,
                'gudang_stok' => $req->gudang_stok,
                'tgl_diperlukan' => $req->tgl_diperlukan,
                'bagian_id' => $req->bagian_id,
            ]);
            return \redirect()->route('permintaan.index')->with(['msg' => "Berhasil merubah daftar permintaan dari $pesanan->pemesan"]);
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
            $pesanan = Permintaan::find($id);
            if ($pesanan->status_direktur == '1') {
                return \redirect()->back()->with(['msg' => "Tidak dapat menghapus daftar permintaan dari $pesanan->pemesan, karena sudah disahkan oleh direktur"]);
            }
            $pesanan->delete();
            return \redirect()->back()->with(['msg' => "Berhasil menghapus daftar permintaan dari $pesanan->nama"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
