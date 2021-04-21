<?php

namespace App\Model\Gudang;

use App\Model\Niagabeli\SuratJalan;
use Illuminate\Database\Eloquent\Model;

class BarangDatang extends Model
{
    protected $fillable = ['s_jln_id', 'no_agenda_pembelian', 'no_agenda_gudang', 'mikeluar_id'];
    public $timestamps = true;
    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 's_jln_id');
    }
    public static function notification()
    {
        $bdnull = BarangDatang::where('no_agenda_gudang', null)->orWhere('no_agenda_pembelian', null)->count();
        return $bdnull;
    }
}
