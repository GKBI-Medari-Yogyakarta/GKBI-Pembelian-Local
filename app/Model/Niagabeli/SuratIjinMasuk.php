<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class SuratIjinMasuk extends Model
{
    protected $fillable = ['s_jln_id', 'no_ijin', 'tgl_', 'user_id'];
    public $timestamps = true;
    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 's_jln_id');
    }
}
