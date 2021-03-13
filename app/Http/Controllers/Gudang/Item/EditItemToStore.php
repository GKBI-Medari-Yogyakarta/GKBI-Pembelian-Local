<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\GudangStok;
use App\Model\Niagabeli\Item;

class EditItemToStore extends Controller
{
    public function __invoke($id)
    {
        $item = Item::find($id);
        $gs = GudangStok::where('item_id', $item->id)->first();
        if (empty($gs)) {
            return \redirect()->back()->with(['danger' => 'input stok gudang terlebih dahulu!!!']);
        }
        $bdnull = BarangDatang::notification();
        return \view('gudang.daftar-barang.edit', \compact('item', 'bdnull'));
    }
}
