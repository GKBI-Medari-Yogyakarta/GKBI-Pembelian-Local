<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class SPBarang extends Model
{
    protected $fillable = ['transaction_id', 'sup_id', 'nota_spb', 'total_hrg', 'ppn', 'jadwal_datang', 'tempo_pembayaran'];
    public $timestamps = \true;
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'sup_id');
    }
}
