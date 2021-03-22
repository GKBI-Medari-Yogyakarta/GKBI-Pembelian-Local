<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar\Ijin;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\IjinKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateIjinController extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'tgl_' => 'required',
                'ket_' => 'required',
            ],
            [
                'tgl_.required' => 'Tanggal surat MI ijin keluar tidak boleh kosong!!',
                'ket_.required' => 'Keterangan surat MI ijin keluar tidak boleh kosong!!',
            ],
        );
        $ijin_keluar = IjinKeluar::findOrFail($id);
        $ijin_keluar->tgl_ = $req->tgl_;
        $ijin_keluar->ket_ = $req->ket_;
        $ijin_keluar->save();
        return \redirect()->route('ijin-keluar.index')->with(['msg' => 'Berhasil memperbaharui data Surat MI Ijin Keluar pada tanggal ' . Carbon::parse($ijin_keluar->tgl_)->isoformat('dddd, D MMM Y')]);
    }
}
