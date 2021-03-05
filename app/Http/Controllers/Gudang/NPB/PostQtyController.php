<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Bagian;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\NpbQty;
use App\Model\Niagabeli\Item;
use App\Model\Niagabeli\SPBarang;
use App\Model\Niagabeli\TransactionDetail;
use App\Model\Pemesan\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostQtyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $req, $id)
    {
        $qty = NpbQty::find($id);
        $bd = BarangDatang::find($qty->testingItem->bd_id);
        $spb = SPBarang::find($bd->suratJalan->spb_id);
        $p = Permintaan::find($spb->transaction->permintaan_id);
        $td = TransactionDetail::find($spb->id);
        $b = Bagian::find($p->bagian_id);
        $item = Item::where('npb_id', $qty->id)->first();
        $kd = Item::where('kd_barang', $p->kd_barang)->first();
        if (isset($kd->kd_barang)) {
            $it = new Item;
            $jml = $kd->jml_barang + $td->_terbeli;
            $it->jml_barang = "$jml";
            dd($td, $it);
        }
        \dd('not ok');
        if (isset($item->npb_id)) return \redirect()->back()->with(['Barang sudah diposting!!']);
        DB::beginTransaction();
        try {
            $qty->posting = '1';
            $qty->save();
            $item = new Item;
            $item->npb_id = $qty->id;
            $item->bagian_id = $b->id;
            $item->nm_barang = $p->nm_barang;
            $item->spek_barang = $p->spesifikasi;
            $item->kd_barang = $p->kd_barang;
            $item->ppn_barang = $td->ppn;
            $item->hrg_barang = $td->_terbayar;
            $item->jml_barang = $td->_terbeli;
            // $kd_barang = Item::where('kd_barang', $p->kd_barang)->first();
            // if (isset($kd_barang->kd_barang)) {
            //     $kd = $kd_barang->jml_barang;
            // }
            $item->barang_masuk = $td->_terbeli;
            $item->save();
            DB::commit();
            return redirect()->back()->with(['msg' => 'berhasil memposting barang ke gudang sebagai stok!!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['warning' => 'something went wrong!!']);
        }
    }
}
