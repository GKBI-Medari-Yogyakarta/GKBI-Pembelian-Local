<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\Mikeluar;
use Illuminate\Http\Request;

class UpdateMikeluar extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'no_mikeluar' => 'required',
            ],
            [
                'no_mikeluar.required' => 'nomor MI Ijin Keluar tidak boleh kosong!!',
            ],
        );
        $mikeluar = Mikeluar::find($id);
        $mikeluar->no_mikeluar = $req->no_mikeluar;
        $mikeluar->save();
        return \redirect()->route('mikeluar.index')->with(['msg' => 'Berhasil memperbaharui nomor MI Ijin Keluar' . $mikeluar->no_mikeluar]);
    }
}
