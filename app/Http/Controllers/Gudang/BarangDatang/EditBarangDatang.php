<?php

namespace App\Http\Controllers\Gudang\BarangDatang;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;

class EditBarangDatang extends Controller
{
    public function __invoke($id)
    {
        $bd = BarangDatang::findOrFail($id);
        $bdnull = BarangDatang::notification();
        return \view('gudang.barang-datang.edit', \compact('bd', 'bdnull'));
    }
}
