<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Model\Gudang\NpbQty;
use App\Model\Niagabeli\Item;
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
        $item = Item::where('npb_id', $qty->id);
        if (isset($item->npb_id)) return \redirect()->back()->with(['Barang sudah diposting!!']);
        DB::beginTransaction();
        try {
            $qty->posting = '1';
            $qty->save();
            Item::create([
                'npb_id',
            ]);
            DB::commit();
            return redirect()->back()->with(['msg' => 'berhasil memposting barang ke gudang sebagai stok!!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['warning' => 'something went wrong!!']);
        }
    }
}
