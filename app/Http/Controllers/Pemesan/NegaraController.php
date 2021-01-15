<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\NegaraRequest;
use App\Http\Requests\Pemesan\NegaraReqUpdate;
use App\Model\Pemesan\Kabupaten;
use App\Model\Pemesan\Negara;
use App\Model\Pemesan\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT n.id, n.nama,n.kode,p.nama as nm_prov, p.alias, k.prov_id,k.nama as nm_kab FROM negaras n JOIN provinsis p on n.id=p.negara_id JOIN kabupatens k on p.id=k.prov_id
        $alamat = DB::table('negaras')
            ->join('provinsis', 'negaras.id', '=', 'provinsis.negara_id')
            ->join('kabupatens', 'provinsis.id', '=', 'kabupatens.prov_id')
            ->select('kabupatens.nama as nm_kab', 'provinsis.nama as nm_prov', 'negaras.nama', 'negaras.kode')
            ->paginate(10);
        $n = Negara::paginate(5);
        $p = Provinsi::paginate(5);
        $k = Kabupaten::paginate(5);
        return \view('pemesan.alamat.index', \compact('alamat', 'n', 'p', 'k'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NegaraRequest $req)
    {
        Negara::create([
            'nama' => \ucwords($req->nama),
            'kode' => $req->kode,
        ]);
        return \redirect()->back()->with(['msg' => "Berhasil menambah negara $req->nama"]);
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
        $negara = Negara::find($id);
        return \view('pemesan.alamat.negara.edit', \compact('negara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NegaraReqUpdate $req,  $id)
    {
        $negara = Negara::find($id);
        $negara->nama = \ucwords($req->nama);
        $negara->kode = $req->kode;
        $negara->save();
        return \redirect()->route('negara.index')->with(['msg' => "Berhasil mengubah negara $req->nama"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $negara = Negara::find($id);
        $negara->delete();
        return \redirect()->back()->with(['msg' => "Berhasil menghapus negara $negara->nama"]);
    }
}
