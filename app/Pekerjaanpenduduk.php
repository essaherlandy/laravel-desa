<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaanpenduduk extends Model
{
    protected $table = 'ref_pekerjaan_penduduk';

    protected $fillable = ['deskripsi'];
}
