<?php

namespace App\Http\Controllers\Niagabeli\Surat;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\SuratIjinMasuk;

class EditSuratIjinMasuk extends Controller
{
    public function __invoke($id)
    {
        $sim = SuratIjinMasuk::findOrFail($id);
        return view('niagabeli.surat-ijin.edit', compact('sim'));
    }
}
