<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexSuratIjinMasuk extends Controller
{
    public function __invoke(Request $req)
    {
        $surat_in = DB::table('surat_ijin_masuks as sim')
            ->join('surat_jalans as sj', 'sj.id', '=', 'sim.s_jln_id')
            ->select('sj.no_jalan as nj', 'sj.arsip', 'sim.*')
            ->when($req->date, function ($query) use ($req) {
                $m = Carbon::parse($req->date)->format('m');
                $y = Carbon::parse($req->date)->format('Y');
                $query->whereYear('sim.created_at', $y)
                    ->whereMonth('sim.created_at', $m);
            })->get();
        return view('niagabeli.surat-ijin.index', compact('surat_in'));
    }
}
