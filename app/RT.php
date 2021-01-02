<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = 'ref_rt';

    protected $fillable = ['nomor_rt','luas_wilayah','id_rw','id_penduduk'];

    public function keluarga()
    {
        return $this->hasMany('App\Keluarga', 'id_rt');
    }
}
