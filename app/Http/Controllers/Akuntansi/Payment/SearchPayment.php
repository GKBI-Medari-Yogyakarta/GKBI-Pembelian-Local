<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use App\Model\Niagabeli\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchPayment extends Controller
{
    public function __invoke(Request $req)
    {
        if ($req->cari) {
            if ($req->has('cari')) {
                $m = Carbon::parse($req->cari)->format('m');
                $y = Carbon::parse($req->cari)->format('Y');
                $payment = Payment::whereMonth('created_at', '=', $m)
                    ->whereYear('created_at', '=', $y)
                    ->get();

                return \view('akuntansi.pembayaran.result', \compact('payment'))->with(['msg' => 'riwayat pembayaran selama bulan ' . Carbon::parse($req->cari)->isoformat('MMM')]);
            }
        } elseif ($req->kd) {
            if ($req->has('kd')) {
                $payment = DB::table('payments')
                    ->join('unit_stoks as us', 'us.id', '=', 'payments.id')
                    ->join('items', 'items.id', '=', 'us.item_id')
                    ->select('items.kd_barang')
                    ->where('items.kd_barang', 'like', '%' . $req->kd . '%')
                    ->get();
                // $payment = Item::where('kd_barang', 'like', '%t%')->get();
                \dd($payment);
            }
        }
    }
}
