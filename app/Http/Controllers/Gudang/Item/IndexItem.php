<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Niagabeli\Item;
use Illuminate\Support\Facades\DB;

class IndexItem extends Controller
{
    public function __invoke()
    {
        $items = Item::select('*')
            ->whereRaw('created_at in (SELECT MAX(created_at) FROM items group by kd_barang)')
            ->get();
        $bdnull = BarangDatang::notification();
        return \view('gudang.daftar-barang.index', \compact('items', 'bdnull'));
    }
}
