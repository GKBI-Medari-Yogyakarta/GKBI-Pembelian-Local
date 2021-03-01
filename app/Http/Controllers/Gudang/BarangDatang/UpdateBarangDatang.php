<?php

namespace App\Http\Controllers\Gudang\BarangDatang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gudang\BarangDatangRequest;
use App\Model\Gudang\BarangDatang;
use Illuminate\Http\Request;

class UpdateBarangDatang extends Controller
{
    public function __invoke(BarangDatangRequest $req, $id)
    {
        $bd = BarangDatang::find($id);
        $bd->no_agenda_gudang = $req->no_agenda_gudang;
        $bd->no_agenda_pembelian = $req->no_agenda_pembelian;
        $bd->save();
        return \redirect()->route('bd.index')->with(['msg' => "Berhasil memperbaharui data barang datang dengan nomor agenda $bd->no_agenda_gudang $bd->no_agenda_pembelian"]);
    }
}
