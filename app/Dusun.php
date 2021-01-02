<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = 'ref_dusun';

    protected $fillable = ['kode_dusun_bps','kode_dusun_kemendagri','nama_dusun','luas_wilayah','id_desa','id_penduduk'];

    public function desa()
    {
        return $this->belongsTo('App\Desa', 'id_desa');
    }

    public function rw()
    {
        return $this->hasOne('App\RW', 'id_dusun');
    }

    public function keluarga()
    {
        return $this->hasMany('App\Keluarga', 'id_dusun');
    }
}
