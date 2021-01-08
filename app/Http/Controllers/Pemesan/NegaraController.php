<?php

namespace App\Http\Controllers\Pemesan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemesan\NegaraRequest;
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
            ->get();
        $n = Negara::paginate(5);
        $p = Provinsi::paginate(5);
        $k = Kabupaten::paginate(5);
        return \view('pemesan.alamat.index', \compact('alamat', 'n', 'p', 'k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('pemesan.alamat.negara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NegaraRequest $req)
    {
        \dd($req->all());
        Negara::create([
            'nama' => $req->nama,
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
        return \view('pemesan.alamat.negara.edit', $negara->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NegaraRequest $req, $id)
    {
        $negara = Negara::find($id);
        $negara->name = $req->nama;
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
