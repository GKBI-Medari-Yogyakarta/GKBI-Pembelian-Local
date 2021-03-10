<?php

namespace App\Http\Controllers\Niagabeli\NPB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexNpbPrice extends Controller
{
    public function __invoke()
    {
        $price = DB::table('npb_prices as price')
            ->join('npb_qties as qty', 'qty.id', '=', 'price.qty_id')
            ->join('testing_items as ti', 'ti.id', '=', 'qty.ti_id')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('b.nama', 'b.no_identitas', 't.rencana_beli', 'spb.nota_spb', 'spb.satuan', 'spb.total_hrg', 'bd.no_agenda_gudang', 'bd.no_agenda_pembelian', 'price.id', 'price.sesuai_sop')
            ->get();
        return \view('niagabeli.npb-price.index', \compact('price'));
    }
}
