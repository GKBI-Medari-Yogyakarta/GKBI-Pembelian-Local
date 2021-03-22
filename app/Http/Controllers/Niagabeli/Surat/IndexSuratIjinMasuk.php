<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexSuratIjinMasuk extends Controller
{
    public function __invoke()
    {
        $surat_in = DB::table('surat_ijin_masuks as sim')
            ->join('surat_jalans as sj', 'sj.id', '=', 'sim.s_jln_id')
            ->select('sj.no_jalan as nj', 'sj.arsip', 'sim.*')
            ->get();
        return view('niagabeli.surat-ijin.index', compact('surat_in'));
    }
}
