<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\SuratJalan;

class EditTestingItem extends Controller
{
    public function __invoke($id)
    {
        $ti = TestingItem::findOrFail($id);
        $sj = SuratJalan::findOrFail($ti->barangDatang->s_jln_id);
        $bdnull = BarangDatang::notification();
        return view('gudang.testing-item.edit', \compact('ti', 'sj', 'bdnull'));
    }
}
