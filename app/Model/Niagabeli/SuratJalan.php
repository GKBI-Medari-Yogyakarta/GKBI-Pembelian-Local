<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    protected $fillable = ['spb_id', 'no_jalan', 'tgl_', 'arsip', 'user_id'];
    public  $timestamps = true;
    public function spb()
    {
        return $this->belongsTo(SPBarang::class, 'spb_id');
    }
}
