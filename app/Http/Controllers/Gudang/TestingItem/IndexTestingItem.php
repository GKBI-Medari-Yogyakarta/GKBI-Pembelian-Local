<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Model\Gudang\TestingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexTestingItem extends Controller
{
    public function __invoke()
    {
        // $items = TestingItem::all();
        $items = DB::table('testing_items as ti')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->select('bd.no_agenda_gudang as nag', 'bd.no_agenda_pembelian as nap', 'sj.no_jalan as nj', 'ti.*')
            ->orderBy('ti.id')
            ->get();
        return view('gudang.testing-item.index', compact('items'));
    }
}
