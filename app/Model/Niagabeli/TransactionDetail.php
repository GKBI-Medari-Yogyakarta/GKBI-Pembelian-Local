<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', '_terbeli', '_terbayar', 'tgl_beli', 'ppn', 'nota', 'harga_item', 'spb_id'];
    public $timestamps = \true;
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    public function spb()
    {
        return $this->belongsTo(SPBarang::class,'spb_id');
    }
}
