<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    protected $table = 'perangkat_desa';

    protected $fillable = ['id_penduduk','nama','jabatan'];
}
