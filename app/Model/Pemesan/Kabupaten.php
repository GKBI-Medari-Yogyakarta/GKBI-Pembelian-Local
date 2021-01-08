<?php

namespace App\Model\Pemesan;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = ['prov_id', 'nama', 'kota'];
    public $timestamps = \true;
}
