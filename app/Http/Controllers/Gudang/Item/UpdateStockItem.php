<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\GudangStok;
use App\Model\Gudang\Stok\TemporaryStock;
use App\Model\Niagabeli\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateStockItem extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $item = Item::find($id);
        $gs = GudangStok::where('kd_barang', $item->kd_barang)->first();
        if (isset($gs->kd_barang)) {
            DB::beginTransaction();
            try {
                TemporaryStock::create([
                    'gs_id' => $gs->id,
                    'item_id' => $gs->item_id,
                    'kd_barang' => $gs->kd_barang,
                    'jumlah_stok' => $gs->jumlah_stok,
                    'stok_masuk' => $gs->stok_masuk,
                    'bagian_id' => $gs->bagian_id,
                ]);
                $gs->item_id = $item->id;
                $gs->jumlah_stok = $item->jml_barang;
                $gs->stok_masuk = $item->barang_masuk;
                $gs->bagian_id = $item->bagian_id;
                $gs->save();
                DB::commit();
                return \redirect()->back()->with(['msg' => 'berhasil mengupdate stok!! yg sudah ada']);
            } catch (\Throwable $th) {
                DB::rollBack();
                return \redirect()->back()->with(['msg' => 'something went wrong!!']);
            }
        }
        $gudang = new GudangStok;
        $gudang->item_id = $item->id;
        $gudang->kd_barang = $item->kd_barang;
        $gudang->jumlah_stok = $item->jml_barang;
        $gudang->stok_masuk = $item->barang_masuk;
        $gudang->bagian_id = $item->bagian_id;
        $gudang->save();
        return \redirect()->back()->with(['msg' => 'berhasil mengupdate stok!! barang baru']);
    }
}
