<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Gudang\NpbQty;
use App\Model\Gudang\TestingItem;
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
        if ($req->input('action') == 'Y') {
            $ti = TestingItem::find($id);
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
            return redirect()->back();
        }
        return redirect()->back()->with(['msg' => 'tidak ada aksi!']);
    }
}
