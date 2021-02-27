<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratIjinMasukRequest;
use App\Model\Niagabeli\SuratIjinMasuk;
use Illuminate\Http\Request;

class UpdateSuratIjinMasuk extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SuratIjinMasukRequest $req, $id)
    {
        $sim = SuratIjinMasuk::find($id);
        $sim->no_ijin = $req->no_ijin;
        $sim->tgl_ = $req->tgl_;
        \dd($sim);
        $sim->save();
        return \redirect()->route('sim.index')->with(['msg' => 'Berhasil memperbaharui surat ijin masuk dengan nomor surat jalan' . $sim->suratJalan->no_jalan]);
    }
}
