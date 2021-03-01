<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexSuratIjinMasuk extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //        if (auth()->guard('pembelian')->check()) {
        //            return \redirect()->route('jalan.index');
        //        } else {
        //            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        //        }
        $surat_in = DB::table('surat_ijin_masuks as sim')
            ->join('surat_jalans as sj', 'sj.id', '=', 'sim.s_jln_id')
            ->select('sj.no_jalan as nj', 'sj.arsip', 'sim.*')
            ->get();
        return view('niagabeli.surat-ijin.index', compact('surat_in'));
    }
}
