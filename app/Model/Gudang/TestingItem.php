<?php

namespace App\Model\Gudang;

use Illuminate\Database\Eloquent\Model;

class TestingItem extends Model
{
    protected $fillable = ['bd_id', 'no_test', 'tgl_', 'selesai', 'cek_detail'];
    public $timestamps = true;
    public function barangDatang()
    {
        return $this->belongsTo(BarangDatang::class, 'bd_id');
    }
}
