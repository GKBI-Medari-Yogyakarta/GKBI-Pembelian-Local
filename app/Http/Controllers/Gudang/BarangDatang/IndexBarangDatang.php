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
            $barang_datang = DB::table('barang_datangs as bd')
                ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
                ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
                ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
                ->select('t.no_transaction as no_rencana', 'sj.tgl_ as tanggal', 'sj.no_jalan as nj', 'sj.arsip', 'bd.*')
                ->get();
            return view('gudang.barang-datang.index', \compact('barang_datang'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
