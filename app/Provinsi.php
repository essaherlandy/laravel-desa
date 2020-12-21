<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'ref_provinsi';

    protected $fillable = ['kode_provinsi_bps','kode_provinsi_kemendagri','nama_provinsi','luas_wilayah'];

    public function kotas()
    {
        return $this->hasOne('App\Kota', 'id_provinsi');
    }
}
