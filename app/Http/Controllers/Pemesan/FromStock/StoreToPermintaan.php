<?php

namespace App\Http\Controllers\Pemesan\FromStock;

use App\Http\Controllers\Controller;
use App\Model\Gudang\GudangStok;
use App\Model\Niagabeli\Item;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;

class StoreToPermintaan extends Controller
{
    public function __invoke($id)
    {
        $item = Item::find($id);
        $gs = GudangStok::where('item_id', $item->id)->first();
        $user_pemesan_id = auth()->guard('pemesan')->user()->getAuthIdentifier();
        if (empty($gs)) {
            return \redirect()->back()->with(['warning' => "staf gudang belum menambahkan stok barang $item->kd_barang ke gudang"]);
        }
        $p = Permintaan::where('item_id', $item->id)->first();
        if (!empty($p)) {
            return \redirect()->back()->with(['warning' => 'barang sudah ditambahkan']);
        }
        Permintaan::create([
            'pemesan' => $item->pemesan,
            'nm_barang' => $item->nm_barang,
            'kd_barang' => $item->kd_barang,
            'spesifikasi' => $item->spek_barang,
            'gudang_stok' => $gs->jumlah_stok,
            'bagian_id' => $gs->bagian_id,
            'user_pemesan_id' => $user_pemesan_id,
            'item_id' => $item->id,
        ]);
        return \redirect()->back()->with(['msg' => "berhasil menambahkan barang $item->kd_barang untuk di re-stok"]);
    }
}
