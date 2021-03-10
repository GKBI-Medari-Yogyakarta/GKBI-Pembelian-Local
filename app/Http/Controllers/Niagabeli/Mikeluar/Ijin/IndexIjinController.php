<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar\Ijin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexIjinController extends Controller
{
    public function __invoke()
    {
        $ijin_keluar = DB::table('ijin_keluars')
            ->join('mikeluars', 'mikeluars.id', '=', 'ijin_keluars.mikeluar_id')
            ->select('mikeluars.no_mikeluar', 'ijin_keluars.*')
            ->get();
        return \view('niagabeli.mikeluar.surat-keluar.index', \compact('ijin_keluar'));
    }
}
