<?php

namespace App\Model\Gudang;

use App\Model\Niagabeli\SuratJalan;
use Illuminate\Database\Eloquent\Model;

class BarangDatang extends Model
{
    protected $fillable = ['s_jln_id', 'no_rencana_pembelian', 'no_agenda_gudang'];
    public $timestamps = true;
    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 's_jln_id');
    }
}
