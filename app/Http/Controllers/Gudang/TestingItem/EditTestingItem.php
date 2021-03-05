<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\SuratJalan;
use Illuminate\Http\Request;

class EditTestingItem extends Controller
{
    public function __invoke($id)
    {
        $ti = TestingItem::find($id);
        $sj = SuratJalan::find($ti->barangDatang->id);
        $bdnull = BarangDatang::notification();
        return view('gudang.testing-item.edit', \compact('ti', 'sj', 'bdnull'));
    }
}
