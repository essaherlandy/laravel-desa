<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    protected $table = 'ref_jenis_kelamin';

    protected $fillable = ['deskripsi'];

    public function penduduk()
    {
        return $this->hasOne('App\Penduduk', 'id','id_jenis_kelamin');
    }

    public function kelahiran()
    {
        return $this->hasOne('App\Kelahiran', 'id','id_jenis_kelamin');
    }
}
