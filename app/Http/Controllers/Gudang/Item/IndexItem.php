<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Niagabeli\Item;

class IndexItem extends Controller
{
    public function __invoke()
    {
        $items = Item::select('*')
            ->whereRaw('created_at in (SELECT MAX(created_at) FROM items group by kd_barang)')
            ->get();
        $it = Item::select('*')
            ->whereRaw('items.created_at in (SELECT MAX(items.created_at) FROM items join gudang_stoks as gs on items.id=gs.item_id group by items.kd_barang)')
            ->get();
        $bdnull = BarangDatang::notification();
        return \view('gudang.daftar-barang.index', \compact('items', 'bdnull'));
    }
}
