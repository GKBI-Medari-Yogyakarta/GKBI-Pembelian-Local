<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', '_terbeli', '_terbayar', 'tgl_beli', 'ppn', 'nota', 'harga_item', 'jumlah_item'];
    public $timestamps = \true;
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'transaction_id');
    }
}
