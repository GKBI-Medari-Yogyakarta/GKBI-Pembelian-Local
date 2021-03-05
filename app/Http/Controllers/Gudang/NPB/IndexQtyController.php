<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexQtyController extends Controller
{
    public function __invoke()
    {
        $qty = DB::table('npb_qties as qty')
            ->join('testing_items as ti', 'ti.id', '=', 'qty.ti_id')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('b.nama as bagian', 'p.pemesan as nm_pemesan', 'bd.no_agenda_gudang as nag', 'bd.no_agenda_pembelian as nap', 'ti.no_test', 'qty.*')
            ->get();
        $bdnull = BarangDatang::notification();
        return \view('gudang.npb-qty.index', compact('qty', 'bdnull'));
    }
}
