<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchPayment extends Controller
{
    public function __invoke(Request $req)
    {
        if ($req->has('cari')) {
            $m = Carbon::parse($req->cari)->format('m');
            $y = Carbon::parse($req->cari)->format('Y');
            $payment = Payment::whereMonth('created_at', '=', $m)
                ->whereYear('created_at', '=', $y)
                ->get();
            return \view('akuntansi.pembayaran.result', \compact('payment'))->with(['msg' => 'riwayat pembayaran selama bulan ' . Carbon::parse($req->cari)->isoformat('MMM')]);
        }
    }
}
