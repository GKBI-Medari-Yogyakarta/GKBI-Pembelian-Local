<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Niagabeli\Item;

class EditItemToStore extends Controller
{
    public function __invoke($id)
    {
        $item = Item::find($id);
        $bdnull = BarangDatang::notification();
        return \view('gudang.daftar-barang.edit', \compact('item', 'bdnull'));
    }
}
