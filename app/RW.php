<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    protected $table = 'ref_rw';

    protected $fillable = ['nomor_rw','luas_wilayah','id_dusun','id_penduduk'];

    public function dusun()
    {
        return $this->belongsTo('App\Dusun', 'id_dusun');
    }

    public function keluarga()
    {
        return $this->hasMany('App\Keluarga', 'id_rw');
    }
}
