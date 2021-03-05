<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Bagian;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\NpbQty;
use App\Model\Niagabeli\SPBarang;
use App\Model\Pemesan\Permintaan;

class EditQtyController extends Controller
{
    public function __invoke($id)
    {
        $qty = NpbQty::find($id);
        $bd = BarangDatang::find($qty->testingItem->bd_id);
        $spb = SPBarang::find($bd->suratJalan->spb_id);
        $p = Permintaan::find($spb->transaction->permintaan_id);
        $b = Bagian::find($p->bagian_id);
        $bdnull = BarangDatang::notification();
        return \view('gudang.npb-qty.edit', \compact('qty', 'bd', 'b', 'bdnull'));
    }
}
