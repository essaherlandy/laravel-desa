<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PindahKeluar extends Model
{
    protected $table = 'ikut_pindah_keluar';

    protected $fillable = ['id_penduduk','id_pindah_keluar','created_at'];
}
