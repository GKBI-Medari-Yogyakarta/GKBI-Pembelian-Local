<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriesPayment extends Controller
{
    public function __invoke(Request $req)
    {
        $payment = DB::table('payments')
            ->join('rekenings', 'rekenings.id', '=', 'payments.rek_id')
            ->select('payments.*', 'rekenings.bank')
            ->when($req->search, function ($query) use ($req) {
                $m = Carbon::parse($req->search)->format('m');
                $y = Carbon::parse($req->search)->format('Y');
                $query->whereMonth('payments.created_at', $m)
                    ->whereYear('payments.created_at', $y);
            })->get();
        return \view('akuntansi.pembayaran.history', \compact('payment'));
    }
}
