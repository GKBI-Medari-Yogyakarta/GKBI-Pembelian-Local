<?php

namespace App\Model\Niagabeli;

use App\Model\Pemesan\Permintaan;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['permintaan_id', 'tgl_status', 'no_niaga', 'status_niaga', 'rencana_beli', 'perkiraan_biaya', 'payment_type', 'keterangan', 'status_beli', 'no_transaction'];
    public $timestamps = \true;
    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }
    public function transactionDetail()
    {
        return $this->morphOne(TransactionDetail::class,'transaction');
    }
}
