<?php

namespace App\Model\Akuntansi;

use App\Model\Niagabeli\Supplier;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $fillable = ['bank', 'no_rekening', 'saldo', 'sup_id', 'status'];
    public $timestamps = \true;
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'sup_id');
    }
}
