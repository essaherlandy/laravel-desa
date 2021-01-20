<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'ref_jabatan';

    protected $fillable = ['deskripsi'];

    public function perangkat()
    {
        return $this->belongsTo('App\Perangkat','id_penduduk');
    }
}
