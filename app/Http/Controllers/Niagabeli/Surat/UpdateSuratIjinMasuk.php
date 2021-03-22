<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Niagabeli\SuratIjinMasukRequest;
use App\Model\Niagabeli\SuratIjinMasuk;

class UpdateSuratIjinMasuk extends Controller
{
    public function __invoke(SuratIjinMasukRequest $req, $id)
    {
        $sim = SuratIjinMasuk::findOrFail($id);
        $sim->no_ijin = $req->no_ijin;
        $sim->tgl_ = $req->tgl_;
        $sim->save();
        return \redirect()->route('sim.index')->with(['msg' => 'Berhasil memperbaharui surat ijin masuk dengan nomor surat jalan' . $sim->suratJalan->no_jalan]);
    }
}
