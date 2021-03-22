<?php

namespace App\Http\Controllers\Gudang\BarangDatang;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use Illuminate\Support\Facades\DB;

class IndexBarangDatang extends Controller
{
    public function __invoke()
    {
        $barang_datang = DB::table('barang_datangs as bd')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->select('t.no_transaction as no_rencana', 'sj.tgl_ as tanggal', 'sj.no_jalan as nj', 'sj.arsip', 'bd.*')
            ->get();
        $bdnull = BarangDatang::notification();
        return view('gudang.barang-datang.index', \compact('barang_datang', 'bdnull'));
    }
}
