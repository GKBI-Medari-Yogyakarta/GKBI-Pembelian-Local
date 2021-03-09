<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\Mikeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexMikeluar extends Controller
{
    public function __invoke()
    {
        // $mikeluar = Mikeluar::all();
        $mikeluar = DB::table('mikeluars')
            ->join('testing_items as ti', 'ti.id', '=', 'mikeluars.ti_id')
            ->select('ti.no_test', 'ti.tgl_', 'mikeluars.*')
            ->get();
        return \view('niagabeli.mikeluar.index', \compact('mikeluar'));
    }
}
