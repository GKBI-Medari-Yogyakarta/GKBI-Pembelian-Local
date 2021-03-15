<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;

class HistoriesPayment extends Controller
{
    public function __invoke()
    {
        $payment = Payment::all();
        // $payment->whereMonth('created_at', '=', \date('m'));
        // $payment = Payment::all();
        // \dd($payment);
        return \view('akuntansi.pembayaran.history', \compact('payment'));
    }
}
