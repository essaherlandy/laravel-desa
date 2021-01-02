<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    protected $fillable = ['no_kk','alamat_jalan','is_sementara','is_raskin','is_jamkesmas','is_pkh','id_kelas_sosial','id_kepala_keluarga','id_rt','id_rw','id_dusun','id_penduduk'];

    public function hubungan_keluarga()
    {
        return $this->hasMany('App\HubunganKeluarga', 'id_keluarga');
    }

    public function rw()
    {
        return $this->belongsTo('App\RW', 'id_rw');
    }

    public function rt()
    {
        return $this->belongsTo('App\RT', 'id_rt');
    }

    public function dusun()
    {
        return $this->belongsTo('App\Dusun', 'id_dusun');
    }

    public function kelas_sosial()
    {
        return $this->hasOne('App\Ksosial', 'id', 'id_kelas_sosial');
    }
}
