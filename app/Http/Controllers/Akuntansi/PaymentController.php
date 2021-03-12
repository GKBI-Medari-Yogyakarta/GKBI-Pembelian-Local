<?php

namespace App\Http\Controllers\Akuntansi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payment_iscoming = DB::table('unit_stoks as us')
            ->join('items as it', 'it.id', '=', 'us.item_id')
            ->join('npm_qties as qty', 'qty.id', '=', 'it.npb_id')
            ->join('npb_prices as price', 'qty.id', '=', 'price.qty.id')
            ->join('payments', 'price.id', '=', 'payments.price_id')
            ->join('testing_items as ti', 'ti.id', '=', 'qty.ti_id')
            ->join('barang_datangs as bd', 'bd.id', '=', 'ti.bd_id')
            ->join('surat_jalans as sj', 'sj.id', '=', 'bd.s_jln_id')
            ->join('s_p_barangs as spb', 'spb.id', '=', 'sj.spb_id')
            ->join('transactions as t', 't.id', '=', 'spb.transaction_id')
            ->join('transaction_details as td', 't.id', '=', 'td.transaction_id')
            ->join('permintaans as p', 'p.id', '=', 't.permintaan_id')
            ->join('bagians as b', 'b.id', '=', 'p.bagian_id')
            ->select('p.nm_barang', 'p.spesifikasi', 'p.kd_barang', 'spb.tempo_pembayaran', 'spb.nota_spb', 'td._terbayar', 'td.ppn', 'td.tgl_beli', 'payments.id', 'payments.*')
            ->get();
        return \view('akuntansi.pembayaran.index', \compact('payemnt_iscoming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
