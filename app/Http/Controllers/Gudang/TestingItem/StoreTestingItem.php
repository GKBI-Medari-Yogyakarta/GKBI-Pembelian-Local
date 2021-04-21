<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\NpbQty;
use App\Model\Gudang\TestingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreTestingItem extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $bd = BarangDatang::findOrFail($id);
        $ti = TestingItem::where('bd_id', $bd->id)->first();
        if ($req->input('action') == 'Y') {
            if (isset($ti->bd_id)) return redirect()->back()->with(['msg' => 'barang sudah dicek. silahkan ke menu pengecekan barang']);
            TestingItem::create([
                'bd_id' => $bd->id,
                'cek_detail' => '1',
            ]);
            return redirect()->route('test.index')->with(['msg' => 'Pengecekan barang dilakukan secara detail. Silahkan masukkan nota pengecekan barang!!']);
        } elseif ($req->input('action') == 'T') {
            if (isset($ti->bd_id)) return redirect()->back()->with(['msg' => 'barang sudah dicek. silahkan ke menu pengecekan barang']);
            DB::beginTransaction();
            try {
                $testing_item = TestingItem::create([
                    'bd_id' => $bd->id,
                    'cek_detail' => '0',
                    'selesai' => '1',
                ]);
                $qty = NpbQty::where('ti_id', $testing_item->id)->first();
                if (isset($qty->ti_id)) return redirect()->back()->with(['msg' => 'already exists!!']);
                NpbQty::create([
                    'ti_id' => $testing_item->id,
                ]);
                DB::commit();
                return redirect()->route('qty.index')->with(['msg' => 'Pengcekan barang tidak dilakukan secara detail.']);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('warning', 'Something Went Wrong!, tidak berhasil merubah data!!');
            }
        }
        return redirect()->back()->with(['msg' => 'Tidak ada aksi']);
    }
}
