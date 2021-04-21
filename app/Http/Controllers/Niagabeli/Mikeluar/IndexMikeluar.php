<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\Mikeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexMikeluar extends Controller
{
    public function __invoke(Request $req)
    {
        $mikeluar = DB::table('mikeluars')
            ->join('testing_items as ti', 'ti.id', '=', 'mikeluars.ti_id')
            ->select('ti.no_test', 'ti.tgl_', 'mikeluars.*')
            ->when($req->date, function ($query) use ($req) {
                $m = Carbon::parse($req->date)->format('m');
                $y = Carbon::parse($req->date)->format('Y');
                $query->whereYear('mikeluars.created_at', $y)
                    ->whereMonth('mikeluars.created_at', $m);
            })->get();
        return \view('niagabeli.mikeluar.index', \compact('mikeluar'));
    }
}
