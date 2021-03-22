<?php

namespace App\Http\Controllers\Niagabeli\NPB;

use App\Http\Controllers\Controller;
use App\Model\Gudang\NpbPrice;
use Illuminate\Http\Request;

class UpdateNpbPrice extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $price = NpbPrice::findOrFail($id);
        if ($req->input('action') === 'Ya') {
            $price->sesuai_sop = '1';
            $price->save();
            return \redirect()->back()->with(['msg' => 'Sesuai SOP!!']);
        } elseif ($req->input('action') === 'Tidak') {
            $price->sesuai_sop = '0';
            $price->save();
            return \redirect()->back()->with(['msg' => 'Tidak Sesuai SOP!!']);
        }
        return \redirect()->back()->with(['msg' => 'tidak ada aksi!!']);
    }
}
