<?php

namespace App\Http\Controllers\Gudang\BarangDatang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gudang\BarangDatangRequest;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\TestingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateBarangDatang extends Controller
{
    public function __invoke(BarangDatangRequest $req, $id)
    {
        $bd = BarangDatang::find($id);
        $bd->no_agenda_gudang = $req->no_agenda_gudang;
        $bd->no_agenda_pembelian = $req->no_agenda_pembelian;
        $bd->save();
        return \redirect()->route('bd.index')->with(['msg' => "Berhasil memperbaharui data barang datang dengan nomor agenda $bd->no_agenda_gudang $bd->no_agenda_pembelian"]);
        // DB::beginTransaction();
        // try {
        //     TestingItem::create([
        //         'bd_id' => $bd->id,
        //     ]);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()
        //         ->with('warning', 'Something Went Wrong!, tidak berhasil merubah data!!');
        // }
    }
}
