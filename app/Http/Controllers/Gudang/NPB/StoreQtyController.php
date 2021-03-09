<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Gudang\NpbQty;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\Mikeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreQtyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $req, $id)
    {
        $ti = TestingItem::find($id);
        if ($req->input('action') == 'Y') {
            $qty = NpbQty::where('ti_id', $ti->id)->first();
            if (isset($qty->ti_id)) return \redirect()->back()->with(['msg' => 'status sudah di cek!!']);
            DB::beginTransaction();
            try {
                $ti->selesai = '1';
                $ti->save();
                NpbQty::create([
                    'ti_id' => $ti->id,
                ]);
                DB::commit();
                return redirect()->back()->with(['msg' => 'Berhasil memperbahuri status pengecekan detail. dengan status kegunaan barang sesuai kebutuhan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with(['warning' => 'something went wrong,']);
            }
        } elseif ($req->input('action') == 'T') {
            $mikeluar = Mikeluar::where('ti_id', $ti->id)->first();
            if (isset($mikeluar->ti_id)) return \redirect()->back()->with(['msg' => 'sudah ada di mikeluar!!']);
            DB::beginTransaction();
            try {
                $ti->selesai = '0';
                $ti->save();
                Mikeluar::create([
                    'ti_id' => $ti->id,
                ]);
                DB::commit();
                return redirect()->back()->with(['msg' => 'Barang tidak sesuai permintaan!!']);
            } catch (\Exception $e) {
                DB::rollBack();
                return \redirect()->back()->with(['warning' => 'something went wrong!!']);
            }
        }
        return redirect()->back()->with(['msg' => 'tidak ada aksi!']);
    }
}
