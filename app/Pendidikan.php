<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'ref_pendidikan';

    protected $fillable = ['deskripsi','is_bsm'];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk','id');
    }
}
