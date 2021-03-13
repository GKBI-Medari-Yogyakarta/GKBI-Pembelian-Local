<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Bagian;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\GudangStok;
use App\Model\Gudang\NpbPrice;
use App\Model\Gudang\NpbQty;
use App\Model\Niagabeli\Item;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\TransactionDetail;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostQtyController extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $qty = NpbQty::find($id);
        $bd = BarangDatang::find($qty->testingItem->bd_id);
        $spb = SPBarang::find($bd->suratJalan->spb_id);
        $p = Permintaan::find($spb->transaction->permintaan_id);
        $td = TransactionDetail::find($spb->id);
        $b = Bagian::find($p->bagian_id);
        $item = Item::where('npb_id', $qty->id)->first();
        $jlm_barang = DB::select("SELECT * FROM `items` WHERE created_at in (SELECT MAX(created_at) as ca FROM items WHERE kd_barang LIKE '$p->kd_barang')");
        if (isset($item->npb_id)) return \redirect()->back()->with(['msg' => 'Barang sudah diposting!!']);
        DB::beginTransaction();
        try {
            $qty->posting = '1';
            $qty->save();
            NpbPrice::create([
                'qty_id' => $qty->id,
            ]);
            $item = new Item;
            // GudangStok::create([
            //     'item_id'=>$item->id,
            //     'jumlah_stok'=>$item->jml_barang,
            //     'bagian_id'=>$bd->id,
            //     'stok_masuk'=>
            // ]);
            $item->npb_id = $qty->id;
            $item->bagian_id = $b->id;
            $item->nm_barang = $p->nm_barang;
            $item->spek_barang = $p->spesifikasi;
            $item->kd_barang = $p->kd_barang;
            $item->ppn_barang = $td->ppn;
            $item->hrg_barang = $td->_terbayar;
            $item->barang_masuk = $td->_terbeli;
            $item->tgl_beli = $td->tgl_beli;
            $item->tempo_pembayaran = $spb->tempo_pembayaran;
            $item->pemesan = $p->pemesan;
            $item->nota_spb = $spb->nota_spb;
            $item->harga_item = $td->harga_item;
            if (!empty($jlm_barang)) {
                $jml = $jlm_barang[0]->jml_barang + $td->_terbeli;
                $item->jml_barang = "$jml";
                $item->save();
                DB::commit();
                return redirect()->back()->with(['msg' => 'berhasil memposting barang ke gudang sebagai stok!!']);
            }
            $item->jml_barang = $td->_terbeli;
            $item->save();
            DB::commit();
            return redirect()->back()->with(['msg' => 'berhasil memposting barang ke gudang sebagai stok!!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['warning' => 'something went wrong!!']);
        }
    }
}
