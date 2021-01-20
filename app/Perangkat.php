<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'perangkat';

    protected $fillable = ['id_penduduk','id_pangkat_gol','id_jabatan','nip','niap','no_sk_angkat','tgl_angkat','no_sk_berhenti','tgl_berhenti','is_active'];

    public function penduduk()
    {
        return $this->hasOne('App\Penduduk','id','id_penduduk');
    }

    public function jabatan()
    {
        return $this->hasOne('App\Jabatan','id','id_jabatan');
    }

    public function pangkat_golongan()
    {
        return $this->hasOne('App\PangkatGolongan','id','id_pangkat_gol');
    }
}
