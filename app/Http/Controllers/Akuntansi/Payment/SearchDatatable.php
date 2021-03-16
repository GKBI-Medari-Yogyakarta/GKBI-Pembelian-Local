<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class SearchDatatable extends Controller
{
    public function __invoke(Request $req)
    {
        if ($req->has('cari')) {
            $m = Carbon::parse($req->cari)->format('m');
            $y = Carbon::parse($req->cari)->format('Y');
            $payment = Payment::whereMonth('created_at', '=', $m)
                ->whereYear('created_at', '=', $y)
                ->get();
            return DataTable::of($payment)->make(\true);
        }
    }
}
