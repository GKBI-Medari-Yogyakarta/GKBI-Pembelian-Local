<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Bagian;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\NpbQty;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\SuratJalan;
use App\Model\Niagabeli\Transaction;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;

class EditQtyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $qty = NpbQty::find($id);
        // $ti = TestingItem::find($qty->ti_id);
        $bd = BarangDatang::find($qty->testingItem->bd_id);
        // $sj = SuratJalan::find($bd->s_jln_id);
        $spb = SPBarang::find($bd->suratJalan->spb_id);
        // $t = Transaction::find($spb->transaction_id);
        $p = Permintaan::find($spb->transaction->permintaan_id);
        $b = Bagian::find($p->bagian_id);
        // \dd($qty, $qty->testingItem, $bd, $bd->suratJalan, $spb, $spb->transaction, $p, $b);
        $bdnull = BarangDatang::notification();
        return \view('gudang.npb-qty.edit', \compact('qty', 'bd', 'b', 'bdnull'));
    }
}
