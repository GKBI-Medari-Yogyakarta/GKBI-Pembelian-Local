<?php

namespace App\Http\Controllers\Gudang\NPB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gudang\NPBQtyRequest;
use App\Model\Gudang\NpbQty;

class UpdateQtyController extends Controller
{
    public function __invoke(NPBQtyRequest $req, $id)
    {
        $qty = NpbQty::find($id);
        $qty->no_urut = $req->no_urut;
        $qty->save();
        return \redirect()->route('qty.index')->with(['msg' => "berhasil memperbaharui data NPB Qty dengan nomor urut $qty->no_urut"]);
    }
}
