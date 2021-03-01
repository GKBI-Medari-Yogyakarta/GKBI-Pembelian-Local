<?php

namespace App\Http\Controllers\Gudang\BarangDatang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexBarangDatang extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        if (auth()->guard('gudang')->check()) {
            // SELECT p.id,p.pemesan,p.nm_barang,t.id,t.permintaan_id, spb.id,spb.transaction_id, td.spb_id,td.transaction_id,td._terbeli FROM s_p_barangs as spb JOIN transactions as t on t.id=spb.transaction_id JOIN transaction_details as td ON spb.id=td.spb_id JOIN permintaans as p on p.id=t.permintaan_id WHERE t.status_beli='1'
            //No Agenda gd, no agenda pembelian, no & tgl surat jalan, no rencana pembelian, arsip
            $barang_datang = DB::table('barang_datangs as bd')
                ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
                ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
                ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                ->select('t.no_transaction as no_rencana', 'sj.tgl_ as tanggal', 'sj.no_jalan as nj', 'sj.arsip', 'bd.*')
                ->get();
            // $barang_datang = DB::table('s_p_barangs as spb')
            //     ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            //     ->join('transaction_details as td', 'spb.id', '=', 'td.spb_id')
            //     ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            //     ->select('p.pemesan', 'p.nm_barang', 't.status_beli')
            //     ->where('t.status_beli', '=', '1')
            //     ->get();
            // $surat_in = DB::table('surat_ijin_masuks as sim')
            //     ->join('surat_jalans as sj', 'sj.id', '=', 'sim.s_jln_id')
            //     ->join('barang_datangs as bd', 'sj.id', '=', 'bd.s_jln_id')
            //     ->select('sj.no_jalan as nj', 'sj.tgl_ as tanggal', 'sj.arsip', 'bd.no_rencana_pembelian as nrp', 'bd.no_agenda_gudang as nag', 'sim.*')
            //     ->get();
            return view('gudang.barang-datang.index', \compact('barang_datang'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
