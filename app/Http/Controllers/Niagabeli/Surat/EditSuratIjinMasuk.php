<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\SuratIjinMasuk;
use Illuminate\Http\Request;

class EditSuratIjinMasuk extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $sim = SuratIjinMasuk::findOrFail($id);
        return view('niagabeli.surat-ijin.edit', compact('sim'));
    }
}
