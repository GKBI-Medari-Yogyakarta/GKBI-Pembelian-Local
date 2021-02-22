<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class BarangDatang extends Model
{
    protected $fillable = ['s_jln_id','s_masuk_id','spb_id','no_rencana_pembelian','no_agenda_gudang'];
    public $timestamps = true;
    public function suratJalan(){
        return $this->belongsTo(SuratJalan::class,'s_jln_id');
    }
    public function suratMasuk(){
        return $this->belongsTo(SuratIjinMasuk::class,'s_masuk_id');
    }
}
