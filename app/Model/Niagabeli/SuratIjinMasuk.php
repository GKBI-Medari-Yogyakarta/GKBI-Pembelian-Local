<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class SuratIjinMasuk extends Model
{
    protected $fillable = ['no_ijin','tgl_','user_id'];
    public $timestamps = true;
}
