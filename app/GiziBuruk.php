<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiziBuruk extends Model
{
    protected $table = 'gizi_buruk';

    protected $fillable = ['berat_badan','tinggi_badan','tgl_timbang','id_penduduk'];

    public function penduduk(){
        return $this->hasMany('App\Penduduk','id','id_penduduk');
    }
}
