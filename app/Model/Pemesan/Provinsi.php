<?php

namespace App\Model\Pemesan;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['negara_id', 'nama', 'alias'];
    public $timestamps = \true;
}
