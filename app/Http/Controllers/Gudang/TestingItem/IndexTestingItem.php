<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexTestingItem extends Controller
{
    public function __invoke(Request $req)
    {
        // $items = TestingItem::all();
        $items = DB::table('testing_items as ti')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->select('bd.no_agenda_gudang as nag', 'bd.no_agenda_pembelian as nap', 'sj.no_jalan as nj', 'ti.*')
            ->when($req->date, function ($query) use ($req) {
                $m = Carbon::parse($req->date)->format('m');
                $y = Carbon::parse($req->date)->format('Y');
                $query->whereYear('ti.updated_at', $y)
                    ->whereMonth('ti.updated_at', $m);
            })
            ->orderBy('ti.id')
            ->get();
        $bdnull = BarangDatang::notification();
        return view('gudang.testing-item.index', compact('items', 'bdnull'));
    }
}
