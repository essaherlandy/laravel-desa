<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PindahMasuk extends Model
{
    protected $table = 'ikut_pindah_masuk';

    protected $fillable = ['id_penduduk','id_keluarga'];
}
