<?php

namespace App\Model\Pemesan;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = ['prov_id', 'nama'];
    public $timestamps = \true;
}
