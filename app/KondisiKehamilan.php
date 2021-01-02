<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KondisiKehamilan extends Model
{
    protected $table = 'kondisi_kehamilan';

    protected $fillable = ['keterangan','tgl_hpl','is_resti','id_penduduk'];

    public function penduduk(){
        return $this->hasMany('App\Penduduk','id','id_penduduk');
    }
}
