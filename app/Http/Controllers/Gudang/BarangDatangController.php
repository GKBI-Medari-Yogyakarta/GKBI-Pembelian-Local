<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\BarangDatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangDatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('gudang')->check()) {
            // SELECT p.id,p.pemesan,p.nm_barang,t.id,t.permintaan_id, spb.id,spb.transaction_id, td.spb_id,td.transaction_id,td._terbeli FROM s_p_barangs as spb JOIN transactions as t on t.id=spb.transaction_id JOIN transaction_details as td ON spb.id=td.spb_id JOIN permintaans as p on p.id=t.permintaan_id WHERE t.status_beli='1'
            $barang_datang = DB::table('s_p_barangs as spb')
                ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
                ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
                ->select('p.pemesan', 'p.nm_barang', 't.status_beli')
                ->where('t.status_beli', '=', '1')
                ->get();
            $surat_in = DB::table('surat_ijin_masuks as sim')
                ->join('surat_jalans as sj','sj.id','=','sim.s_jln_id')
                ->join('barang_datangs as bd','sj.id','=','bd.s_jln_id')
                ->select('sj.no_jalan as nj','sj.tgl_ as tanggal','sj.arsip','bd.no_rencana_pembelian as nrp','bd.no_agenda_gudang as nag','sim.*')
                ->get();
            return \redirect()->route('barang-datang.index', \compact('barang_datang'));
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
    public function store(Request $request)
    {
        //
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
        //
    }
}
