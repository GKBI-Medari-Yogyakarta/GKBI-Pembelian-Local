<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class IjinKeluar extends Model
{
    protected $fillable = ['mikeluar_id', 'tgl_', 'ket_'];
    public $timestamps = \true;
    public function mikeluar()
    {
        return $this->belongsTo(Mikeluar::class, 'mikeluar_id');
    }
}
