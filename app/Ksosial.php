<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ksosial extends Model
{
    protected $table = 'ref_kelas_sosial';

    protected $fillable = ['deskripsi'];

    public function keluargas()
    {
        return $this->hasMany('App\Keluarga', 'id_kelas_sosial');
    }
}
