<?php

namespace App\Http\Controllers\Gudang\Item;

use App\Http\Controllers\Controller;
use App\Model\Gudang\GudangStok;
use App\Model\Gudang\Stok\TemporaryStock;
use App\Model\Gudang\UnitStok;
use App\Model\Niagabeli\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreItemAgain extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $item = Item::find($id);
        $gs = GudangStok::where('kd_barang', $item->kd_barang)->first();
        $this->validate(
            $req,
            [
                'jumlah_stok' => 'required|numeric',
            ],
            [
                'jumlah_stok.required' => 'Tidak boleh melebihi dari jumlah stok yang ada!!',
            ]
        );
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
            $stok_sisa = $item->jml_barang - $req->jumlah_stok;
            $item->jml_barang = $stok_sisa;
            $item->barang_keluar = $req->jumlah_stok;
            $gs->jumlah_stok = $item->jml_barang;
            $item->save();
            $gs->save();
            UnitStok::create([
                'item_id' => $item->id,
                'kd_barang' => $item->kd_barang,
                'jumlah_stok' => $item->jml_barang,
                'stok_masuk' => $item->barang_masuk,
                'bagian_id' => $item->bagian_id,
            ]);
            DB::commit();
            return \redirect()->route('item.index')->with(['msg' => "berhasil mengurangi stok barang : $item->nm_barang, kode barang : $item->kd_barang untuk diambil oleh pemesan sebanyak : $req->jumlah_stok"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return \redirect()->back()->with(['msg' => 'something went wrong!!']);
        }
    }
}
