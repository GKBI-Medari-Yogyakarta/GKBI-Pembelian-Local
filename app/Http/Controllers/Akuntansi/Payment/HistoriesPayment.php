<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Illuminate\Support\Facades\DB;

class HistoriesPayment extends Controller
{
    public function __invoke()
    {
        $payment = Payment::all();
        return \view('akuntansi.pembayaran.history', \compact('payment'));
    }
}
