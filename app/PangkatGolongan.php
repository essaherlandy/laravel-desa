<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PangkatGolongan extends Model
{
    protected $table = 'ref_pangkat_golongan';

    protected $fillable = ['deskripsi'];

    public function perangkat()
    {
        return $this->hasOne('App\Perangkat','id','id_pangkat_gol');
    }
}
