<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    protected $fillable = ['no_jalan','tgl_','arsip','user_id'];
    public  $timestamps = true;
}
