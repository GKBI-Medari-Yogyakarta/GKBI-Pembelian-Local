<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar\Ijin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexIjinController extends Controller
{
    public function __invoke(Request $req)
    {
        $ijin_keluar = DB::table('ijin_keluars')
            ->join('mikeluars', 'mikeluars.id', '=', 'ijin_keluars.mikeluar_id')
            ->select('mikeluars.no_mikeluar', 'ijin_keluars.*')
            ->when($req->date, function ($query) use ($req) {
                $m = Carbon::parse($req->date)->format('m');
                $y = Carbon::parse($req->date)->format('Y');
                $query->whereYear('ijin_keluars.created_at', $y)
                    ->whereMonth('ijin_keluars.created_at', $m);
            })->get();
        return \view('niagabeli.mikeluar.surat-keluar.index', \compact('ijin_keluar'));
    }
}
